<?php

namespace App\Http\Service;
use App\Http\Dto\PatientDTO;
use App\Models\Patient;
use Exception;
use Illuminate\Support\Facades\DB;

class PatientService
{
    public function create(PatientDTO $patientDTO):bool|Patient
    {
        try {
            $patient = new Patient();
            
            $create = $patient->create($patientDTO->patientDto());
            DB::commit();

            if($create->id) {
                return $create;
            }
            
            return false;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function update(PatientDTO $patientDTO, $id_patient):bool|Patient
    {
        try {
            $patient = new Patient();
            
            $create = $patient->where('id',$id_patient)->update($patientDTO->patientDto());
            DB::commit();

            if($create->id) {
                return $create;
            }
            
            return false;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }

    }
}