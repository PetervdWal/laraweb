<?php
namespace App\Services;
use App\Http\Controllers\MeasurementsController;
use Illuminate\Support\Facades\DB;

class MeasurementService
{
    /**
     * @param String $type
     */
    public function getMeasurements(String $type)
    {
        $measurements = null;
        if ($type == MeasurementsController::$BLOOD_PRESSURE) {
            $measurements = DB::table('blood_pressure_measurements')->select('pressure', 'measurement_taken_at')->get();
        } else if ($type == MeasurementsController::$PULSE) {
            $measurements = DB::table('pulse_measurements')->select('pulse', 'measurement_taken_at')->get();
        } else if ($type == MeasurementsController::$ECG_WAVES) {
            $measurements = DB::table('ECG_waves_measurements')->select('ECG_waves', 'measurement_taken_at')->get();
        }
        return $measurements;
    }
}