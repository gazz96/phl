<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{


    public function index(Request $request)
    {
        $names = [
            'file_ijazah',
            'file_transkrip_nilai',
        ];

        foreach($names as $name)
        {
            if($request->hasFile($name))
            {
                
            }
        }
    }

}
