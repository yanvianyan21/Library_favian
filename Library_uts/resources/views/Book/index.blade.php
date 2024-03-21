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
        <form action="/book" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect02" name="name">
                    <option selected>Choose...</option>
                  @foreach ($Author as $Authors)
                  <option value="{{ $Authors->id }}">{{ $Authors->name }}</option>
                  @endforeach
                </select>
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
              </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="" name="title">
            <label for="floatingInput">Masukkan Judul</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="" name="year">
            <label for="floatingInput">Masukkan Tahun</label>
          </div>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" name="cover" >
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
                    <th scope="col">Title</th>
                    <th scope="col">Year</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Book as $Books)
                  <tr>
                    <td>{{ $Books->Author->name }}</td>
                    <td>{{ $Books->title }}</td>
                    <td>{{ $Books->year }}</td>
                    <td><img src="{{ asset('storage/' . $Books->cover) }}" alt="" width="60"></td>
                    <td>
                        <button class="btn btn-dark mb-3"><a href="{{ route('book.edit',$Books->id) }}">Edit</a></button>

                        <form action="{{ route('book.destroy',$Books->id) }}" method="POST">
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