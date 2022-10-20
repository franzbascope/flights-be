<?php

namespace App\FlightsApplication\UseCases\Command\Flight\FlightBulkInsert;

use App\FlightsDomain\Repository\IFlightRepository;
use App\FlightsDomain\Repository\IUnitOfWork;
use App\Models\Flight;
use Illuminate\Database\Eloquent\Model;

class FlightBulkInsertHandler
{
    private IUnitOfWork $unitOfWork;
    private Model $model;

    /**
     * @param IUnitOfWork $unitOfWork
     * @param Model $model
     */
    public function __construct(IUnitOfWork $unitOfWork)
    {
        $this->unitOfWork = $unitOfWork;
        $this->model = new Flight();
    }


    /**
     * @throws \Exception
     */
    public function __invoke(FlightBulkInsertCommand $command)
    {
        try {
            $this->unitOfWork->beginTransaction();
            Flight::insert($command->getData());
            $this->unitOfWork->commit();
            return ["success" => true];
        } catch (\Exception $ex) {
            $this->unitOfWork->rollBack();
            throw  $ex;
        }
    }
}
