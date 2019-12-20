@extends('back.layouts.master')
@section('content')
@section('title','Tüm Albümler')




        <div class="starter-template">

        <div class="row">
          @foreach($albums as $album)
            <div class="col-lg-3">
              <div class="thumbnail" style="min-height: 514px;">
                <img alt="{{$album->name}}" src="/albums/{{$album->cover_image}}" width="50%">
                <div class="caption">
                  <h3>{{$album->name}}</h3>
                  <p>{{$album->description}}</p>
                  <p>{{count($album->Photos)}} Resim Var.</p>
                  <p>Oluşturulma Tarihi:  {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
                  <p><a href="{{route('admin.show_album',array('id'=>$album->id))}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Albümü Göster</a></p>
                </div>
              </div>
            </div>
          @endforeach
        </div>

      </div><!-- /.container -->



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
