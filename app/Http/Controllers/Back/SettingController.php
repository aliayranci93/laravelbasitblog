<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
  public function switch(Request $request){

    $setting = Setting::findOrFail($request->id);
    $setting->aktif=$request->aktif=="true" ? 1:0;
    $setting->save();
    return $setting;
  }

  public function index(){

    $setting=Setting::orderBy('created_at','DESC')->find(1);
    // $data['articles']->withPath('/sayfa');    // SAYFALANDIRMA
    // $data['categoryArticleCount']=Category::articleCount;
    return view('back/settings/index',compact('setting'));
  }

  public function save(Request $request){
    $setting=Setting::where('id',$request->id)->first();

    $setting->baslik = $request->baslik;
    $setting->aciklama = $request->aciklama;
    $setting->anahtarKelimeler = $request->anahtarKelimeler;
    $setting->ekKodlar = $request->ekKodlar;
    $setting->footerYazisi = $request->footerYazisi;
    $setting->facebook = $request->facebook;
    $setting->instagram = $request->instagram;
    $setting->whatsapp = $request->whatsapp;
    $setting->youtube = $request->youtube;
    $setting->googleplus = $request->googleplus;


      if($request->hasFile("logo")){
      $logo = Str::slug($request->baslik).'-logo-'.$request->logo->getClientOriginalName();
      $request->logo->move(public_path("uploads"),$logo);
      $setting->logo="uploads/".$logo;
      }

      if($request->hasFile("favicon")){
      $logo = Str::slug($request->favicon).'-favicon-'.$request->favicon->getClientOriginalName();
      $request->favicon->move(public_path("uploads"),$logo);
      $setting->favicon="uploads/".$logo;
      }


    $setting->save();
    return redirect()->route('admin.setting.index');
  }
}
