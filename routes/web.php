<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('bakim-mod',function(){
  return view('front.bakim');
});

// BACK ROOT -----------//name('admin.') name('admin.logout') yazmamıza gerek bırakmadı.Aynı şeye karlışık geliyor.
Route::prefix('admin')->name('admin.')->middleware(['GirisMi'])->group(function(){
Route::get('giris','Back\AuthController@login')->name('login');
Route::post('giris','Back\AuthController@loginPost')->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware(['AdminMi'])->group(function(){ // route group yapısı admin/giris belirtmiş olduk.
  Route::get('blog/silinenBloglar','Back\ArticleController@trashed')->name('trashedArticle');
  Route::get('blog/kurtar/{id}','Back\ArticleController@recover')->name('recoverArticle');
  Route::get('blog/kesinsil/{id}','Back\ArticleController@hardDestroy')->name('hardDeleteArticle');
  Route::get('panel','Back\DashboardController@index')->name('dashboard');
  Route::get('logout','Back\AuthController@logout')->name('logout');
  //blog root
  Route::resource('blog','Back\ArticleController'); //    /makaleler dedikten sonraki root işleri.
  //blog root
  //kategori root
  Route::get('/kategoriler','Back\CategoryController@index')->name('category.index');
  Route::get('/kategoriler/durum','Back\CategoryController@switch')->name('category.switch');
  Route::get('/kategoriler/data','Back\CategoryController@getData')->name('category.getdata');
  Route::post('/kategoriler/ekle','Back\CategoryController@add')->name('category.add');
  Route::post('/kategoriler/duzenle','Back\CategoryController@edit')->name('category.edit');
  Route::post('/kategoriler/sil','Back\CategoryController@delete')->name('category.delete');
  //kategori root
  //pages root
  Route::get('/sayfalar','Back\PageController@index')->name('page.index');
  Route::get('/sayfalar/ekle','Back\PageController@add')->name('page.add');
  Route::post('/sayfalar/ekleData','Back\PageController@addData')->name('page.addData');
  Route::get('/sayfalar/duzenle/{id}','Back\PageController@update')->name('page.update');
  Route::get('/sayfalar/sil/{id}','Back\PageController@delete')->name('page.delete');
  Route::post('/sayfalar/duzenleData/{id}','Back\PageController@updateData')->name('page.updateData');
  //pages root


//setting
  Route::get('/ayarlar','Back\SettingController@index')->name('setting.index');
  Route::post('/ayarlar','Back\SettingController@save')->name('setting.save');
  Route::get('/setting/durum','Back\SettingController@switch')->name('setting.aktif.switch');

//admin
    Route::get('/admin/profile','Back\AdminController@index')->name('profile');
    Route::post('/admin/profile','Back\AdminController@save')->name('profile.save');


    //AlbumsController
Route::get('/album', 'Back\AlbumsController@getList')->name('album.index');
Route::get('/album/createalbum', 'Back\AlbumsController@getForm')->name('create_album_form');
Route::post('/album/createalbum', 'Back\AlbumsController@postCreate')->name('create_album');
Route::get('/album/deletealbum/{id}', 'Back\AlbumsController@getDelete')->name('delete_album');
Route::get('/album/album/{id}', 'Back\AlbumsController@getAlbum')->name('show_album');

Route::get('/addimage/{id}', 'Back\ImagesController@getForm')->name('add_image');
Route::post('/addimage', 'Back\ImagesController@postAdd')->name('add_image_to_album');
Route::get('/deleteimage/{id}', 'Back\ImagesController@getDelete')->name('delete_image');


});




// FRONT ROOT
Route::get('/fotografgalerisi','Front\HomePageController@photogallery')->name('photogallery');
Route::post('/iletisim','Front\HomePageController@contactPost')->name('contact.post');
Route::get('/iletisim','Front\HomePageController@contact')->name('contact');
Route::get('/','Front\HomePageController@index')->name('homepage');
Route::get('/kategori/{category}','Front\HomePageController@category')->name('category');
Route::get('/{category}/{slug}','Front\HomePageController@singleBlog')->name('blogsingle');
Route::get('/{sayfa}','Front\HomePageController@page')->name('page');
