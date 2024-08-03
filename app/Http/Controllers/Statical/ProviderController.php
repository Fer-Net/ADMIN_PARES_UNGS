<?php

namespace App\Http\Controllers\Statical;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProviderController extends Controller
{
    public function getIndex()
    {
        return view('provider.index');
    }

    public function getCreate()
    {
        return view('provider.create');
    }
}


