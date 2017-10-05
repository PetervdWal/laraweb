<?php
namespace App\Services;

use App\Http\Controllers\MeasurementsController;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MeasurementService
{
    /**
     * @param String $type
     */
    public function getMeasurements(String $type, int $id)
    {
        $measurements = null;
        if ($type == MeasurementsController::$BLOOD_PRESSURE) {
            $measurements = DB::table('blood_pressure_measurements')
                ->select('id', 'measurementid','pressure_upper', 'pressure_lower', 'measurement_taken_at')->get();
        } else if ($type == MeasurementsController::$PULSE) {
            $measurements = DB::table('pulse_measurements')->select('id', 'measurementid','pulse', 'measurement_taken_at')->get();
        } else if ($type == MeasurementsController::$ECG_WAVES) {
            $measurements = DB::table('ECG_waves_measurements')->select('id', 'measurementid','ECG_waves', 'measurement_taken_at')->get();
        }
        return $measurements;
    }

    /**
     * @param String $type
     * @param int $id
     */
    public function getMeasurementDetails(String $type, int $id)
    {
        $measurementDetails = null;
        if ($type == MeasurementsController::$BLOOD_PRESSURE) {
            $measurementDetails = DB::table('blood_pressure_measurements')
                ->select('pressure_lower', 'pressure_upper', 'measurement_taken_at')
                ->where('id', $id)
                ->get();
        } else if ($type == MeasurementsController::$PULSE) {
            $measurementDetails = DB::table('pulse_measurements')
                ->select('pulse', 'measurement_taken_at')
                ->where('id', $id)
                ->get();
        } else if ($type == MeasurementsController::$ECG_WAVES) {
            $measurementDetails = DB::table('ECG_waves_measurements')
                ->select('ECG_waves', 'measurement_taken_at')
                ->where('id', $id)
                ->get();
        }
        return $measurementDetails;

    }

    public function insertPulse($measurements) {
        $result = $this->selectLastId("pulse");
        $id = $result == null ? 1 :  $result->measurementid+1;

        $dataSet = $this->convertToData("pulse", $measurements, $result);

        $result = DB::table('pulse_measurements')
            ->insert($dataSet);
        if($result){
            return $id;
        }
        else {
            return response("Insert went wrong", 500);
        }
    }

    private function convertToData(String $datatype, $doubleArray, $id){
        $dataSet = [];
        foreach($doubleArray as $measurement ){
            $dataSet = [
                $datatype => $measurement,
                "measurement_taken_at" => Carbon::now(),
                "measurementid" => $id
            ];
        }
        return $dataSet;
    }


    private function selectLastId($type){
        if($type == "pulse"){
            return DB::table('pulse_measurements')
                ->select('measurementid')
                ->orderBy('measurementid', 'desc')
                ->first();
        }
    }
}