<?php

namespace App\Http\Controllers;

use App\Models\AboutZawMinHtwe;
use App\Models\ShareSkill;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function shareSkills(){

        $shareSkills = ShareSkill::all();
        return view("blog-layouts.developer",compact("shareSkills"));
    }
}
