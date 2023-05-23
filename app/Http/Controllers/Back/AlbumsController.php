<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use Validator;
use Illuminate\Support\Str;



class AlbumsController extends Controller
{
  public function getList()
{
  
 $albums = Album::with('Photos')->get();
 return view('back.albums.index')->with('albums',$albums);
}
public function getAlbum($id)
{
 $album = Album::with('Photos')->find($id);
 return view('back.albums.album')->with('album',$album);
}
public function getForm()
{

 return view('back.albums.createalbum');
}
public function postCreate(Request $request)
{

 $rules = array(

   'name' => 'required',
   'cover_image'=>'required|image'

 );

 $validator = Validator::make($request->all(), $rules);
 if($validator->fails()){

   return redirect()->route('admin.create_album_form')->withErrors($validator);
 }

 $file = $request->cover_image;
 $random_name = Str::random(8);
 $destinationPath = 'albums/';
 $extension = $file->getClientOriginalExtension();
 $filename=$random_name.'_cover.'.$extension;
 $uploadSuccess = $request->cover_image->move($destinationPath, $filename);
 $album = Album::create(array(
   'name' => $request->name,
   'description' => $request->description,
   'cover_image' => $filename,
 ));

return view('back\albums\album',compact('album'));
}

public function getDelete($id)
{
 $album = Album::find($id);

 $album->delete();

 return redirect()->route('admin.album.index');
}
}
