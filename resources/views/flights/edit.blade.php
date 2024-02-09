<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма оновлення рейсу</title>
    <p>Laravel 10 Datatable CRUD</p>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Оновлення рейсу</h2>
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

<form action="{{ route('flights.update',$flight->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Индекс рейсу:</strong>
                <input type="text" name="nameflight" value="{{ $flight->nameflight }}" class="form-control" placeholder="##-##">
               @error('nameflight')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Маршрут:</strong>
                <select name="airroute_id" id="">
                    @foreach ($routs as $rout)
                    <option value="{{$rout->id}}"
                      @if($rout->id==$flight->airroute_id) selected="selected" @endif
                        >{{$rout->cityroute}}</option>
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
                    <option value="{{$planer->id}}"
                        @if($planer->id==$flight->airplane_id) selected="selected" @endif
                        >{{$planer->modeltype}}</option>
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
                 <input type="date" name="data" value="{{ $flight->data }}" class="form-control" >
                @error('data')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Час полету:</strong>
                 <input type="time" name="time" value="{{ $flight->time }}" class="form-control" >
                @error('time')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Коментарі до рейсу:</strong>
                <input type="text" name="comment" value="{{ $flight->comment }}" class="form-control" placeholder="Ваши коментарі">

            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Прийняти</button>
    </div>

</form>

</body>
</html>
