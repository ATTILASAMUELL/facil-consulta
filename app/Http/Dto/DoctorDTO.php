<?php

namespace App\Http\Dto;

use Illuminate\Support\Arr;

class DoctorDTO
{
    public readonly string $name;
     
    public readonly string $document;
 
    public readonly string $citie_id;
 
    public readonly string $specialtie_id;

     
    public function __construct(public readonly array $patientData)
    {
        $this->name = Arr::get($patientData, 'name');
        $this->document =  Arr::get($patientData, 'document');
        $this->citie_id =  Arr::get($patientData, 'citie_id');
        $this->specialtie_id =  Arr::get($patientData, 'specialtie_id');
    }

    public function doctorDto():array
    {
        return [
            "name" => $this->name,
            "document" => $this->document,
            "citie_id"=> $this->citie_id,
            "specialtie_id"=> $this->specialtie_id,
        ];
    }
}