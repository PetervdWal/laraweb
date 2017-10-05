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
        $headers = array_keys(get_object_vars($measurements[0]));

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
        $id = $request->id;
        $type= $request->type;

        $details = $this->measurementService->getMeasurementDetails($type, $id);
        $headers = array_keys(get_object_vars($details[0]));
        return view('measurementDetails', ['details' => $details, 'headers' => $headers,
            'id' => $id]);
    }

    private static function makeTestData(){
        DB::table('blood_pressure_measurements')->insert(['pressure_upper'=> 40, 'pressure_lower'=>20, 'measurement_taken_at'=>Carbon::now()]);
        DB::table('pulse_measurements')->insert(['pulse'=>70, 'measurement_taken_at'=>Carbon::now()]);
        DB::table('ECG_waves_measurements')->insert(['ECG_waves'=>10, 'measurement_taken_at'=>Carbon::now()]);

    }
}
