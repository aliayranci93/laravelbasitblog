@if(count($articles))
@foreach ($articles as $article)
  <div class="post-preview">
    <a href="{{ route('blogsingle',[$article->getCategory->slug,$article->slug]) }}">
      <h2 class="post-title">
        {{ $article->title }}
      </h2>
      <img src="{{asset($article->image)}}" width="800" height="400"></img>
      <h3 class="post-subtitle">
              {!! Str::words($article->content, 35, '...') !!}
      </h3>
    </a>
    <p class="post-meta">Kategori:
      <a href="{{ $article->slug }}">{{ $article->getCategory->name }}</a>
      <span class="float-right">{{ $article->created_at->diffForHumans()}}</span></p>
      <!-- belirtilen tarih ne kadar önce hesaplayıp bastırma diffForHumans()
      $article->created_at->diffForHumans()
    -->
  </div>
@if (!$loop->last)
    <hr>
@endif
@endforeach

{{$articles->links()}} <!-- SAYFALAMA ENTEGRESİ  -->
@else
  <div class="alert alert-danger">
    <h2> @if(count($articles)==0 && isset($category)) {{$category->name}} kategorisine ait yazı bulunamadı. @endif  Blog Bulunamadı. </h2>
  </div>
@endif
