<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Images;
use Validator;
use Illuminate\Support\Str;

class ImagesController extends Controller
{
  public function getForm($id)
  {
     $album = Album::findOrFail($id);
    return view('back.albums.addimage')->with('album',$album);
  }

  public function postAdd(Request $request)
  {
    $rules = array(

      'album_id' => 'required|numeric|exists:albums,id',
      'image'=>'required|image'

    );

  $validator = Validator::make($request->all(), $rules);
    if($validator->fails()){
      return  redirect()->route('admin.add_image',$request->album_id)->withErrors($validator);

    }

    $file = $request->image;
    $random_name = Str::random(8);
    $destinationPath = 'albums/';
    $extension = $file->getClientOriginalExtension();
    $filename=$random_name.'_album_image.'.$extension;
    $uploadSuccess = $request->image->move($destinationPath, $filename);
    $images = Images::create(array(
      'description' => $request->description,
      'image' => $filename,
      'album_id'=> $request->album_id
    ));
      $album=Album::find($images->album_id);
    return view('back\albums\album',compact('album'));
  }
  public function getDelete($id)
  {

    $image = Images::findOrFail($id);
    $album=Album::findOrFail($image->album_id);
    $image->delete();
    return view('back\albums\album',compact('album'));
  }
}
