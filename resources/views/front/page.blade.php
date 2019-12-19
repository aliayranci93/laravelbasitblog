
@extends('front.layouts.master')
@section('title',$page->title)
@section('bg',$page->image)
@section('content')
<!-- Post Content -->

<div class="col-lg-8 col-md-10 mx-auto">
{!!$page->content!!}
<br>
<span class="text-danger font-weight-bold">Okunma Sayısı: <b>{{$page->hit}}</b></span>
</div>

<hr>
@include('front.widget.category')
@endsection
