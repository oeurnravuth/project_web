<?php

namespace App\Http\Controllers;

use App\User;
use App\Repository\UserRepository;
use App\Repository\SettingRepository;
use App\Validator\UserValidator;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller implements UserRepository, SettingRepository
{

    private $user;
    private $validator;

    const UPLOAD_PATH = 'photos/uploads/contents';

    function __construct(User $user, UserValidator $validator)
    {
        $this->user = $user;
        $this->validator = $validator;
    }

    public function getAll(Request $request)
    {
        $this->user->setOffset($request['offset']);
        $this->user->setPage($request['page']);
        $this->user->setName($request['name']);

        $datas['datas'] = $this->user->getAll($this->user);
        $datas['search'] = ['name' => $this->user->getName()];

        $datas['datas']->appends(['offset' => $this->user->getOffset(), 'name' => $this->user->getName()])->links();
        return view('admin.users.list', $datas);
    }

    public function findOneById($id)
    {
        $data = $this->user->findOneById($id);
        return view('admin.users.show', compact('data'));
    }

    public function postUpdateOneById(Request $request, $id)
    {
        $this->validator->postUpdateOneById($request);
        $file = $request->file('photo_url');
        $photo_url = '';
        if (!empty($file)) {
            $photo_url = time() . "-" . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(self::UPLOAD_PATH, $photo_url);
            $photo_url = self::UPLOAD_PATH . '/' . $photo_url;
        }

        $user = new User();
        $user->setId($id);
        $user->setName($request['name']);
        $user->setPhotoUrl($photo_url);
        $user->postUpdateOneById($user);
        return redirect()->route('admin.users.get_edit', ['id' => $id])->with(['success' => 'Update success!']);
    }

    public function getUpdateOneById($id)
    {
        $data = $this->user->findOneById($id);
        return view('admin.users.edit', compact('data'));
    }

    public function getInsertOne()
    {
        return view('admin.users.add_new');
    }

    public function postInsertOne(Request $request)
    {
        $this->validator->postInsertOne($request);

        $user = new User();
        $user->setName($request['name']);
        $user->setPassword($request['password']);
        $user->postInsertOne($user);
        return redirect()->route('admin.users.get_add_new')->with(['success' => 'Insert success!']);
    }

    public function deleteOneById($id)
    {
        $this->user->deleteOneById($id);
        return response()->json(['data' => 'success']);
    }

    public function toggleStatusById($id)
    {
        $this->user->toggleStatusById($id);
        return response()->json(['data' => 'success']);
    }

    public function activeMultiById($id)
    {
        $this->user->activeMultiById($id);
        return response()->json(['data' => 'success']);
    }

    public function deactiveMultiById($id)
    {
        $this->user->deactiveMultiById($id);
        return response()->json(['data' => 'success']);
    }

    public function deleteMultiById($id)
    {
        $ids = explode(',', $id);
        User::whereIn('id', $ids)
            ->delete();
        return response()->json(['data' => 'success']);
    }

    public function setUserRole($userId, $roleId)
    {
        $this->user->setUserRole($userId, $roleId);
        return response()->json(['data' => 'success']);
    }

    public function getChangePassword() {
        return view('auth.change_password');
    }

    public function postChangePassword(Request $request) {

        $this->validator->changePassword($request);

        $check = $this->user->changePassword($request,Auth::user()->id);

        if ($check) {
            Auth::logout();
            return redirect('/');
        }

        return redirect()->back()->with(['fail'=>'Passowrd incorrect!'])->withInput($request->all());
    }


}
