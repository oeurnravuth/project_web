<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    private $id;
    private $name;

    public function users() {
        return $this->belongsToMany(User::class,'user_role');
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
