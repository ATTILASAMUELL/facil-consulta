<?php

namespace App\Http\Dto;

use Illuminate\Support\Arr;

class DoctorPatientDTO
{
    public readonly int $doctor_id;
  
    public readonly int $patient_id;

    public function __construct(public readonly array $patientData)
    {
        $this->doctor_id = Arr::get($patientData, 'doctor_id');
        $this->patient_id =  Arr::get($patientData, 'patient_id');
    }

    public function doctorPatientDto():array
    {
        return [
            "doctor_id" => $this->doctor_id,
            "patient_id" => $this->patient_id,
        ];
    }
}