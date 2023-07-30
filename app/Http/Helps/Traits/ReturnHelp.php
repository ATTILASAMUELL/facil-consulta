<?php

namespace App\Http\Helps\Traits;

trait ReturnHelp {
    public function getReturnErrorJson($mensagem = 'Please try again later!!!', $code = 404) {
        return response()->json([
            'data'=>[
                'Error' => $mensagem,    
            ]
        ],$code);
    }
}