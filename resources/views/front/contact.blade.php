@extends('front.layouts.master')
@section('title','İletişim')
@section('bg',public_path().'\front\img\contact-bg.jpg')
@section('content')
  <div class="col-md-6">
    <p>İletişim Sayfamız</p>
    @foreach ($errors->all() as $error)
      <div class="alet alert-danger">
      {{$error}}
    </div>
    @endforeach
    <form method="post" action="{{route('contact.post')}}">
      @csrf
      <div class="control-group">
        <div class="alet alert-success">
          @if(session('success'))
            {{session('success')}}
          @endif
        </div>
        <div class="form-group floating-label-form-group controls">
          <label>Ad Soyad</label>
          <input type="text" class="form-control" value="{{old('adsoyad')}}" placeholder="Ad Soyad" name="adsoyad" data-validation-required-message="Lütfen ad soyad giriniz">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Email Adresi</label>
          <input type="email" class="form-control" value="{{old('email')}}" placeholder="Email Adres" name="email" required data-validation-required-message="Lütfen Email Adresini giriniz.">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
          <label>Telefon Numarası</label>
          <input type="tel" class="form-control" value="{{old('telefon')}}" placeholder="Telefon Numarası" name="telefon" required data-validation-required-message="Lütfen Telefon Numaranızı Giriniz.">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
          <label>Konu</label>
          <input type="text" class="form-control" value="{{old('konu')}}" placeholder="Konu" name="konu" required data-validation-required-message="Lütfen konu giriniz.">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Message</label>
          <textarea rows="5" class="form-control" placeholder="Mesaj" name="mesaj" required data-validation-required-message="Lütfen mesajınızı giriniz.">{{old('mesaj')}}</textarea>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <br>

      <div class="form-group">
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder</button>
      </div>
    </form>
  </div>


  <div class="col-md-6">
    <div id="map-container-google-1" class="z-depth-1-half map-container" style="width:500px">
  <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
    style="border:0" allowfullscreen></iframe>
</div>


  </div>
<hr>
{{--@include('front.widget.category') --}}
@endsection
