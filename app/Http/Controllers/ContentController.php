<?php

namespace App\Http\Controllers;

use App\Content;
use App\Repository\ContentRepository;
use App\Repository\SettingRepository;
use App\Validator\ContentValidator;
use Illuminate\Http\Request;
use DB;

class ContentController extends Controller implements ContentRepository,SettingRepository
{
    private $content;
    private $validator;

    const UPLOAD_PATH = 'photos/uploads/contents';

    function __construct(Content $content,ContentValidator $validator)
    {
        $this->content = $content;
        $this->validator = $validator;
    }

    public function getAll(Request $request)
    {
        $this->content->setOffset($request['offset']);
        $this->content->setPage($request['page']);
        $this->content->setName($request['name']);

        $datas['datas'] = $this->content->getAll($this->content);
        $datas['search'] = ['name'=>$this->content->getName()];
        $datas['datas']->appends(['offset' => $this->content->getOffset(), 'name' => $this->content->getName()])->links();
        return view('admin.contents.list', $datas);
    }

    public function findOneById($id)
    {
        $data = $this->content->findOneById($id);
        return view('admin.contents.show',compact('data'));
    }

    public function postUpdateOneById(Request $request, $id)
    {
        $this->validator->postUpdateOneById($request);
        $file = $request->file('photo_url');
        $photo_url = '';
        if (!empty($file)){
            $photo_url = time() . "-" . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(self::UPLOAD_PATH, $photo_url);
            $photo_url = self::UPLOAD_PATH.'/'.$photo_url;
        }

        $content = new Content();
        $content->setId($id);
        $content->setName($request['name']);
        $content->setPhotoUrl($photo_url);
        $content->postUpdateOneById($content);
        return redirect()->route('admin.contents.get_edit',['id'=>$id])->with(['success'=>'Update success!']);
    }

    public function getUpdateOneById($id)
    {
        $data = $this->content->findOneById($id);
        return view('admin.contents.edit',compact('data'));
    }

    public function getInsertOne()
    {
        return view('admin.contents.add_new');
    }

    public function postInsertOne(Request $request)
    {
        $this->validator->postInsertOne($request);
        $file = $request->file('photo_url');
        $photo_url = time() . "-" . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(self::UPLOAD_PATH, $photo_url);

        $content = new Content();
        $content->setName($request['name']);
        $content->setPhotoUrl(self::UPLOAD_PATH.'/'.$photo_url);
        $content->postInsertOne($content);
        return redirect()->route('admin.contents.get_add_new')->with(['success'=>'Insert success!']);
    }

    public function deleteOneById($id)
    {
        $this->content->deleteOneById($id);
        return response()->json(['data'=>'success']);
    }

    public function toggleStatusById($id)
    {
        $this->content->toggleStatusById($id);
        return response()->json(['data'=>'success']);
    }

    public function activeMultiById($id)
    {
        $this->content->activeMultiById($id);
        return response()->json(['data'=>'success']);
    }

    public function deactiveMultiById($id)
    {
        $this->content->deactiveMultiById($id);
        return response()->json(['data'=>'success']);
    }

    public function deleteMultiById($id)
    {
        $ids = explode(',',$id);
        Content::whereIn('id',$ids)
            ->delete();
        return response()->json(['data'=>'success']);
    }

}
