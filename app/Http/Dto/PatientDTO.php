<?php

namespace App\Http\Dto;

use Illuminate\Support\Arr;

class PatientDTO
{
    public readonly string $name;
     
    public readonly string $document;
 
    public readonly string $phone;
     
    public function __construct(public readonly array $patientData)
    {
        $this->name = Arr::get($patientData, 'name');
        $this->document =  Arr::get($patientData, 'document');
        $this->phone =  Arr::get($patientData, 'phone');
    }

    public function patientDto():array
    {
        return [
            "name" => $this->name,
            "document" => $this->document,
            "phone"=> $this->phone,
        ];
    }
}