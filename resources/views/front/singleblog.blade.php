@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',asset($article->image))
@section('content')
<!-- Post Content -->

      <div class="col-lg-8 col-md-9 mx-auto">
        {!!$article->content!!}
        <br>
        <span class="text-danger font-weight-bold">Okunma Sayısı: <b>{{$article->hit}}</b></span>
        <!-- html content okumak için yukarıdaki gibi  arasına yazılıyor -->
      </div>
<hr>
@include('front.widget.category')
@endsection
