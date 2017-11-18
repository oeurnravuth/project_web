<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 10/30/2017
 * Time: 8:57 AM
 */

namespace App\Repository;


interface SettingRepository
{
    public function toggleStatusById($id);
    public function activeMultiById($id);
    public function deactiveMultiById($id);
    public function deleteMultiById($id);
}