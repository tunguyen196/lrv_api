<?php

namespace App\Services\Customer;

use App\Models\Worker;
use App\Models\Reservation;
use App\Services\BaseService;

class WorkerService extends BaseService
{
    protected $modelUser;

    public function __construct(Worker $model, Reservation $reservationModel)
    {
        $this->model = $model;
        $this->reservationModel = $reservationModel;
    }
    //do somthing

    public function getListWorker($serviceId)
    {
        return $this->reservationModel
            ->where('service_id', $serviceId)
            ->with('worker')
            ->get();
    }
}
