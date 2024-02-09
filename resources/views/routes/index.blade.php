{{-- Airroute --}}
@extends("layout_pages")
@section('title')  Маршрут  @endsection
@section('headtitle')  Таблиця маршрутов   @endsection
@section('setcmdcreate') "{{route('airroutes.create')}}" @endsection
@section('addbuttontitle')  Створити маршрут  @endsection

@section('table_content')
    <div class="card-body">

        <table class="display table table-bordered" id="datatable-crud">
           <thead>
              <tr>
              <th>Id</th>
              <th>Назва Маршруту</th>
              <th>від</th>
              <th>до</th>
              <th>відстань</th>
            @if (Route::has('login') && Auth::check())
              <th>Дія</th>
            @endif
              </tr>
           </thead>

        <tfoot>
            <tr>
                  <th></th> <!---->
                  <th>Назва Маршруту</th>
                  <th></th>
                  <th></th>
                  <th></th>
            </tr>
        </tfoot>
        </table>

    </div>

</div>
</body>

<script type="text/javascript">

 $tableofdate =[
                    { data: 'id', name: 'id' },
                    { data: 'nameline'},
                    { data: 'startNicName' },
                    { data: 'finishNicName' },
                    { data: 'distancion' },
        @if (Route::has('login') && Auth::check())
                    {data: 'action', name: 'action', orderable: false},
        @endif

                 ];
 $columsnotvisible = [0];
 $columsissearch =[1];
 $sortbyorder = [1, 'asc'];
 $path = 'airroutes';
 $setcmddelete = "{{route('airroutes.destroy','airroute')}}";
 $setcallback  = "{{route('airroutes.index')}}";
</script>
@endsection

