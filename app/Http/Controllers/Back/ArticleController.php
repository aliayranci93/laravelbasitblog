<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles']=Article::orderBy('created_at','DESC')->paginate();
        return view('back/blogs/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back/blogs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title'=>'min:3',
        'image'=>'required|image|mimes:jpeg,jpg,png|max:2048',
      ]);

      // dd($request->post());
      $article= new Article;
      $article->categoryId = $request->categoryId;
      $article->title = $request->title;
      $article->content = $request->content;
      $article->slug = Str::slug($request->title);
      $article->statu = $request->statu;

      if($request->hasFile("image")){
        $imageName = Str::slug($request->title).'-'.$request->image->getClientOriginalName();
        $request->image->move(public_path("uploads"),$imageName);
        $article->image="uploads/".$imageName;
      }
      else {  return "Resim yüklenirken hata"; die; }
      $article->save();
      toastr()->success('Blog Başarılı!', 'Blog Başarıyla Oluşturuldu.');
      return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $article = Article::findOrFail($id); //makale yoksa 404 atar.
      return view('back/blogs/edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title'=>'min:3',
        'image'=>'image|mimes:jpeg,jpg,png|max:2048',
      ]);

      // dd($request->post());
      $article= Article::findOrFail($id);
      $article->categoryId = $request->categoryId;
      $article->title = $request->title;
      $article->content = $request->content;
      $article->slug = Str::slug($request->title);
      $article->statu = $request->statu;

      if($request->hasFile("image")){
        $imageName = Str::slug($request->title).'-'.$request->image->getClientOriginalName();
        $request->image->move(public_path("uploads"),$imageName);
        $article->image="uploads/".$imageName;
      }

      $article->save();
      toastr()->success('Blog Başarı ile Güncellendi!', 'Blog Başarıyla Güncellendi.');
      return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        toastr()->success('Başarılı!', 'Blog Geri Dönüşüm Kutusuna Taşındı.');
        return redirect()->route('admin.blog.index');
    }
    public function hardDestroy($id)
    {
        $article = Article::onlyTrashed()->find($id);
//file DELETE
        if(File::exists($article->image)){
          File::delete(public_path($article->image));
         }

         $article->forceDelete();
        toastr()->success('Başarılı!', 'Blog Tamamen Silindi.');
        return redirect()->back();
    }

    public function trashed(Request $request)
    {
      $articles = Article::onlyTrashed()->orderBy('deleted_at','DESC')->get();
      return view('back.blogs.trashed',compact('articles'));
    }

    public function recover($id)
    {
      $trashedArticle = Article::onlyTrashed()->find($id)->restore();
      toastr()->success('Başarılı!', 'Blog Başarıyla Kurtarıldı.');
      return redirect()->route('admin.blog.index');

      // $articles = Article::onlyTrashed()->orderBy('deleted_at','DESC')->get();
      // return view('back.blogs.trashed',compact('articles'));
    }
}
