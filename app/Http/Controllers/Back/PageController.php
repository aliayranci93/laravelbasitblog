<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class PageController extends Controller
{
    public function index(){
      $pages = Page::all();
      return view('back/pages/index',compact('pages'));
    }

    public function add(){
      return view('back/pages/create');
    }

    public function addData(Request $request){
      $lastPage = Page::orderBy('order','DESC')->first();

      $request->validate([
        'title'=>'min:3',
        'image'=>'required|image|mimes:jpeg,jpg,png|max:2048',
      ]);

      // dd($request->post());
      $page= new Page;
      $page->title = $request->title;
      $page->content = $request->content;
      $page->slug = Str::slug($request->title);
      $page->statu = $request->statu;
      $page->hit = "0";
      if($request->order){
        $page->order = $request->order;
      }
      else { $page->order = $lastPage->order+1; }



      if($request->hasFile("image")){
        $imageName = Str::slug($request->title).'-'.$request->image->getClientOriginalName();
        $request->image->move(public_path("uploads/pages/"),$imageName);
        $page->image="uploads/pages/".$imageName;
      }
      else {  return "Resim yüklenirken hata"; die; }
      $page->save();
      toastr()->success('Sayfa Başarılı!', 'Sayfa Başarıyla Oluşturuldu.');
      return redirect()->route('admin.page.index');
    }

    public function update($id){
      $page = Page::findOrFail($id); //makale yoksa 404 atar.
      return view('back/pages/edit',compact('page'));
    }

    public function updateData(Request $request,$id){

      $request->validate([
        'title'=>'min:3',
        'image'=>'image|mimes:jpeg,jpg,png|max:2048',
      ]);

      // dd($request->post());
      $page= Page::findOrFail($id);
      $page->title = $request->title;
      $page->content = $request->content;
      $page->slug = Str::slug($request->title);
      $page->statu = $request->statu;
      $page->order = $request->order;;

      if($request->hasFile("image")){
        $imageName = Str::slug($request->title).'-'.$request->image->getClientOriginalName();
        $request->image->move(public_path("uploads/pages/"),$imageName);
        $page->image="uploads/pages/".$imageName;
      }

      $page->save();
      toastr()->success('Sayfa Başarı ile Güncellendi!', 'Sayfa Başarıyla Güncellendi.');
      return redirect()->route('admin.page.index');
    }

    public function delete($id)
    {
      $page = Page::find($id);
//file DELETE
      if(File::exists($page->image)){
        File::delete(public_path($page->image));
       }

       $page->forceDelete();
      toastr()->success('Başarılı!', 'Sayfa Tamamen Silindi.');
      return redirect()->back();
    }


}
