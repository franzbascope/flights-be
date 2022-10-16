<?php

namespace App\Http\Controllers;

use App\FlightsDomain\Repository\ILoginHandler;
use Aws\CognitoIdentityProvider\Exception\CognitoIdentityProviderException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private ILoginHandler $loginHandler;

    /**
     * @param ILoginHandler $loginHandler
     */
    public function __construct(ILoginHandler $loginHandler)
    {
        $this->loginHandler = $loginHandler;
    }


    public function login(Request $request){
        try{
            $request->validate([
                "username" => "required",
                "password"=> "required"
            ]);
            $username = $request->get("username");
            $password = $request->get("password");
            return $this->loginHandler->login($username,$password);
        }catch (CognitoIdentityProviderException $exception){
            return response(["message"=>"credentials not valid"],401);
        }
    }
}
