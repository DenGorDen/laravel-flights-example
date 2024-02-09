<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма редактирования Аеропорту </title>
    <p> Laravel 10 Datatable CRUD </p>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактировать Аеропорт</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('airports.index') }}" enctype="multipart/form-data"> Назад</a>
            </div>
        </div>
    </div>

  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif

    <form action="{{ route('airports.update',$airport->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Аеропорт (повна назва):</strong>
                    <input type="text" name="nicName" value="{{ $airport->nicName }}" class="form-control" placeholder="nicName">
                    @error('nicName')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lat координата:</strong>
                     <input type="number step=any" name="CoordinateX" value="{{ $airport->CoordinateX }}" class="form-control" placeholder="Flight Route">
                    @error('CoordinateX')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lng координата:</strong>
                    <input type="number step=any" name="CoordinateY" value="{{ $airport->CoordinateY }}" class="form-control" placeholder="Company Address">
                    @error('CoordinateY')
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
