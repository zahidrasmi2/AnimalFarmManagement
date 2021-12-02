<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Animals;

class CategoryController extends Controller
{
    public function category()
    {
        $sub_categories = DB::animals('subcategories')->first();
        $main_category = DB:: animals('categories')->get();
    }
}
