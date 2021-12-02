<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class GetURL extends Controller
{
    //
    public function getURL()
    {
        $currentURL = URL::current();

        $fullURL = URL::full();
        dd($currentURL);
    }
}
