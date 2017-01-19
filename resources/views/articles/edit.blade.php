<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>Edit the Article</h1>
                    <form method="POST" action="/article/{{$article->id}}">
                        {{method_field('PATCH')}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            Title:
                            <input name="title" type="text" value="{{$article->title}}" class="form-control">
                            Content:
                            <textarea name="content" wrap="hard" class="form-control">{{$article->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







