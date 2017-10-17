@extends('layout.master')


@section('content')
    <div class="col-sm-8 blog-main">
                <h1>{{$post->title}}</h1>


            {{$post->body}}

            <hr>

            <div class="comments">
                <ul class="list-group">
               @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{$comment->created_at->diffForHumans()}}
                        </strong>
                        {{$comment->body}}
                    </li>
                   @endforeach
                </ul>
            </div>

        <hr>

                <div ckass="card">
                    <div class="card-blog">
                       <form method="POST" action="/posts/{{ $post->id }}/comments">
{{--                           {{ method_field('PATCH') }}--}}
                                {{ csrf_field() }}
                           <div class="form-group">
                               <textarea name="body" placeholer="Your comment here" class="form-control">

                               </textarea>
                           </div>

                           <div class="form-group">
                               <button type="submit" class="btn btn-primary">Add Comment</button>
                           </div>
                       </form>
                    </div>

                </div>
    </div>
    @endsection