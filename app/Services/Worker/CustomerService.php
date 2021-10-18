<?php

namespace App\Services\Worker;

use App\Models\Worker;
use App\Models\Reservation;
use App\Services\BaseService;

class CustomerService extends BaseService
{
    protected $modelUser;

    public function __construct(Worker $model, Reservation $reservationModel)
    {
        $this->model = $model;
        $this->reservationModel = $reservationModel;
    }
    //do somthing

    public function getListCustomer($serviceId)
    {
        return $this->reservationModel
            ->where('service_id', $serviceId)
            ->with('customers')
            ->get();
    }
}
