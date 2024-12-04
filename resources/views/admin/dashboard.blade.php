
<!DOCTYPE html>
<html lang="en">

    @include('layouts.head')

<body>

    @include('layouts.nav')

    <aside>

        <div class="search-filter">
            <form action="{{ url('admin/dashboard') }}" method="GET">
                <div class="form-group">
                    <label for="search">Search</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search blog posts...">
                </div>
                <div class="form-group">
                    <label for="sort">Sort By</label>
                    <select name="sort" id="sort" class="form-control">
                        <option value="">Select an option</option>
                        <option value="latest">Latest</option>
                        <option value="oldest">Oldest</option>
                        <option value="alphabetical">Alphabetical</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

    </aside>

    <main>


    <div class="container">

        <h1>Blogs</h1>
        <div class="col-lg-12 blog-form">

            <form  method="POST" id="newblog" enctype="multipart/form-data">
                @csrf

                <br><br> 
                
                <div class="form-group">
                    <label for="name">Blog Title</label><br><br>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <br>
    
                <div class="form-group">
                    <label for="date">Date</label><br><br>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>

                <br>
    
                <div class="form-group">
                    <label for="author">Author</label><br><br>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>

                <br>
    
                <div class="form-group">
                    <label for="content">Content</label><br><br>
                    <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                </div>

                <br>
    
                <div class="form-group">
                    <label for="image">Image</label><br><br>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                </div>

                <br><br>
    
                <button type="submit" id="submit" class="btn btn-primary">Save Post</button>
            </form>

        </div>

    </div>

    <br><br>


    <div class="container d-flex justify-content-center">
        <table class="table table-responsive text-center justify-content-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{$blog->name}}</td>
                    <td>{{$blog->date}}</td>
                    <td>{{$blog->author}}</td>
                    <td>{{$blog->content}}</td>
                    <td><img src="../images{{$blog->image}}" alt="{{$blog->name}}" width="100"></td>
                    <td class="d-flex justify-content-center gap-3">
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{route('blog.show',$blog->id)}}" class="btn btn-success">Modify</a>
                    </td>
                </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
    </main>

    <footer>



    </footer>

    <script type="text/javascript">
        $document.ready(function(){
            $("#newblog").submit(function(){
                e.preventDefault();

                var form = $("#newblog")[0];
                var data = new FormData(form);

                $("#submit").prop("disabled",true);
                $ajax({
                    type: "POST",
                    url: "{{ route('blog.store') }}",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data.res)
                    }
                    error:function(e){

                    }
                });
            });
        });
    

        // Delete Blog
        $(document).on('click', '.btn-danger', function(e){
        
            e.preventDefault();
            $.ajax({

                type: 'DELETE',
                url: "{{ url('blog.delete') }}/"+'/'+id,

                success: function(response) {
                    $('#newblog').reset();
                }
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>