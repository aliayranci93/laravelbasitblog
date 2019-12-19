<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
      return view('back/categories/index');
    }

    public function switch(Request $request){
      $category = Category::findOrFail($request->id);
      $category->statu=$request->statu=="true" ? 1:0;
      $category->save();
      return $request;
    }

    public function getData(Request $request){
      $category = Category::findOrFail($request->id);
      return response()->json($category);
    }

    public function add(Request $request){
      $isExist=Category::where('slug',Str::slug($request->name, '-'))->get();
      if(count($isExist)>0){
        toastr()->warning('Başarısız!', 'Kategori Daha Önce Eklendi!');
        return redirect()->route('admin.category.index');
      }
      else {
      $category = new Category;
      $category->name = $request->name;
      $category->slug = Str::slug($request->name, '-');
      $category->statu = $request->statu;
      $category->save();
      toastr()->success('Başarılı!', 'Kategori Başarı ile Eklendi!');
      return redirect()->route('admin.category.index');
    }

    }

    public function edit(Request $request){

      // $isExist=Category::where('slug',Str::slug($request->name, '-'))->get();
      // $isExistName=Category::where('name',$request->name)->get();
      // if(count($isExistName)>1){
      //   toastr()->warning('Başarısız!', 'Kategori Daha Önce Eklendi!');
      //   return redirect()->route('admin.category.index');
      // }
      // if(count($isExist)>1){
      //   toastr()->warning('Başarısız!', 'Kategori Slug Daha Önce Eklendi!');
      //   return redirect()->route('admin.category.index');
      // }
      // else {
      // $category = Category::find($request->id);
      // $category->name = $request->name;
      // $category->slug = Str::slug($request->name, '-');
      // $category->statu = $request->statu;
      // $category->save();
      // toastr()->success('Başarılı!', 'Kategori Başarı ile GÜncellendi!');

//VEYA
$isExist=Category::where('slug',Str::slug($request->name, '-'))->whereNotIn('id',[$request->id])->first();
// whereNotIn('id',[$request->id]) bu id dışındakilere bakmasını sağladık.
$isExistName=Category::where('name',$request->name)->whereNotIn('id',[$request->id])->first();
if($isExistName){
  toastr()->warning('Başarısız!', 'Kategori Daha Önce Eklendi!');
  return redirect()->route('admin.category.index');
}
if($isExist){
  toastr()->warning('Başarısız!', 'Kategori Slug Daha Önce Eklendi!');
  return redirect()->route('admin.category.index');
}
else {
$category = Category::find($request->id);
$category->name = $request->name;
$category->slug = Str::slug($request->name, '-');
$category->statu = $request->statu;
$category->save();
toastr()->success('Başarılı!', 'Kategori Başarı ile GÜncellendi!');


      return redirect()->route('admin.category.index');
    }
}


public function delete(Request $request){
  if($request->id!="1"){
  $category = Category::findOrFail($request->id);
  if($category->getArticleCount()>0){
    $article = Article::where('categoryId',$request->id)->update(['categoryId'=>'1']);
  }
  $category->delete();

  return redirect()->route('admin.category.index');
  }
  else {
  $category = Category::findOrFail($request->id);
  toastr()->warning('Başarısız!', $category->name.' ana kategori olduğu için silinemez.');
  return redirect()->route('admin.category.index');
  }

}



}
