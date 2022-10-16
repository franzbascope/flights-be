<?php

namespace App\FlightsInfrastructure\Repository;

use Aws\CognitoIdentity\CognitoIdentityClient;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;

class LoginHandler implements \App\FlightsDomain\Repository\ILoginHandler
{
    const AUTH_FLOW = 'USER_PASSWORD_AUTH';

    private string $cognitoClientId;
    private string $userPoolId;
    private string $cognitoClientSecret;

    /**
     * @param string $cognitoClientId
     * @param string $userPoolId
     * @param string $cognitoClientSecret
     */
    public function __construct()
    {
        $this->cognitoClientId = env("AWS_COGNITO_CLIENT_ID");
        $this->userPoolId = env("AWS_COGNITO_USER_POOL_ID");
        $this->cognitoClientSecret = env("AWS_COGNITO_CLIENT_SECRET");
    }


    public function login(string $username, string $password)
    {
        $client = $this->getClient($this->getConfiguration());
        $hash = $this->getHash($username, $this->cognitoClientId, $this->cognitoClientSecret);
        $authConfig = $this->getAuthConfig($username, $password, $hash, $this->cognitoClientId, $this->userPoolId, self::AUTH_FLOW);
        $response=  $client->initiateAuth($authConfig);
        return $response["AuthenticationResult"];
    }

    private function getAuthConfig($username, $password, $hash, $cognitoClientId, $cognitoUserPoolId, $authFlow)
    {
        return [
            "AuthFlow" => $authFlow,
            "ClientId" => $cognitoClientId,
            "UserPoolId" => $cognitoUserPoolId,
            "AuthParameters" => [
                "USERNAME" => $username,
                "PASSWORD" => $password,
                "SECRET_HASH" => $hash
            ]
        ];
    }

    private function getConfiguration()
    {
        return ['key' => env('AWS_ACCESS_KEY')
            , 'secret' => env('AWS_SECRET_ACCESS_KEY')
            , 'region' => env('AWS_DEFAULT_REGION')
            , 'version' => 'latest'
        ];
    }

    private function getHash($username, $cognitoClientId, $cognitoClientSecret)
    {
        $hash = hash_hmac('sha256', $username . $cognitoClientId, $cognitoClientSecret, true);
        return base64_encode($hash);
    }

    private function getClient($configuration = [])
    {
        return new CognitoIdentityProviderClient($configuration);
    }
}
