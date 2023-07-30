<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Http\Service\PatientService;
use App\Http\Resources\PatientResource;
use App\Http\Dto\PatientDTO;
use App\Http\Helps\Traits\ReturnHelp;

class PatientController extends Controller
{
    use ReturnHelp;
    
    public function create(PatientRequest $patientRequest)
    {
        try {
            $dto = new PatientDTO($patientRequest->all());
            $clientService = new PatientService();
            $create = $clientService->create($dto);
    
            if($create != false) {
                return new PatientResource($create);
            }
            $this->getReturnErrorJson();

        } catch (\Exception $e) {
            $this->getReturnErrorJson();
        }

    }

    public function update(PatientRequest $patientRequest,$id_paciente)
    {
        try {
            $dto = new PatientDTO($patientRequest->all());
            $clientService = new PatientService();
            $create = $clientService->update($dto,$id_paciente);
    
            if($create != false) {
                return new PatientResource($create);
            }
            $this->getReturnErrorJson();

        } catch (\Exception $e) {
            $this->getReturnErrorJson();
        }

    }
}
