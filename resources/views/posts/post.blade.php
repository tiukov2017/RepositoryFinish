<div class="blog-post">


    <a href="/posts/{{$post->id}}">

        <h2 class="blog-post-title"> {{ $post->title }} </h2>

    </a>

    <p class="blog-post-meta">{{$post->created_at}}


    </p>

    <h1 class="blog-post-title">{{ $post->body }}</h1>

</div><!-- /.blog-post -->
