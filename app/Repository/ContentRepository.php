<?php
namespace App\Repository;

use Illuminate\Http\Request;

interface ContentRepository
{
    public function getAll(Request $request);
    public function findOneById($id);
    public function getInsertOne();
    public function postUpdateOneById(Request $request,$id);
    public function getUpdateOneById($id);
    public function postInsertOne(Request $request);
    public function deleteOneById($id);
}