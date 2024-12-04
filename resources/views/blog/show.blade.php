
<!DOCTYPE html>
<html lang="en">

    @include('layouts.head')

<body>

    @include('layouts.nav')

    <aside>
        

    </aside>

    <main>
    <div class="container">

        <h1>Blogs</h1>
        <div class="col-lg-6 blog-form">

            <form  method="POST" id="blogupdate" action="{{ url('blog/update',['id'=>$blog->id])}}" enctype="multipart/form-data">
                @csrf

                <br><br> 
                
                <div class="form-group">
                    <label for="name">Blog Title</label><br><br>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="{{$blog->name}}" value="{{$blog->name}}">
                </div>

                <br>
    
                <div class="form-group">
                    <label for="date">Date</label><br><br>
                    <input type="date" name="date" id="date" class="form-control" required placeholder="{{$blog->date}}" value="{{$blog->date}}">
                </div>

                <br>
    
                <div class="form-group">
                    <label for="author">Author</label><br><br>
                    <input type="text" name="author" id="author" class="form-control" required placeholder="{{$blog->author}}" value="{{$blog->author}}">
                </div>

                <br>
    
                <div class="form-group">
                    <label for="content">Content</label><br><br>
                    <textarea name="content" id="content" class="form-control" rows="5" required placeholder="{{$blog->content}}" value="{{$blog->content}}"></textarea>
                </div>

                <br>
    
                <div class="form-group">
                    <label for="image">Image</label><br><br>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" required placeholder="{{$blog->image}}" value="{{$blog->image}}">
                </div>

                <br><br>
    
                <button type="submit" id="submit" class="btn btn-primary">Update Post</button>
            </form>

        </div>

    </div>

    <br><br>

    </main>

    <footer>
        footer
    </footer>

    <script type="text/javascript">
        // $(document).ready(function(){
        //     $("#blogupdate").submit(function(e){
        //         e.preventDefault();

        //         var form = $("#blogupdate")[0];
        //         var data = new FormData(form);

        //         $("#submit").prop("disabled", true);
        //         $.ajax({
        //             type: "PATCH",
        //             url: "{{ route('blog.update', $blog->id) }}",
        //             data: data,
        //             contentType: false,
        //             processData: false,
        //             success: function(data) {
        //                 alert(data.res);
        //             },
        //             error: function(e) {
        //                 console.error(e);
        //             }
        //         });
        //     });
        // });
    
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
