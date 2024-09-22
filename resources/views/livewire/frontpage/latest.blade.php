<div>
    <h2>Latest posts</h2>

    @foreach($posts as $post)
        <livewire:frontpage.post :$post />
    @endforeach
</div>
