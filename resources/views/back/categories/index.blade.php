@extends('back.layouts.master')
@section('content')
@section('title','Tüm Kategoriler')


<div class="row">
<div class="col-md-4">
  <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{route('admin.category.add')}}">
                      @csrf
                    <fieldset>
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="statu">Durum</label>
                        <select name="statu" class="form-control">
                          <option value="1">Aktif</option>
                          <option value="0">Pasif</option>
                        </select>

                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label for="name">Kategori Adı</label>
                      <input  name="name" type="text" placeholder="Kategori Adı" class="form-control input-md" required="">
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                      <button id="button" name="button" class="btn btn-info">Ekle</button>
                    </div>

                    </fieldset>
                    </form>
                  </div>
    </div>
</div>

<div class="col-md-8">
  <div class="card shadow mb-4">

                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tüm Kategoriler</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Kategori Adı</th>
                            <th>Slug</th>
                            <th>Oluşturma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Kategori Adı</th>
                            <th>Slug</th>
                            <th>Oluşturma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                          </tr>
                        </tfoot>
                        <tbody>

                          @foreach ($categories as $category)
                            <tr>

                              <td>{{$category->name}}</td>
                              <td>{{$category->slug}}</td>
                              <td>{{$category->created_at}}</td>
                              <td>{{$category->updated_at}}</td>
                              <td><input name = "switch" type="checkbox" class="switch" category-id="{{$category->id}}" data-onstyle="success" data-offstyle="danger" @if($category->statu=="1") checked @else  @endif data-toggle="toggle" data-on="Aktif" data-off="Pasif"></td>
                              <td>
                                <a href="#" title="Düzenle" class="btn btn-sm btn-primary kategoriDuzenle"  category-id="{{$category->id}}"><i class="fa fa-pen"></i></a>

                                <a href="#" title="kategoriSil" class="btn btn-sm btn-danger kategoriSil" category-id="{{$category->id}}" category-article-count="{{$category->getArticleCount()}}"><i class="fa fa-times"></i></a>

                              </td>
                            </tr>
                          @endforeach


                        </tbody>
                      </table>
                    </div>
                  </div>
    </div>
</div>
</div>
<!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal edit -->
  <div class="modal" id="duzenleModel">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Kategori Düzenle</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{route('admin.category.edit')}}">
            @csrf
            <input type="hidden" name="id" id="category_id"/>
            <label>Kategori Adı</label>
            <input id="name" type="text" class="form-control" name="name">
            <label>Kategori Slug</label>

            <input id="slug" type="text" class="form-control" name="slug"/>
            <label for="sel1">Durum:</label>
            <select id="statu" name="statu" class="form-control">
              <option value="1">Aktif</option>
              <option value="0">Pasif</option>
            </select>

            {{-- <label>Slug</label> --}}

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Kaydet</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <!-- The Modal sil -->
  <div class="modal" id="silModel">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Kategori Silmek İstediğinize Emin Misiniz ?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


          <div id="articleAlert" class="alert-danger">

          </div>


        <!-- Modal footer -->
        <div class="modal-footer">
          <form method="post" action="{{route('admin.category.delete')}}">
            @csrf
          <button type="submit" class="btn btn-primary">Sil</button>
          <input type="hidden" name="id" id="deletedId"/>
        </form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
        </div>

      </div>
    </div>
  </div>
  <!-- The Modal sil -->



</div>
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script>
  $(function(){
debugger;
//. olursa class="" bakar # olursa id="" ye bakar

$('.kategoriSil').click(function(){
    id = $(this)[0].getAttribute('category-id');
    $('#deletedId').val(id); // id 'yi' inputa bastık. id="deletedId" olan inputa
    kategoriMakaleSayisi = $(this)[0].getAttribute('category-article-count');
      $('#articleAlert').html('');
    if(kategoriMakaleSayisi>0){
      $('#articleAlert').html('Bu kategoriye ait '+kategoriMakaleSayisi+' makale bulunmaktadır. Silmek istediğinize emin misiniz ?');
    }
    $('#silModel').modal();
});

$('.kategoriDuzenle').click(function(){
    id = $(this)[0].getAttribute('category-id');
    $.ajax({
      type:'GET',
      url:'{{route('admin.category.getdata')}}',
      data:{id:id},
      success:function(data){
        $('#duzenleModel').modal();
        $('#name').val(data.name);// ideye göre basar içine - name inputda setvalue yapar göre kaydeder.
        $('#slug').val(data.slug);
        $('#statu').val(data.statu);
        $('#category_id').val(data.id);  // id="category_id" olanı doldurdu. göründüğü gibi
        console.log(data);
      }
    });
});

    $('.switch').change(function(){
      id = $(this)[0].getAttribute('category-id');
      statu = $(this).prop('checked');
      $.get("{{route('admin.category.switch')}}", {id:id,statu:statu},function(data,status){});
    });
  })
  </script>
@endsection


@endsection
