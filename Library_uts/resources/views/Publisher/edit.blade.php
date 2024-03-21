<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset('bootstrap-5.2.3-dist/css/bootstrap.min.css') }}>
    <title>Author</title>
</head>
<body style="background-color:#8C6A5D">

      <div class="container mt-5">
        <form action="{{ route('publisher.update', $Publisher->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="" name="name">
            <label for="floatingInput">{{ $Publisher->name }}</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="" name="addres">
            <label for="floatingInput">{{ $Publisher->addres }}</label>
          </div>
          <button class="btn btn-dark mb-3">Submit</button>
          </form>
      </div>
</body>
</html>