<x-admin-master>
    @section('content')
        <h1>create</h1>
        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
           @csrf
        <div class="form-group">
                 <label for="title"></label>
                  <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="ENTER TITLE">
        </div>
            <div class="form-group">
                 <label for="file"></label>
                  <input type="file" name="post_image" class="form-control" id="post_image">
        </div>

        <div class="form-group">
            <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection
</x-admin-master>
