<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редагування Літака</title>
      <p> Laravel 10 Datatable CRUD </p>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редагування Літака</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('airplaners.index') }}" enctype="multipart/form-data"> Назад</a>
            </div>
        </div>
    </div>

  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif

    <form action="{{ route('airplaners.update',$airplaner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Модель літака:</strong>
                    <input type="text" name="modeltype" value="{{ $airplaner->modeltype }}" class="form-control" placeholder="Модель літака">
                    @error('modeltype')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Пасадкових міст:</strong>
                     <input type="number" name="capacitance" value="{{ $airplaner->capacitance }}" class="form-control" placeholder="кількість">
                    @error('capacitance')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Скорость руху літака (км/г):</strong>
                    <input type="number" name="speed" value="{{ $airplaner->speed }}" class="form-control" placeholder="Швидкість">
                    @error('speed')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>


              <button type="submit" class="btn btn-primary ml-3">Прийняти</button>

        </div>

    </form>
</div>

</body>
</html>
