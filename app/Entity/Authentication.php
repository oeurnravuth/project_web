<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 10/30/2017
 * Time: 7:41 PM
 */

namespace App\Entity;
use App\User;
use Auth;

class Authentication
{
    const ADMIN = 1;
    const AUTHOR = 2;

    public static function admin () {
        return self::ADMIN;
    }

    public static function author () {
        return self::AUTHOR;
    }

    public static function isAuthenticate($role_id){
        $id = Auth::user()->id;
        $user = User::with('roles')->where('id',$id)->first();
        $idRole = array();
        if (!empty($user->roles)) {
            foreach ($user->roles as $role) {
                $idRole[] = $role->id;
            }
        }

        if (in_array($role_id,$idRole))
            return true;

        return false;
    }
}