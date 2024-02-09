<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<body>

<div class="container mt-2">

    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">
          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{url('flights')}}">Рейси</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('airroutes')}}">Маршрути</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('airports')}}">Аеропорти</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('airplaners')}}">Літаки</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
                @if (Route::has('login') && Auth::check())
                    <div class="top-right links">{{Auth::user()->name}}
                        <a href="{{ url('logout') }}">LoginOut</a>
                    </div>
                @elseif (Route::has('login') && !Auth::check())
                    <div class="top-right links">
                        <a href="{{ url('/login') }}">Login</a>
                    </div>
                @endif
            </li>
          </ul>
        </div>
      </nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>@yield('headtitle') </h2>
                <p>Laravel 10 CRUD using DataTables</p>
            </div>
         @if (Route::has('login') && Auth::check())

            <div class="pull-right mb-2">
                <a class="btn btn-success" href= @yield('setcmdcreate')>
                    @yield('addbuttontitle')
                </a>
            </div>
         @endif
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @yield('table_content')


<script type="text/javascript">

 $(document).ready( function () {
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $('#datatable-crud').DataTable({
           processing: true,
           serverSide: true,
           ajax: $path,
           columns: $tableofdate,
           columnDefs: [{ 'visible': false, 'searchable': false,'targets': $columsnotvisible } ],
           order:$sortbyorder,
           initComplete: function () {
                this.api()
                .columns($columsissearch)
                    .every(function () {
                        var column = this;
                        var title = column.footer().textContent;

                        // Create input element and add event listener
                        $('<input type="text" placeholder="Search " />')
                            .appendTo($(column.footer()).empty())
                            .on('keyup change clear', function () {
                                if (column.search() !== this.value) {
                                    column.search(this.value).draw();
                                }
                            });
                    });
            }
    });


  @if (Route::has('login') && Auth::check())
    $('body').on('click', '.delete', function () {
        var id = $(this).data('id');
       if (confirm("Delete Record ? -> id="+id) == true) {
        var id = $(this).data('id');

        // ajax
        $.ajax({
            type:"DELETE",//"POST",
            url: $setcmddelete,
            data: { id: id},
            dataType: 'json',
            success: function(res){
              var oTable = $('#datatable-crud').dataTable();
              oTable.fnDraw(false);
              window.location.href = $setcallback;
           }
        });
       }

     });
   @endif
  });
</script>
</html>
