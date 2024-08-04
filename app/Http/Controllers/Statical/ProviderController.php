<?php

namespace App\Http\Controllers\Statical;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Provider;

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

    public function getEdit($id)
    {
        $data["provider"] = Provider::find($id);
        return view('provider.edit' , $data);
    }
}


