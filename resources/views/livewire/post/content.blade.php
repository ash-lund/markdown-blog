<div class="post">
    <h3>
        <a href="{{ $post['slug'] }}">{{ $post['title'] }}</a>
    </h3>
    <div class="content">{!! $post['content'] !!}</div>
    <span>Published at: {{ $post['published_at'] }}</p>
    <div class="categories">
        <span>Categories:</span>
        <ul>
            @foreach($post['categories'] as $category)
                <li>{{ $category }}</li>
            @endforeach
        </ul>
    </div>
</div>
