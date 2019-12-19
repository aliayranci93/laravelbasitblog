<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>İletişim Sayfası</title>
  </head>
  <body>
    <!-- HATALARI AŞAĞIDAKİ GİBİ DÖNDÜRÜYORUZ -->
    <div style="background-color:red">
      @foreach ($errors->all() as $error)
        <h4>{{$error}}</h4>
      @endforeach
    </div>
    <!-- HATALARI AŞAĞIDAKİ GİBİ DÖNDÜRÜYORUZ -->
    <form method="post" action="{!! route('iletisim.post') !!}">
    @csrf
    <label> Ad Soyad</label></br>
    <input type="text" name = "adsoyad" value="{{old('adsoyad')}}"></input></br>
    <label>Şifre</label></br>
    <input type="password" name = "sifre" value="{{old('sifre')}}"></input></br>
    <label>Şifre Tek.</label></br>
    <input type="password" name = "sifre_confirmation" value="{{old('sifre_confirmation')}}" ></input></br>
    <!-- sifre ile eşlecekse name="sifre_confirmation" olucak arkada kuraldada
    'sifre'=>'required|min:6|confirmed', confirmed ifadesi olmalı -->
    <label> Mail</label></br>
    <input type="mail" name = "mail" value="{{old('mail')}}"></input></br>
    <label> İletişim Konusu</label></br>
    <textarea rows="3" name="mesaj">{{old('mesaj')}} </textarea></br>
    <select type="text" name = "konu">
    <option> İş teklifi</option>
    </select></br>
    <button type="submit">Gönder</button>
  </form>
  </body>
</html>
