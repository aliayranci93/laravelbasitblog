@extends('back.layouts.master')
@section('content')
@section('title',$page->title.' Düzenle')


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary float-right"><span></span> Sayfa  Oluştur</h6>
  </div>
  <div class="card-body">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>  {{$error}}</li>
        @endforeach
      </ul>
      </div>
    @endif
    <form class="form-vertical" method="post" action="{{route('admin.page.updateData',$page->id)}}" enctype="multipart/form-data">
      @csrf
      <fieldset>
<!-- Form Name -->
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="category">Kategori</label>
      <div class="col-md-4">
        {{-- <select id="categoryId" name="categoryId" class="form-control">
          @foreach ($categories as $category)
            <option value="{{$category->id}}"  @if($page->categoryId==$category->id) selected @else "" @endif>{{$category->name}}</option>

          @endforeach
        </select> --}}
      </div>
    </div>

    <input type="hidden" name="id" value="{{$page->id}}">

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="baslik">Başlık</label>
      <div class="col-md-4">
      <input id="title" value="{{$page->title}}" name="title" type="text" placeholder="Sayfa Başlığı" class="form-control input-md" required="">
      <span class="help-block">Sayfa Başlığı Giriniz</span>
      </div>
    </div>

    <!-- File Button -->
    <div class="col-md-4">
    <img src="{{asset($page->image)}}" class="img-thumbnail" width="150"></img>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="image">Sayfa Resimi</label>
      <div class="col-md-4">
        <input type="file" name="image" class="input-file"></input>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="statu">Sayfa Durum</label>
      <div class="col-md-4">
        <select id="statu" name="statu" class="form-control">
          <option value="1" @if($page->statu=="1") selected @endif>Aktif</option>
          <option value="0" @if($page->statu=="0") selected @endif>Pasif</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="statu">Sayfa Sırası</label>
      <div class="col-md-4">
          <input id="order" value="{{$page->order}}" name="order" type="text" placeholder="Sayfa Sırası" class="form-control input-md" required="">
      </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="content">İçerik</label>
      <div class="col-md-12">
        <textarea class="form-control" id="editor" name="content">{!!$page->content!!}</textarea>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <div class="col-md-4">
        <button type="submit" class="btn btn-success">Sayfa Düzenle</button>
      </div>
    </div>

    </fieldset>
    </form>

  </div>
</div>
@endsection
@section('js')
<!-- include summernote css/js -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
$(document).ready(function() {
  $('#editor').summernote(
    {
      'height':300
    }
  );
});
</script>
@endsection
<!-- css section -->
@section('css')
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endsection
<!-- css section end -->
