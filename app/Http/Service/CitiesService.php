<?php

namespace App\Http\Service;
use App\Models\Cities;
use Illuminate\Support\Facades\DB;
use Exception;

class CitiesService
{
    public function get()
    {
        try {
            return Cities::all();
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }
}