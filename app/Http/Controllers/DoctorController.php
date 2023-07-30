<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Http\Resources\{DoctorCollection,DoctorResource};
use App\Http\Service\DoctorService;
use App\Http\Requests\{DoctorRequest,PatientDoctorRequest};
use App\Http\Dto\{DoctorDTO,DoctorPatientDTO};
use App\Http\Helps\Traits\ReturnHelp;

class DoctorController extends Controller
{
    use ReturnHelp;

    public function get()
    {
        try {
            $clientService = new DoctorService();
            return new DoctorCollection($clientService->get());

        } catch (\Exception $e) {
            $this->getReturnErrorJson();
        }
    }

    public function create(DoctorRequest $doctorRequest)
    {
        try {
            $dto = new DoctorDTO($doctorRequest->all());
            $clientService = new DoctorService();
            $create = $clientService->create($dto);
    
            if($create != false) {
                return new DoctorResource($create);
            }
            
            $this->getReturnErrorJson();

        } catch (\Exception $e) {
            $this->getReturnErrorJson();
        }

    }


    public function find($id_cities)
    {
        try {
            $clientService = new DoctorService();
            return new DoctorCollection($clientService->find($id_cities));

        } catch (\Exception $e) {
            $this->getReturnErrorJson();
        }
    }

    public function findWithPatient($id_doctor)
    {
        try {
            $clientService = new DoctorService();
            return new DoctorResource($clientService->findWithPatient($id_doctor));

        } catch (\Exception $e) {
            $this->getReturnErrorJson();
        }
    }

    public function linkPatientAndDoctor(PatientDoctorRequest $patientDoctorRequest)
    {
        try {
            $dto = new DoctorPatientDTO($patientDoctorRequest->all());
            $clientService = new DoctorService();
            $linkPatientAndDoctor = $clientService->linkPatientAndDoctor($dto);
            
            if($linkPatientAndDoctor != false) {
                return new DoctorResource($linkPatientAndDoctor);
            }
            
            $this->getReturnErrorJson();

        } catch (\Exception $e) {
            $this->getReturnErrorJson();
        }

    }

}
