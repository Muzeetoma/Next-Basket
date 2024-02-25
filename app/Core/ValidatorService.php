<?php

namespace App\Core;
use Illuminate\Support\Facades\Validator;

class ValidatorService
{
    public function validateRequest(array $data, array $rules)
    {
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return false;
    }
}
