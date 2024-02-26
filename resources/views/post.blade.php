<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Blog</title>
</head>
<body>
    
    <div class="container" style="margin-top: 50px">
        <div class="bg-blue p-2 rounded mb-2" style="background-color: #7852b2">
            <p class="text-white text-center mb-0">Post List</p>
        </div>
        <div class="mt-2 mb-2 text-right">
            <p>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit"> Logout </button>
                </form>
            </p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category }}</td>
                        <td><img style="width: 25px; height: 20px;" src="{{ $post->image }}" /></td>
                        <td>{{ $post->tags }}</td>
                        <td>
                        <a type="button" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        @csrf
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><b>Start Date:</b> {{ $post->start_date }}</p>
                                    <p><b>End Date:</b> {{ $post->end_date }}</p>
                                    <p><b>Description:</b> {{ $post->description }}</p>
                                    <p><b>Tags:</b> {{ $post->tags }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>