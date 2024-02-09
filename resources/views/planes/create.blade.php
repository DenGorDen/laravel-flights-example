<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма додавання Літака </title>
    <p>Laravel 10 Datatable CRUD</p>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Додати літак</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('airplaners.index') }}"> Назад</a>
        </div>
    </div>
</div>

  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif

<form action="{{ route('airplaners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Модель літака:</strong>
                <input type="text" name="modeltype" class="form-control" placeholder="Модель літака">
               @error('modeltype')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Пасадкових міст:</strong>
                 <input type="number" name="capacitance" class="form-control">
                @error('capacitance')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Скорость руху літака (км/г):</strong>
                 <input type="number" name="speed" class="form-control" >
                @error('speed')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary ml-3">Додати</button>
    </div>

</form>

</body>
</html>
