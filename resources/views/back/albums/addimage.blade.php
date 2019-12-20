@extends('back.layouts.master')
@section('content')
@section('title','Albüme Resim Ekle')

      <div class="col-lg-6">
      <div class="form-group">
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>  {{$error}}</li>
            @endforeach
          </ul>
          </div>
        @endif
        <form name="addimagetoalbum" method="POST"action="{{route('admin.add_image_to_album')}}"enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="album_id"value="{{$album->id}}" />
          <fieldset>
            <legend>Resmi {{$album->name}} Albüme Ekle.</legend>
            <div class="form-group">
              <label for="description">Resim Açıklaması</label>
              <textarea name="description" type="text"class="form-control" placeholder="Resim Açıklaması Girebilirsiniz"></textarea>
            </div>
            <div class="form-group">
              <label for="image">Resim seç</label>
                      <input type="file" name="image" class="input-file" ></input>
            </div>
            <button type="submit" class="btnbtn-default">Resimi Ekle!</button>
          </fieldset>
        </form>
      </div>
    </div> <!-- /container -->


@section('css')

@endsection
@section('js')


@endsection

@endsection
