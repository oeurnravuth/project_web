<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 10/30/2017
 * Time: 8:53 AM
 */

namespace App\Repository;


use Illuminate\Http\Request;

interface UserRepository
{
    public function getAll(Request $request);
    public function findOneById($id);
    public function postUpdateOneById(Request $request,$id);
    public function getUpdateOneById($id);
    public function postInsertOne(Request $request);
    public function deleteOneById($id);
}