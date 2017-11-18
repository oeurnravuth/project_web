<?php

namespace App\Validator;

use Illuminate\Foundation\Validation\ValidatesRequests;

class UserValidator
{
    use ValidatesRequests;

    public function postInsertOne($request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);
    }

    public function postUpdateOneById($request)
    {
        $validateField = array();
        $validateField['name'] = 'required|unique:users,id';

        if ($request['password']) {
            $validateField['password'] = 'min:6';
        }

        $this->validate($request, $validateField);
    }

    public function changePassword($request)
    {
        $this->validate($request, [
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6'
        ]);
    }

}