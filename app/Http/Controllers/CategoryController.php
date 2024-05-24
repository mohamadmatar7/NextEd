<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        
        // get all the programs of the category and the related courses of the programs with the related lessons of the courses with the related users of the courses

        $category = Category::with('programs', 'programs.courses', 'programs.courses.lessons', 'programs.courses.users')->find($category->id);
        return view('categories.show', compact('category'));

    }

}
