@extends('back.layouts.master')
@section('content')
@section('title','Tüm Makaleler')


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary float-right"><span>{{$articles->count()}}</span> Blog Bulundu</h6>
    <a href="{{route('admin.trashedArticle')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash">Silinen Bloglar</i></a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Resim</th>
            <th>Blog Başlığı</th>
            <th>Kategori</th>
            <th>Görüntülenme</th>
            <th>Oluşturulma Tarihi</th>
            <th>Durum</th>
            <th>Slug</th>
            <th>İşlemler</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Resim</th>
            <th>Blog Başlığı</th>
            <th>Kategori</th>
            <th>Görüntülenme</th>
            <th>Oluşturulma Tarihi</th>
            <th>Durum</th>
            <th>Slug</th>
            <th>İşlemler</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($articles as $article)
            <tr>
              <td><img src="{{URL::to('/'.$article->image)}}" width="100"></img></td>
              <td>{{$article->title}}</td>
              <td>{{$article->getCategory->name}}</td>
              <td>{{$article->hit}}</td>
              <td>{{$article->created_at}}</td>
              <td>{!!$article->statu=="0" ? "<span class='text-danger'> Pasif</span>":"<span class='text-success'> Aktif</span>"!!}</td>
              <td>{{$article->slug}}</td>
              <td>
                <a href="{{route('blogsingle',[$article->getCategory->slug,$article->slug])}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                <a href="{{route('admin.blog.edit',$article->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
              <form method="post" action="{{route('admin.blog.destroy',$article->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
              </form>
              </td>
            </tr>
          @endforeach


        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection
