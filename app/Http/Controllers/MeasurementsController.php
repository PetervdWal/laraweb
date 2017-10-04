<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\MeasurementService;
use Carbon\Carbon;

class MeasurementsController extends Controller
{
    public static $BLOOD_PRESSURE = "Blood pressure";
    public static $PULSE = "Pulse";
    public static $ECG_WAVES = "ECG waves";
    public static $measurementstype = null;
    protected $measurementService;

    public function __construct(MeasurementService $measurementService)
    {
        $this->measurementService = $measurementService;
    }

    public function showMeasurements()
    {
        if (self::$measurementstype == null) {
            self::$measurementstype = self::$BLOOD_PRESSURE;
        }

        $measurements = $this->measurementService->getMeasurements(self::$measurementstype);
        $headers = ['Measurement', 'Taken At', 'Details'];

        return view('measurements', ['measurements' => $measurements, 'headers' => $headers,
            'measurementtype_shown' => self::$measurementstype]);
    }

    public function setMeasurementsType(request $request)
    {
        self::$measurementstype = $request->type;
        return $this->showMeasurements();
    }

    public function showMeasurementDetails($id){

    }
}
