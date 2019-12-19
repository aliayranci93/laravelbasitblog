@extends('back.layouts.master')
@section('content')
@section('title','Admin Ayarları')

<form class="form-horizontal" method="post" action="{{route('admin.profile.save')}}" enctype="multipart/form-data">
  @csrf
<fieldset>

<!-- Form Name -->
<legend>Admin Ayarları</legend>
  <input id="id" name="id" value="{{$admin->id}}" type="hidden">







<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="whatsappAdres">Kullanıcı Adı</label>
  <div class="col-md-4">
  <input id="name" name="name" type="text" value="{{$admin->name}}" placeholder="kullanicı adı" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Youtube Adres">Email Adres</label>
  <div class="col-md-4">
  <input id="email" name="email" type="email" value="{{$admin->email}}" placeholder="example@google.com" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="googlePlusAdres">Şifre</label>
  <div class="col-md-4">
  <input id="password" name="password" type="password"  class="form-control input-md">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" class="btn btn-primary">Kaydet</button>
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
