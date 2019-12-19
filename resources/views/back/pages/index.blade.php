@extends('back.layouts.master')
@section('content')
@section('title','Tüm Sayfalar')


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary float-right"><span>{{$pages->count()}}</span> Sayfa Bulundu</h6>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Resim</th>
            <th>Sayfa Başlığı</th>
            <th>Görüntülenme</th>
            <th>Oluşturulma Tarihi</th>
            <th>Durum</th>
            <th>Slug</th>
            <th>Sıralama</th>
            <th>İşlemler</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Resim</th>
            <th>Sayfa Başlığı</th>
            <th>Görüntülenme</th>
            <th>Oluşturulma Tarihi</th>
            <th>Durum</th>
            <th>Slug</th>
            <th>Sıralama</th>
            <th>İşlemler</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($pages as $page)
            <tr>
              <td><img src="{{URL::to('/'.$page->image)}}" width="100"></img></td>
              <td>{{$page->title}}</td>
              <td>{{$page->hit}}</td>
              <td>{{$page->created_at}}</td>
              <td>{!!$page->statu=="0" ? "<span class='text-danger'> Pasif</span>":"<span class='text-success'> Aktif</span>"!!}</td>
              <td>{{$page->slug}}</td>
              <td>{{$page->order}}</td>
              <td>
                <a href="{{route('page',$page->slug)}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                <a href="{{route('admin.page.index')."/duzenle/".$page->id}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                <a href="{{route('admin.page.delete',$page->id)}}" title="Düzenle" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>

              </td>
            </tr>
          @endforeach


        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection
