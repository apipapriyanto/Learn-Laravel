@if ($posts->count() )

    @foreach ($posts as $post)
        <h1>{{ $post->title }}</h1>
    @endforeach
    
@endif