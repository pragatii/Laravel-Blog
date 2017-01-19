@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>All Articles</h1>
            <ul class="list-group">
                @foreach($articles as $key->$article)
                    <li class="list-group-item">
                        <a href="/user/{{$article->user->id}}/timeline">{{$article->user->name}}</a>

                        <h4>{{$article->title}}</h4>

                        <p>{{$article->content}}</p>
                        {{--<a href="/article/{{$article->id}}/like" class="float:right">{{$likes}}Like&nbsp</a>--}}
                        <button id="likeToggle{{$key}}" onclick="likeArticle('{{$article->id}}','likeToggle{{$key}}')">Like</button>
                        <a href="/article/{{$article->id}}/comment" class="float:right">&nbspComment&nbsp</a>
                        @if($article->user->id==\Illuminate\Support\Facades\Auth::user()->id)
                            <a href="/article/{{$article->id}}/edit" class="float:right">&nbspEdit</a>

                        @endif
                    </li>
                    <br>

                @endforeach
            </ul>
        </div>
    </div>

    <script>
        function likeArticle(articleId,id) {
            $.ajax({
                url: "/article/"+articleId+"/like",
                success: function (result) {
                  /* if( $('#likeToggle').text()==('Like')){

                       $('#likeToggle').html('Unlike');
                   } else {
                       $('#likeToggle').html('Like');
                   }*/
                  console.log(result);
                    $('#likeToggle'+id).html(result);

                }
            });
        }
    </script>
@stop

