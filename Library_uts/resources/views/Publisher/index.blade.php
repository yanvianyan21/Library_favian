<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset('bootstrap-5.2.3-dist/css/bootstrap.min.css') }}>
    <title>Publisher</title>
</head>
<body style="background-color:#8C6A5D">
    <nav class="navbar navbar-expand-lg bg-transparent p-3">
        <div class="container">
          <a href="#">
            <img src="Image/Group 2.svg" alt="">
          </a>
          </button>
            <div class="navbar-nav ms-auto gap-4" style="font-size: large; transform: translateY(8px);">
              <b><a class="nav-link active" href="/"  style="color: black;" >Author</a></b>
              <b><a class="nav-link active" href="/Publisher" style="color: black;" >Publisher</a></b>
              <b><a class="nav-link active" href="/Book" style="color: black;" >Book</a></b>
            </div>
          </div>
        </div>
      </nav>

      <div class="container mt-5">
        <form action="/publisher" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="" name="name">
            <label for="floatingInput">Masukkan Nama</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="" name="addres">
            <label for="floatingInput">Masukkan Alamat</label>
          </div>
          <button class="btn btn-dark mb-3">Submit</button>
          </form>
      </div>

      <div class="container mt-5">
        <div>
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Publisher as $Publishers)
                  <tr>
                    <td>{{ $Publishers->name }}</td>
                    <td>{{ $Publishers->addres }}</td>
                    <td>
                        <button class="btn btn-dark mb-3"><a href="{{ route('publisher.edit',$Publishers->id) }}">Edit</a></button>

                        <form action="{{ route('publisher.destroy',$Publishers->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-dark mb-3" value="Delete">Delete</button>
                        </form>
                    </td>
                  </tr>                  
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>
</body>
</html>