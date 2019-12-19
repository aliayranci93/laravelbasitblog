@extends('back.layouts.master')
@section('content')
@section('title','Site Ayarları')

<form class="form-horizontal" method="post" action="{{route('admin.setting.save')}}" enctype="multipart/form-data">
  @csrf
<fieldset>

<!-- Form Name -->
<legend>Site Ayarlarına İlişkin</legend>
  <input id="id" name="id" value="{{$setting->id}}" type="hidden">

  <div class="form-group">
    <label class="col-md-2 control-label" for="logo">Site Bakım Modu?</label>

        <input name = "switch" type="checkbox" class="switch" setting-id="{{$setting->id}}" data-onstyle="success" data-offstyle="danger" @if($setting->aktif=="1") checked @else  @endif data-toggle="toggle" data-on="Aktif" data-off="Pasif">

  </div>



  <div class="form-group">
    <label class="col-md-4 control-label" for="logo">Logo Görüntüsü</label>
    <div class="col-md-4">
        <img src="@if($setting->logo) {{asset($setting->logo)}} @else  {{asset('uploads/resim-yok.png')}} @endif" class="img-thumbnail" width="150"></img>
    </div>
  </div>

<!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="logo">Logo</label>
  <div class="col-md-4">
      <input type="file" name="logo" class="input-file"></input>
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="logo">Favicon Görüntüsü</label>
  <div class="col-md-4">
      <img src="@if($setting->favicon) {{asset($setting->favicon)}} @else  {{asset('uploads/resim-yok.png')}} @endif" class="img-thumbnail" width="150"></img>
  </div>
</div>

<!-- File Button -->
<div class="form-group">
<label class="col-md-4 control-label" for="logo">Favicon</label>
<div class="col-md-4">
    <input type="file" name="favicon" class="input-file"></input>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Sayfa Başlığı</label>
  <div class="col-md-4">
  <input id="baslik" name="baslik" type="text" value="{{$setting->baslik}}" placeholder="Site Sayfa Başlığı" class="form-control input-md">

  </div>
</div>

<!-- Textarea -->
<div class="form-group">

</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="anahtarKelimeler">Anahtar Kelimeler</label>
  <div class="col-md-4">
  <input id="anahtarKelimeler" name="anahtarKelimeler" value="{{$setting->anahtarKelimeler}}" type="text" placeholder="Anahtar Kelimeler" class="form-control input-md">

  </div>
</div>


<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ekKodlar">Ek Kodlar</label>
  <div class="col-md-4">
    <textarea class="form-control" id="ekKodlar" name="ekKodlar">{{$setting->ekKodlar}}</textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="footerYazisi">Footer Yazısı(HTML)</label>
  <div class="col-md-4">
    <textarea class="form-control" id="footerYazisi" name="footerYazisi">{{$setting->footerYazisi}}</textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ekKodlar">Açıklama</label>
  <div class="col-md-4">
    <textarea class="form-control" id="ekKodlar" name="aciklama">{{$setting->aciklama}}</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="facebookAdres">Facebook Adres</label>
  <div class="col-md-4">
  <input id="facebookAdres" name="facebook" type="text" value="{{$setting->facebook}}" placeholder="www.facebook.com/" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="instagramAdres">Instagram Adres</label>
  <div class="col-md-4">
  <input id="instagramAdres" name="instagram" type="text" value="{{$setting->instagram}}" placeholder="Instagram Adres" class="form-control input-md">
  <span class="help-block">instagram.com/</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="whatsappAdres">Whatsapp Adres</label>
  <div class="col-md-4">
  <input id="whatsappAdres" name="whatsapp" type="text" value="{{$setting->whatsapp}}" placeholder="whatsapp" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Youtube Adres">youtubeAdres</label>
  <div class="col-md-4">
  <input id="youtubeAdres" name="youtube" type="text" value="{{$setting->youtube}}" placeholder="youtube.com/" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="googlePlusAdres">Google Plus +</label>
  <div class="col-md-4">
  <input id="googlePlusAdres" name="googleplus" type="text" value="{{$setting->googleplus}}" placeholder="google.com" class="form-control input-md">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Kaydet</button>
  </div>
</div>

</fieldset>
</form>





</div>
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script>
  $(function(){
debugger;
//. olursa class="" bakar # olursa id="" ye bakar

$('.kategoriSil').click(function(){
    id = $(this)[0].getAttribute('category-id');
    $('#deletedId').val(id); // id 'yi' inputa bastık. id="deletedId" olan inputa
    kategoriMakaleSayisi = $(this)[0].getAttribute('category-article-count');
      $('#articleAlert').html('');
    if(kategoriMakaleSayisi>0){
      $('#articleAlert').html('Bu kategoriye ait '+kategoriMakaleSayisi+' makale bulunmaktadır. Silmek istediğinize emin misiniz ?');
    }
    $('#silModel').modal();
});

$('.kategoriDuzenle').click(function(){
    id = $(this)[0].getAttribute('category-id');
    $.ajax({
      type:'GET',
      url:'{{route('admin.category.getdata')}}',
      data:{id:id},
      success:function(data){
        $('#duzenleModel').modal();
        $('#name').val(data.name);// ideye göre basar içine - name inputda setvalue yapar göre kaydeder.
        $('#slug').val(data.slug);
        $('#statu').val(data.statu);
        $('#category_id').val(data.id);  // id="category_id" olanı doldurdu. göründüğü gibi
        console.log(data);
      }
    });
});

    $('.switch').change(function(){
      id = $(this)[0].getAttribute('setting-id');
      aktif = $(this).prop('checked');
      $.get("{{route('admin.setting.aktif.switch')}}", {id:id,aktif:aktif},function(data,status){});
    });
  })
  </script>
@endsection


@endsection
