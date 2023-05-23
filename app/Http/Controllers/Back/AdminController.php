<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //
    public function index(){

      $admin=Admin::orderBy('created_at','DESC')->find(1);
      // $data['articles']->withPath('/sayfa');    // SAYFALANDIRMA
      // $data['categoryArticleCount']=Category::articleCount;
      return view('back/admin/index',compact('admin'));
    }

    public function save(Request $request){
      // dd($request->all());
      $admin=Admin::orderBy('created_at','DESC')->find(1);
      $admin->name=$request->name;
      $admin->email=$request->email;
      $admin->password=bcrypt($request->password);
      $admin->save();

      return redirect()->route('admin.logout');
    }
}
