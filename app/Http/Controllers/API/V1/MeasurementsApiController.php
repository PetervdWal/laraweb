<?php
/**
 * Created by PhpStorm.
 * User: heuti
 * Date: 04-Oct-17
 * Time: 20:05
 */

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\MeasurementService;

class MeasurementsApiController extends Controller
{
    protected $measurementService;
    protected $userservice;

    public function __construct(MeasurementService $measurementService, UserService $userService)
    {

        $this->measurementService = $measurementService;
        $this->userservice = $userService;
    }

    public function getMeasurements(request $request){
        $type = $request->type;
        $measurements = $this->measurementService->getMeasurements($type);
        return response()->json($measurements);
    }

    public function getMeasurementDetails(request $request){
        $type= $request->type;
        $id= $request->id;
        $details = $this->measurementService->getMeasurementDetails($type, $id);
        $data = [];
        foreach($details as $detail) {
            array_push($data, $detail->$type);
        }
        return response()->json($data);
    }

    public function getAllMeasurements(Request $request){
        $userNumber = $request->userNumber;
        $result = $this->measurementService->getAllMeasurements($userNumber);
        if($result){
            return response()->json($result);
        }
        else {
            return response("Not so good", 400);
        }
    }
    public function insertPulse(Request $request) {
        $userNumber = $this->userservice->getUserByToken($request->header("token"));
        $measurements = $request->measurements;
        $result = $this->measurementService->insertPulse($measurements, $userNumber);
        return response()->json($result);
    }

    public function insertEcg(Request $request){
        $userNumber = $this->userservice->getUserByToken($request->header("token"));
        $measurements =$request->measurements;
        $result =  $this->measurementService->insertEcg($measurements, $userNumber);
        return response()->json($result);
    }
}