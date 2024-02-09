<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма додавання маршруту</title>
    <p>Laravel 10 Datatable CRUD</p>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2">
            <h2>Додати маршрут</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('airroutes.index') }}"> Назад</a>
        </div>
    </div>
</div>

  @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
  @endif

<form action="{{ route('airroutes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Индекс маршруту:</strong>
                <input type="text" name="nameline"  class="form-control" placeholder="**-****">
                @error('nameline')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>звідки виліт:</strong>
                <select name="startcity" id="">
                    @foreach ($cites as $city)
                    <option value="{{$city->id}}">{{$city->nicName}}</option>
                    @endforeach
                </select>
                @error('startcity')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                <!-- <input type="number step=any" name="startcity" class="form-control" placeholder="-------"> -->

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>куди плануется політ:</strong>
                <select name="finishcity" id="">
                    @foreach ($cites as $city)
                    <option value="{{$city->id}}">{{$city->nicName}}</option>
                    @endforeach
                </select>
                @error('finishcity')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

          <button type="submit" class="btn btn-primary ml-3">Додати</button>

    </div>

</form>

</body>
</html>
