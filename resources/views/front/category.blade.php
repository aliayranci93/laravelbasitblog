@extends('front.layouts.master')
@section('title')
{{$category->name}}
@endsection
@section('content')<!-- değişken kısım -->
      <div class="col-lg-8 col-md-10 mx-auto">
          @include('front.widget.articleList')
      </div>

@include('front.widget.category')
@endsection<!-- değişken kısım bitti -->
