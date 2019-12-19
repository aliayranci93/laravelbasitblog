<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

//Models
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Setting;
// use App\Models\Setting;
use Validator;

class HomePageController extends Controller
{
  public function __construct(){
    $setting = Setting::find(1);
    if($setting->aktif=="0"){
      return redirect()->to('bakim-mod')->send();
    }
  }
  public function index(){

    $data['articles']=Article::orderBy('created_at','DESC')->paginate(2);
    $data['articles']->withPath('/sayfa');    // SAYFALANDIRMA

    // $data['categoryArticleCount']=Category::articleCount;
    return view('front/homepage',$data);
  }

  public function singleBlog($category,$slug){
    $categoryDegeri = Category::where('slug',$category)->first() ?? abort(404,'Böyle Bir Kategori Bulunamadı');
    $articleVarMi= Article::where('slug',$slug)->where('categoryId',$categoryDegeri->id)->first() ?? abort(404,'Böyle Bir Post Bulunamadı');
    $articleVarMi->increment('hit');
    $data['article']=$articleVarMi;
    return view('front/singleblog',$data);

  }

  public function category($slug){
  $categoryDegeri = Category::where('slug',$slug)->first() ?? abort(404,'Böyle Bir Kategori Bulunamadı');
  $articleVarMi= Article::where('categoryId',$categoryDegeri->id)->orderBy('created_at','DESC')->paginate(2);
  $data['category']=$categoryDegeri;
  $data['articles']=$articleVarMi;
  return view('front/category',$data);
  }

  public function page($slug){
    $page=Page::where('slug',$slug)->first() ?? abort(404,'Böyle Bir Sayfa Yok');
    $data['page']=$page;
    $page->increment('hit');

    return view('front/page',$data);
  }

  public function contact(){
    $data[]="";
    return view('front/contact',$data);
  }

  public function contactPost(Request $request){
    $rules=[
      'adsoyad'=>'required|min:5',
      'email'=>'required|email',
      'telefon'=>'required|numeric|min:11',
      'konu'=>'required|min:5',
      'mesaj'=>'required|min:50',
    ];
    $validate = Validator::make($request->post(),$rules);
    if($validate->fails()){
      return redirect()->route('contact')->withErrors($validate)->withInput();
    }

Mail::send([],[],function($message) use($request){
$message->from('iletisim@blogsitesi.com','Blog Sitesi');
$message->to('aliayranci93@gmail.com');
$message->setBody('Mesaj Gönderen:'.$request->adsoyad.'</br>
  Mesajını Gönderen Mail :'.$request->email.'</br>
  Mesaj konusu :'.$request->konu.'</br>
  Mesaj:'.$request->mesaj.'</br></br>
  Mesaj Gönderme Tarihi : '.now().'','text/html');
$message->subject($request->adsoyad.' iletişimden mesaj geldi.');
});


    $contact = new Contact;
    $contact->adsoyad = $request->adsoyad;
    $contact->email = $request->email;
    $contact->telefon = $request->telefon;
    $contact->konu = $request->konu;
    $contact->mesaj = $request->mesaj;
    $contact->save();
    return redirect()->route('contact')->with('success','İletişim Mesajı Başarıyla İletildi.');

  }

  public function photogallery(){
    $data[]="";
    return view('front/photogallery',$data);
  }


}
