<div>
    <h2>Latest posts</h2>

    @foreach($posts as $post)
        <livewire:post.post :$post />
    @endforeach
</div>
