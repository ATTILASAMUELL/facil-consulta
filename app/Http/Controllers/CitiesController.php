<?php

namespace App\Http\Controllers;
use App\Http\Resources\CitiesCollection;
use App\Models\Cities;
use App\Http\Helps\Traits\ReturnHelp;
use App\Http\Service\CitiesService;

class CitiesController extends Controller
{
    use ReturnHelp;

    public function get()
    {
        try {
            $service = new CitiesService();
            return new CitiesCollection($service->get());

        } catch (\Exception $e) {
            $this->getReturnErrorJson();
        }
    }
}
