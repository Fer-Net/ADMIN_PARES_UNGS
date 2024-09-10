<?php

namespace App\Http\Controllers\Statical;

use App\Http\Controllers\Controller;
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


