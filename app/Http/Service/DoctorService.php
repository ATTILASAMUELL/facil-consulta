<?php

namespace App\Http\Service;
use App\Http\Dto\{DoctorDTO,DoctorPatientDTO};
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Exception;

class DoctorService
{
    public function create(DoctorDTO $doctorDTO):bool|Doctor
    {
        try {
            $doctor = new Doctor();
            
            $create = $doctor->create($doctorDTO->doctorDto());
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

    public function linkPatientAndDoctor(DoctorPatientDTO $doctorDTO):bool|Doctor
    {
        try {
            $doctor = new Doctor();

            $linkPatientAndDoctor = $doctor->find($doctorDTO->doctorPatientDto()['doctor_id']);
            
            $linkPatientAndDoctor->patients()->sync([$doctorDTO->doctorPatientDto()['patient_id']]);

            DB::commit();

            if($linkPatientAndDoctor->id) {
                return $linkPatientAndDoctor;
            }
            
            return false;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function find($id_cities)
    {
        $find = Doctor::where('citie_id',$id_cities)->get();
        return $find;
    }

    public function get()
    {
        try {
            $findWithPatient = Doctor::all();
            return $findWithPatient;

        } catch (\Exception $e) {
            return false;
        }
    }

    public function findWithPatient($id_doctor):bool|Doctor
    {
        try {
            $findWithPatient = Doctor::with('patients')->find($id_doctor);

            if($findWithPatient->id) {
                return $findWithPatient;
            }
            return false;

        } catch (\Exception $e) {
            return false;
        }
    }
}