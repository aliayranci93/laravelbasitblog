@extends('back.layouts.master')
@section('content')
@section('title','Albüm Ekle')


        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>  {{$error}}</li>
            @endforeach
          </ul>
          </div>
        @endif
    <div class="col-lg-6">
        <form name="createnewalbum" method="POST"action="{{route('admin.create_album')}}"enctype="multipart/form-data">
          @csrf
          <fieldset>
            <legend>Albümü Oluştur</legend>
            <div class="form-group">
              <label for="name">Albüm İsmi</label>
              <input name="name" type="text" class="form-control"placeholder="Albüm İsmi Giriniz"value="{{old('name')}}" required>
            </div>
            <div class="form-group">
              <label for="description">Albüm Açıklaması</label>
              <textarea name="description" type="text"class="form-control" placeholder="Albüm Açıklaması Girebilirsiniz" >{{old('descrption')}}</textarea>
            </div>
            <div class="form-group">
              <label for="cover_image">Albüm Kapak Resmi</label>
              <input type="file" name="cover_image" class="input-file" required></input>
            </div>
            <button type="submit" class="btnbtn-default">Oluştur!</button>
          </fieldset>
        </form>
      </div>



    @section('css')

    @endsection
    @section('js')


    @endsection

    @endsection
