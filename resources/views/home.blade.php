<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<div class="home-container-main">
  @foreach ($posts['data'] as $post)
  <div class="post-general" onclick="window.location.href='/post?id={{$post['id']}}'">
    <div>
      <label class="home-label-id">{{ $post['id'] }}</label>
    </div>
    <div>
      <label class="home-label-title">{{ $post['title'] }}</label>
    </div>
  </div>
  @endforeach
  <div class="post-pagination">
    @for ($i = 1; $i < $posts['length']/10 + 1; $i++)
      @if($i == $posts['page'])
        <a href="/home?page={{$i}}" class="active">
          <div>
            {{$i}}
          </div>
        </a>
      @else
        <a href="/home?page={{$i}}">
          <div>
            {{$i}}
          </div>
        </a>
      @endif
    @endfor
  </div>
</div>