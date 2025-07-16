<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalController extends Controller
{
    public function setLocale($lang)
    {
        if (in_array($lang, ['en','fr'])) {
            Session::put('locale',$lang);
             App::setLocale($lang);
        }

        return redirect()->back();
    }
}
