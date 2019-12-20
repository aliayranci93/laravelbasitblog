@extends('back.layouts.master')
@section('content')
@section('title','Tüm Albümler')


        <div class="row">
    <div class="col-lg-4">
      <div class="thumbnail" style="max-height: 600px;min-height: 400px;">
          <img class="media-object pull-left"alt="{{$album->name}}" src="/albums/{{$album->cover_image}}" width="350px">
      </div>
    </div>

    <div class="col-lg-4">
            <div class="thumbnail" style="max-height: 300px;min-height: 300px;">
      <div class="caption">
        <h2 class="media-heading" style="font-size: 26px;">Albüm İsmi:</h2>
        <p>{{$album->name}}</p>
        <h2 class="media-heading" style="font-size: 26px;">Albüm Açıklaması :</h2>
        <p>{{$album->description}}<p>
      </div>
      <a href="{{route('admin.add_image',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary btn-large">Albüme Yeni Resim Ekle</button></a>
      <a href="{{route('admin.delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are yousure?')"><button type="button"class="btn btn-danger btn-large">Albümü Sil</button></a>
    </div>
        </div>
        </div>


      <div class="row">
        @foreach($album->Photos as $photo)
          <div class="col-lg-4">
            <div class="thumbnail" style="max-height: 350px;min-height: 400px;">
              <img alt="{{$album->name}}" src="/albums/{{$photo->image}}">
              <div class="caption">
                <p>{{$photo->description}}</p>
                <p><p>Created date:  {{ date("d F Y",strtotime($photo->created_at)) }} at {{ date("g:ha",strtotime($photo->created_at)) }}</p></p>
                <a href="{{route('admin.delete_image',array('id'=>$photo->id))}}" onclick="return confirm('Are you sure?')"><button type="button" class="btnbtn-danger btn-small">Resmi Sil </button></a>
              </div>
            </div>
          </div>
        @endforeach
      </div>





@section('css')
  <style>

    .starter-template {
      padding: 40px 15px;
      text-align: center;
    }
  </style>
@endsection
@section('js')


@endsection

@endsection
