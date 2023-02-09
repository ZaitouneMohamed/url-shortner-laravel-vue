<?php

namespace App\Http\Controllers;

use App\Models\urls;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class urlController extends Controller
{

    public function index($id) {
        $urls = urls::where('user_id',$id)->latest()->paginate(4);
        // $urls = urls::all();
        return response()->json($urls);
    }

    public function store(Request $request) {
        $this->validate($request,[
            'full_url' => 'required|url|unique:urls',
            'url_desc' => 'required|max:1000',
            'user_id' => 'required',
        ]);

        $url = urls::create([
            'full_url' => $request->full_url,
            'url_desc' => $request->url_desc,
            'shorten_url' => Str::random() ,
            'user_id' => $request->user_id,
            'visits' => 0,
        ]);
        return response()->json($url);
    }

    public function show($id) {
        $url = urls::find($id);
        $url->increment('visits');
        return redirect($url->full_url);
    }

    public function update($id , Request $request) {
        $this->validate($request,[
            'full_url' => 'required|url|unique:urls',
            'url_desc' => 'required|max:1000',
            'user_id' => 'required',
        ]);
        $url = urls::find($id);
        $url->update([
            'full_url' => $request->full_url,
            'url_desc' => $request->url_desc,
            'user_id' => $request->user_id,
        ]);
        return response()->json($url);
    }

    public function destroy($id) {
        $url = urls::find($id);
        $url->delete();
        return response()->json('good');

    }


}
