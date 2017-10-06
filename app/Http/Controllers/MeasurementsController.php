<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\MeasurementService;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;
use Khill\Lavacharts\Laravel\LavachartsFacade as Lava;

class MeasurementsController extends Controller
{
    public static $BLOOD_PRESSURE = "bloodPressure";
    public static $PULSE = "pulse";
    public static $ECG_WAVES = "ecg";
    public static $measurementstype;
    public $measurementtype;
    protected $measurementService;

    public function __construct(MeasurementService $measurementService)
    {
        $this->measurementService = $measurementService;
    }

    /**
     * Shows all measurements of one type
     */
    public function showMeasurements()
    {

        $type = null;
        if (!self::$measurementstype) {
            $type = self::$BLOOD_PRESSURE;
        } else {
            $type = self::$measurementstype;
        }

        //call the function to make the graphs.

//        self::makeTestData();
        $measurements = $this->measurementService->getMeasurements($type);
        if ($measurements) {
            $headers = array_keys(get_object_vars($measurements[0]));
        } else {
            $headers = ["id"];
        }

        return view('measurements', ['measurements' => $measurements, 'headers' => $headers]);
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

        $details = $this->measurementService->getMeasurementDetails($measurementid);

        if ($details) {
            $headers = array_keys(get_object_vars($details[0]));
        } else {
            $headers = ["id"];
        }

        $this->createGraphs($details, $measurementid);

        return view('measurementDetails', ['details' => $details, 'headers' => $headers,
            'measurementid' => $measurementid]);
    }

    private function createGraphs($data, $measurementid)
    {
        $measurement = DB::table('measurements')->where('id', $measurementid)->first();
        $type = $measurement->type;

        $graphDatatable = Lava::Datatable();
        $graphDatatable->addDateTimeColumn('Created');
        if ($type == self::$BLOOD_PRESSURE) {
            $graphDatatable
                ->addNumberColumn('Highest Pressure')
                ->addNumberColumn('Lowest Pressure');

            foreach ($data as $datapoint) {
                $graphDatatable->addRow([$datapoint->measurement_taken_at,
                    $datapoint->pressure_upper, $datapoint->pressure_lower]);
            }
        }
        if ($type == self::$PULSE) {
            $graphDatatable
                ->addNumberColumn('Pulse');

            foreach ($data as $datapoint) {
                $graphDatatable->addRow([$datapoint->measurement_taken_at,
                    $datapoint->pulse]);
            }
        }
        if ($type == self::$ECG_WAVES) {
            $graphDatatable
                ->addNumberColumn('ECG Wave');

            foreach ($data as $datapoint) {
                $graphDatatable->addRow([$datapoint->measurement_taken_at,
                    $datapoint->ECG_waves]);
            }
        }

        Lava::LineChart('Graph', $graphDatatable, [
            'title' => 'Measured data to time'
        ]);
        return;
    }

    private static function makeTestData()
    {
//        DB::table('measurements')->insert(['name'=>"measurement1",'created_at'=>Carbon::now(),'type'=>self::$BLOOD_PRESSURE, 'user_number'=>12]);
//        DB::table('measurements')->insert(['name'=>"measurement2",'created_at'=>Carbon::now(),'type'=>self::$PULSE, 'user_number'=>12]);
//        DB::table('measurements')->insert(['name'=>"measurement3",'created_at'=>Carbon::now(),'type'=>self::$ECG_WAVES, 'user_number'=>12]);
        DB::table('blood_pressure_measurements')->insert(['measurementid' => 1, 'pressure_upper' => 50, 'pressure_lower' => 30, 'measurement_taken_at' => Carbon::now()]);
        DB::table('pulse_measurements')->insert(['measurementid' => 1, 'pulse' => 80, 'measurement_taken_at' => Carbon::now()]);
        DB::table('ECG_waves_measurements')->insert(['measurementid' => 1, 'ECG_waves' => 20, 'measurement_taken_at' => Carbon::now()]);
        DB::table('blood_pressure_measurements')->insert(['measurementid' => 2, 'pressure_upper' => 40, 'pressure_lower' => 20, 'measurement_taken_at' => Carbon::now()]);
        DB::table('pulse_measurements')->insert(['measurementid' => 2, 'pulse' => 70, 'measurement_taken_at' => Carbon::now()]);
        DB::table('ECG_waves_measurements')->insert(['measurementid' => 2, 'ECG_waves' => 10, 'measurement_taken_at' => Carbon::now()]);
        DB::table('blood_pressure_measurements')->insert(['measurementid' => 3, 'pressure_upper' => 100, 'pressure_lower' => 80, 'measurement_taken_at' => Carbon::now()]);
        DB::table('pulse_measurements')->insert(['measurementid' => 3, 'pulse' => 60, 'measurement_taken_at' => Carbon::now()]);
        DB::table('ECG_waves_measurements')->insert(['measurementid' => 3, 'ECG_waves' => 40, 'measurement_taken_at' => Carbon::now()]);

    }
}
