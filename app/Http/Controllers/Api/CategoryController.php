<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Fetch all the categories
     */
    public function index($hasPictures)
    {
        if ($hasPictures) {
            //return only categories that have pictures for the home component
            return CategoryResource::collection(Category::has('pictures')->get());
        }else {
            //return all the categories the upload component.
            return CategoryResource::collection(Category::all());
        }
    }
}
