<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function getAll(Request $request)
    {
        $datas['content'] = $this->convert1000ToK(Content::totalInThisMonth());
        return view('admin.dashboard.home', compact('datas'));
    }

    private function convert1000ToK($number)
    {
        $number = ($number / 1000) > 1 ? number_format($number / 1000, 1) . 'K' : $number;
        return $number;
    }
}
