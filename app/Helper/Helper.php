<?php

namespace App\Helper;


class Helper
{

    private static $offsets = array(10, 30, 50, 100, 200, 500);

    public static function basePath(){
        return asset('');
    }

    public static function setButtonShow($routeName, $param)
    {
        echo "<a href='" . route($routeName, $param) . "' class=\"btn btn-primary btn-xs\"><i class=\"fa fa-eye\"></i></a>";
    }

    public static function setButtonEdit($routeName, $param)
    {
        echo "<a href='" . route($routeName, $param) . "' class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></a>";
    }

    public static function setButtonDelete($routeName, $param)
    {
        echo "<a href=\"#\" data-url='" . route($routeName, $param) . "'
               class=\"btn btn-danger btn-xs delete-button-list\">
               <i class=\"fa fa-trash-o\"></i> </a>";
    }

    public static function setRecordPerPage($datas)
    {
        $str = "<select class=\"myselect-dropdown\" id=\"id-offset-change\" name=\"offset\"  value='" . $datas->perPage() . "'>";
        foreach (Helper::$offsets as $offset) {
            $selected = ($offset == $datas->perPage()) ? "selected" : "";
            $str .= "<option value='" . $offset . "' " . $selected . ">" . $offset . "</option>";
        }
        $str .= "</select> <span class=\"span-record\">Record Per Page</span>
                <div class=\"total-record\">#Total record : <strong>".$datas->total()."</strong></div>
        ";
        echo $str;
    }

    public static function setPagination($datas)
    {
        echo "<div class=\"col-md-12 col-sm-12 col-xs-12\">
                <div class=\"col-md-4 col-sm-6 col-xs-12 text-left\">
                    Page ".$datas->currentPage()."
                     of ". $datas->lastPage() ." Pages
                </div>
                <div class=\"col-md-8 col-sm-12 col-xs-12 text-right\">
                    ". $datas->links()."
                    <input type=\"hidden\" name=\"page\" value='".$datas->currentPage()."'>
                    <input type=\"hidden\" id=\"offset\" value='". $datas->perPage() ."'>
                </div>
            </div>";
    }

    public static function setSettingInList($routeName)
    {

        $addNew = '';
        if (!empty($routeName['add_new'])) {
            $addNew = "
                <li>
                    <a href='" . route($routeName['add_new'], []) . "'
                       id=\"setting-addnew\">
                        <i class=\"fa fa-plus\"></i> Add New
                    </a>
                </li>";
        }

        $active = '';
        if (!empty($routeName['active'])) {
            $active = "
                <li>
                    <a href=\"#\" class=\"btn-activate-all\"
                       data-url='" . route($routeName['active'], ['id' => 'tmp_id']) . "'
                       id=\"setting-active\">
                        <i class=\"fa fa-check\"></i> Activate Selected Record
                    </a>
                </li>";
        }

        $deactive = '';
        if (!empty($routeName['deactive'])) {
            $deactive = "
                <li>
                    <a href=\"#\" class=\"btn-activate-all\"
                       data-url='" . route($routeName['deactive'], ['id' => 'tmp_id']) . "'
                       id=\"setting-deactive\">
                        <i class=\"fa fa-times\"></i> Deactivate Selected Record
                    </a>
                </li>";
        }

        $delete = '';
        if (!empty($routeName['delete'])) {
            $delete = "
                 <li>
                    <a href=\"#\" class=\"btn-delete-list-menu\"
                       data-url='" . route($routeName['delete'], ['id' => 'tmp_id']) . "'
                       id=\"setting-delete\">
                        <i class=\"fa fa-trash-o\"></i> Delete Selected Record
                    </a>
                </li>";
        }


        echo "<ul class=\"nav navbar-right panel_toolbox\">
                <li style=\"visibility: hidden\"><a class=\"\"><i class=\"fa fa-question\"></i></a>
                <li style=\"visibility: hidden\"><a class=\"\"><i class=\"fa fa-question\"></i></a>
                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\"
                       aria-expanded=\"false\"><i class=\"fa fa-wrench\"></i></a>
                    <ul class=\"dropdown-menu setting-dropdown\" role=\"menu\">
                        " . $addNew . "
                        " . $active . "
                        " . $deactive . "
                        <li class=\"divider\"></li>
                        " . $delete . "
                    </ul>
                </li>
                </li>
            </ul>";
    }


}