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

      <div class="container mt-5">
        <form action="{{ route('book.update', $Book->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect02" name="name">
                    <option selected>{{ $Book->Author->name }}</option>
                  @foreach ($Author as $Authors)
                  <option value="{{ $Authors->id }}">{{ $Authors->name }}</option>
                  @endforeach
                </select>
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
              </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="" name="title">
            <label for="floatingInput">{{ $Book->title }}</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="" name="year">
            <label for="floatingInput">{{ $Book->year }}</label>
          </div>
          <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" name="cover" >
          </div>
          <button class="btn btn-dark mb-3">Submit</button>
          </form>
      </div>
</body>
</html>