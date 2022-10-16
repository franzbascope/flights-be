<?php

namespace App\FlightsDomain\Model;

use App\FlightsDomain\ValueObjects\FlightStatus;

class Flight extends Entity
{
    private \DateTime $startTime;
    private \DateTime $endTime;
    private string $crewUuid;
    private string $aircraftUuid;
    private string $status;
    private int $flightProgramId;
    private array $information;

    /**
     * @param \DateTime $startTime
     * @param \DateTime $endTime
     * @param string $crewUuid
     * @param string $aircraftUuid
     * @param string $status
     * @param int $flightProgramId
     * @param array $information
     */
    public function __construct(\DateTime $startTime, \DateTime $endTime, string $crewUuid, string $aircraftUuid, FlightStatus $status, int $flightProgramId, array $information)
    {
        parent::__construct();
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->crewUuid = $crewUuid;
        $this->aircraftUuid = $aircraftUuid;
        $this->status = $status->getFlightStatus();
        $this->flightProgramId = $flightProgramId;
        $this->information = $information;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime(): \DateTime
    {
        return $this->startTime;
    }

    /**
     * @return \DateTime
     */
    public function getEndTime(): \DateTime
    {
        return $this->endTime;
    }

    /**
     * @return string
     */
    public function getCrewUuid(): string
    {
        return $this->crewUuid;
    }

    /**
     * @return string
     */
    public function getAircraftUuid(): string
    {
        return $this->aircraftUuid;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getFlightProgramId(): int
    {
        return $this->flightProgramId;
    }

    /**
     * @return array
     */
    public function getInformation(): array
    {
        return $this->information;
    }
}
