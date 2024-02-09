<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма додавання рейсу</title>
    <p>Laravel 10 Datatable CRUD</p>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Додавання рейсу</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('flights.index') }}"> Назад</a>
        </div>
    </div>
</div>

  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif

<form action="{{ route('flights.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Индекс рейсу:</strong>
                <input type="text" name="nameflight" class="form-control" placeholder="##-##">
               @error('nameflight')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Маршрут:</strong>
              <? echo  dd($data);>
                <select name="airroute_id" id="">
                    @foreach ($routs as $rout)
                    <option value="{{$rout->id}}">{{$rout->cityroute}}</option>
                    @endforeach
                </select>
               @error('airroute_id')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Літак :</strong>
                <select name="airplane_id" id="">
                    @foreach ($planers as $planer)
                    <option value="{{$planer->id}}">{{$planer->modeltype}}</option>
                    @endforeach
                </select>
               @error('airplane_id')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Дата рейсу:</strong>
                 <input type="date" name="data" class="form-control" >
                @error('data')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Час полету:</strong>
                 <input type="time" name="time" class="form-control" >
                @error('time')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Коментарі до рейсу:</strong>
                <input type="text" name="comment" class="form-control" placeholder="Ваши коментарі">

            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Додати</button>
    </div>

</form>

</body>
</html>
