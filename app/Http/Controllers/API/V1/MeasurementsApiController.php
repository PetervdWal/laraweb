<?php
/**
 * Created by PhpStorm.
 * User: heuti
 * Date: 04-Oct-17
 * Time: 20:05
 */

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\MeasurementService;

class MeasurementsApiController extends Controller
{
    protected $measurementService;

    public function __construct(MeasurementService $measurementService)
    {

        $this->measurementService = $measurementService;
    }

    public function getMeasurements(request $request){
        $type = $request->type;

        $measurements = $this->measurementService->getMeasurements($type);
        return response()->json($measurements);
    }

    public function getMeasurementDetails(request $request){
        $type= $request->type;
        $id= $request->id;

        $details = $this->measurementService->getMeasurementDetails(type, id);
        //TODO: Necessary? Or should it be removed?
        return $details;
        return response()->json($details);

    }

    public function insertPulse(Request $request) {
        $measurements = $request->measurements;
        $result = $this->measurementService->insertPulse($measurements);
    }
}