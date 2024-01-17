<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Technology;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $categories = Category::all();
        $technologies = Technology::all();

        return view('home', compact('projects', 'categories', 'technologies'));
    }
}
