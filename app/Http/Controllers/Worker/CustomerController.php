<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Services\Worker\CustomerService;
use Illuminate\Http\Request;
use App\Http\Resources\Worker\CustomerResource;


class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        return $this->customerService = $customerService;
    }
    //do somthing

    public function index(Request $request)
    {
        $listCustomer = $this->customerService->getListCustomer($request->service_id);

        return $this->responseSuccess(['data' => CustomerResource::collection($listCustomer)]);
    }
}
