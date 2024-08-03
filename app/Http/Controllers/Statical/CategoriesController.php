<?php

namespace App\Http\Controllers\Statical;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    public function getIndex()
    {
        return view('categories.index');
    }

    public function getCreate()
    {
        return view('categories.create');
    }
}


