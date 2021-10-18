<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\Customer\WorkerService;
use Illuminate\Http\Request;
use App\Http\Resources\Customer\WorkerResource;


class WorkerController extends Controller
{
    protected $workerService;

    public function __construct(WorkerService $workerService)
    {
        return $this->workerService = $workerService;
    }
    //do somthing

    public function index(Request $request)
    {
        $listWorker = $this->workerService->getListWorker($request->service_id);

        return $this->responseSuccess(['data' => WorkerResource::collection($listWorker)]);
    }
}
