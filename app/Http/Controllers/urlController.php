<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class urlController extends Controller
{
    public function store(Request $request) {
        $this->validate($request,[
            'full_url' => 'required|url',
            'url_desc' => 'required',
            'user_id' => 'required',
        ]);
    }
}
