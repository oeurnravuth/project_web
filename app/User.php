<?php

namespace App;

use App\Entity\OrderBy;
use App\Entity\Page;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;
use Hash;

class User extends Authenticatable
{
    use Notifiable;
    use Page;
    use OrderBy;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    private $id;
    private $name;
    private $photoUrl;
    private $email;
    private $isAdmin;
    private $status;
    private $password;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role','user_id','role_id');
    }

    public function getAll($user)
    {
        $condition = [];
        if (!empty($user->getName())) {
            $condition[] = ['name', 'like', "%" . $user->getName() . "%"];
        }

        $data = DB::table('users')
            ->where($condition)
            ->orderBy('id', $user->getOrderBy())
            ->paginate($user->getOffset());

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]->user_role = DB::table('user_role')
                ->where('user_id',$data[$i]->id)->get();

        }
        return $data;
    }

    public function postInsertOne($user)
    {
        DB::table('users')->insert([
            'name' => $user->getName(),
            'password' => bcrypt($user->getPassword()),
            'status' => '1'
        ]);
    }

    public function postUpdateOneById($user)
    {
        $data = array();
        $data['name'] = $user->getName();
        if (!empty($user->getPassword())) {
            $data['password'] = $user->getPassword();
        }

        DB::table('users')
            ->where('id', $user->getId())
            ->update($data);
    }

    public function deleteOneById($id)
    {
        User::find($id)
            ->delete();
        return $id;
    }

    public function toggleStatusById($id)
    {
        $user = User::find($id)->first();
        $status = $user->status = '0' ? '1' : '0';
        User::where('id', $id)
            ->update(['status' => $status]);
    }

    public function activeMultiById($id)
    {
        $ids = explode(',', $id);
        User::whereIn('id', $ids)
            ->update(['status' => '1']);
    }

    public function deactiveMultiById($id)
    {
        $ids = explode(',', $id);
        User::whereIn('id', $ids)
            ->update(['status' => '0']);
    }

    public function findOneById($id)
    {
        $data = DB::table('users')
            ->where('id', $id)
            ->first();
        return $data;
    }

    public function setUserRole($userId, $roleId)
    {
        $condition = array();
        $condition[] = ['user_id', '=', $userId];
        $condition[] = ['role_id', '=', $roleId];

        $data = DB::table('user_role')
            ->where($condition);

        if (empty($data->first())) {
            DB::table('user_role')
                ->insert([
                    'user_id' => $userId,
                    'role_id' => $roleId,
                ]);
        } else {
            $data->delete();
        }
    }

    public function changePassword($request,$id) {
        $user = $this->findOneById($id);
        if (Hash::check($request['old_password'], $user->password)) {
            $this->updatePassword($id,$request['new_password']);
            return true;
        }
        return false;
    }

    private function updatePassword($id,$password) {
        DB::table('users')
            ->where('id',$id)
            ->update([
                'password'=>bcrypt($password)
            ]);
    }

    /**
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
    }

    /**
     * @param string $rememberTokenName
     */
    public function setRememberTokenName($rememberTokenName)
    {
        $this->rememberTokenName = $rememberTokenName;
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

    /**
     * @return mixed
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param mixed $photoUrl
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getisAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
