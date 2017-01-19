@extends('layouts.app')

@section('content')
    <div id="modal" class="modal fade">
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h1>{{$user->name}}</h1>
            <br>

            <button id="toggleButton" onclick="togglePost()" type="button" class="btn btn-primary">Add Post</button>
            @if(count($errors))

                <div id="showDiv">
                    @else
                        <div id="showDiv" style="display: none;">
                            @endif
                            <h1>Post New Article</h1>

                            <form method="POST" action="/article">

                                {{csrf_field()}}


                                <div class="form-group">
                                    Title:
                                    <input name="title" class="form-control">
                                    Content:
                                    <textarea name="content" class="form-control"></textarea>

                                </div>

                                <div class="form-group">

                                    <button typt="submit" class="btn btn-primary">Done</button>
                                </div>
                                <hr>


                                @if(count($errors))

                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif

                            </form>
                        </div>
                        <h1>Your Articles</h1>
                        <ul class="list-group">
                            @foreach($user->articles as $userArticle)
                                <li class="list-group-item"><h4>{{$userArticle->title}}</h4>
                                    <p>{{$userArticle->content}}</p>
                                    <a href="#" class="float:right">Like&nbsp</a>
                                    <a href="#" class="float:right">&nbspComment&nbsp</a>
                                    @if($user->id==\Illuminate\Support\Facades\Auth::user()->id)
                                        {{--<a href="/article/{{$userArticle->id}}/edit" class="float:right">&nbspEdit</a>--}}
                                        <button id="button" onclick="showModal({{$userArticle->id}})">Edit</button>
                                    @endif
                                </li>

                                <br>

                            @endforeach
                        </ul>
                </div>
        </div>

        <script type="text/javascript">
            function togglePost() {
                if ($('#toggleButton').text() == "Add Post") {
                    $('#toggleButton').html('Close');
                } else {
                    $('#toggleButton').html('Add Post');
                }
                $('#showDiv').delay(200).slideToggle('slow');
            }
            function showModal(id) {
                $.ajax({
                    url: "/article"+id+"/edit",
                    success: function (result) {
                        $('#modal').html(result);
                        $('#modal').modal('show');
                    }
                });
            }
        </script>


@stop