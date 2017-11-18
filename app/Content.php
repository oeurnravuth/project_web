<?php

namespace App;

use App\Entity\OrderBy;
use App\Entity\Page;
use Illuminate\Database\Eloquent\Model;
use DB;

class Content extends Model
{
    use Page;
    use OrderBy;
    protected $fillable = ['name', 'photo_url', 'status'];

    private $id;
    private $name;
    private $photo_url;
    private $status;

    public function getAll($content)
    {

        $condition = [];
        if (!empty($content->getName())) {
            $condition[] = ['name', 'like', "%" . $content->getName() . "%"];
        }

        $data = DB::table('contents')
            ->where($condition)
            ->orderBy('id', $content->getOrderBy())
            ->paginate($content->getOffset());

        return $data;
    }

    public function postInsertOne($content)
    {
        DB::table('contents')->insert([
            'name' => $content->getName(),
            'photo_url' => $content->getPhotoUrl(),
            'status' => '1'
        ]);
    }

    public function postUpdateOneById($content)
    {
        $data = array();
        $data['name'] = $content->getName();
        if (!empty($content->getPhotoUrl())) {
            $data['photo_url'] = $content->getPhotoUrl();
        }

        DB::table('contents')
            ->where('id', $content->getId())
            ->update($data);
    }

    public function deleteOneById($id)
    {
        Content::find($id)
            ->delete();
        return $id;
    }

    public function toggleStatusById($id)
    {
        $content = Content::find($id)->first();
        $status = $content->status = '0' ? '1' : '0';
        Content::where('id', $id)
            ->update(['status' => $status]);
    }

    public function activeMultiById($id)
    {
        $ids = explode(',', $id);
        Content::whereIn('id', $ids)
            ->update(['status' => '1']);
    }

    public function deactiveMultiById($id)
    {
        $ids = explode(',', $id);
        Content::whereIn('id', $ids)
            ->update(['status' => '0']);
    }

    public function findOneById($id)
    {
        $data = DB::table('contents')
            ->where('id', $id)
            ->first();
        return $data;
    }

    public static function totalInThisMonth()
    {
        $start_date = date('Y-m-01 H:i:s');
        $end_date = date('Y-m-t H:i:s');
        $total = DB::table('contents')
            ->whereBetween('created_at', [$start_date, $end_date])
            ->where('status','1')
            ->count();
        return intval($total);
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
        return $this->photo_url;
    }

    /**
     * @param mixed $photo_url
     */
    public function setPhotoUrl($photo_url)
    {
        $this->photo_url = $photo_url;
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

}
