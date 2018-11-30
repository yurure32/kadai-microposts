<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\User;

class UploadContentController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function update(Request $request, $upload)
    {
        
        $this->validate($request, [
            'myfile' => 'required|image',
            'name' => 'required|string|max:255',
            ]);

        $image = $request->file('myfile');

        //if($image) {
            /**
             * 自動生成されたファイル名が付与されてS3に保存される。
             * 第三引数に'public'を付与しないと外部からアクセスできないので注意。
             */
            $path = Storage::disk('s3')->putFile('yurure32-microposts', $image, 'public');
    
            /* 上記と同じ */
            // $path = $image->store('myprefix', 's3');
    
            /* 名前を付与してS3に保存する */
            // $filename = 'hoge.jpg';
            // $path = Storage::disk('s3')->putFileAs('myprefix', $image, $filename, 'public');
    
            /* ファイルパスから参照するURLを生成する */
            $url = Storage::disk('s3')->url($path);
        //}
        
        $user = User::find($upload);
        $user->s3url = $url;
        $user->name = $request->name;
        $user->save();        
                
        return redirect()->back();
    }
}
