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
    public static $BLOOD_PRESSURE = "bloodPressure";
    public static $PULSE = "pulse";
    public static $ECG_WAVES = "ecg";
    public static $measurementstype;
    protected $measurementService;

    public function __construct(MeasurementService $measurementService)
    {
        $this->measurementService = $measurementService;
    }

    /**
     * Shows all measurements of one type
     * TODO: Set it to show measurements of one type, of one user
     */
    public function showMeasurements()
    {
        if (self::$measurementstype == null) {
            self::$measurementstype = self::$BLOOD_PRESSURE;
        }

        $measurements = $this->measurementService->getMeasurements(self::$measurementstype);
        if ($measurements) {
            $headers = array_keys(get_object_vars($measurements[0]));
        } else {
            $headers = ["id"];
        }
        return view('measurements', ['measurements' => $measurements, 'headers' => $headers,
            'measurementtype_shown' => self::$measurementstype]);
    }

    /**
     * Sets the type of measurements to show
     * @param Request $request
     */
    public function setShownMeasurementsType(request $request)
    {
        self::$measurementstype = $request->type;
        return $this->showMeasurements();
    }

    /**
     * Show details of one Measurement
     * @param $id
     */
    public function showMeasurementDetails(request $request)
    {   //Standin information for the measurements details
        $measurementid = $request->measurementid;
        $type = $request->type;

        $details = $this->measurementService->getMeasurementDetails($type, $measurementid);

        if ($details) {
            $headers = array_keys(get_object_vars($details[0]));
        } else {
            $headers = ["id"];
        }
        return view('measurementDetails', ['details' => $details, 'headers' => $headers,
            'measurementid' => $measurementid]);
    }

    private static function makeTestData()
    {
        DB::table('blood_pressure_measurements')->insert(['measurementid' => 2, 'pressure_upper' => 40, 'pressure_lower' => 20, 'measurement_taken_at' => Carbon::now()]);
        DB::table('pulse_measurements')->insert(['measurementid' => 2, 'pulse' => 70, 'measurement_taken_at' => Carbon::now()]);
        DB::table('ECG_waves_measurements')->insert(['measurementid' => 2, 'ECG_waves' => 10, 'measurement_taken_at' => Carbon::now()]);

    }
}
