<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 10/29/2017
 * Time: 1:23 PM
 */

namespace App\Validator;

use Illuminate\Foundation\Validation\ValidatesRequests;

class ContentValidator
{
    use ValidatesRequests;

    public function postInsertOne($request)
    {
        $this->validate($request, [
            'name' => 'required|unique:contents',
            'photo_url' => 'required|mimes:jpeg,jpg,png|max:1000'
        ]);
    }

    public function postUpdateOneById($request) {
        $this->validate($request, [
            'name' => 'required|unique:contents,id',
            'photo_url' => 'mimes:jpeg,jpg,png|max:1000'
        ]);
    }

}