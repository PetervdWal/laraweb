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
            $measurements = DB::table('blood_pressure_measurements')->select('id', 'pressure_upper', 'pressure_lower', 'measurement_taken_at')->get();
        } else if ($type == MeasurementsController::$PULSE) {
            $measurements = DB::table('pulse_measurements')->select('id', 'pulse', 'measurement_taken_at')->get();
        } else if ($type == MeasurementsController::$ECG_WAVES) {
            $measurements = DB::table('ECG_waves_measurements')->select('id', 'ECG_waves', 'measurement_taken_at')->get();
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
}