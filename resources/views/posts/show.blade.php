@extends ('layout')

@section ('content')

    <div class="col-sm-8 blog-main">
        
        <h1>{{ $post->title }}</h1>

        {{ $post->body }}

        <hr>

        <div class="comments">

            @foreach ($post->comments as $comment)

                <li class="list-group-item">

                    {{ $comment->created_at->diffForHumans() }}: &nbsp;

                </article>
                    {{ $comment->body }}s
            @endforeach

    </div>

    <hr>

    <div class="card">

        <div class="card-block">

            <form method="POST" action="/posts/{{ $post->id }}/comments">

                {{ csrf_field() }}

                <div class="form-group">

                        <textarea name="body" placeholder="Your comment here." class="form-control"></textarea>

                </div>


                <div class="form-group">

                        <button type="submit" class="btn btn-primary">Add Comment</button>

                </div>


            </form>

        </div>
    
    </div>





@endsection