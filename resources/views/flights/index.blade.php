{{-- Airflight --}}
@extends("layout_pages")
@section('title')  Рейси  @endsection
@section('headtitle')  Таблиця руху літаків   @endsection
@section('setcmdcreate') "{{route('flights.create')}}" @endsection
@section('addbuttontitle')  Створити Рейс  @endsection

@section('table_content')
    <div class="card-body">

        <table class="display table table-bordered" id="datatable-crud">
           <thead>
              <tr>
              <th>Id</th>
              <th>№рейсу</th>
              <th>#напрямок</th>
              <th>дата</th>
              <th>час</th>
              <th>звідки</th>
              <th>куди</th>
            <!--  <th>cityroute</th>-->
              <th>літак</th>
              <th>відстань</th>
              <th>час польоту (minute)</th>
             <!--    <th>speed</th>-->
            @if (Route::has('login') && Auth::check())
              <th>дія</th>
            @endif
              </tr>
           </thead>

        <tfoot>
            <tr>
                  <th></th> <!---->
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>start</th>
                  <th>finish</th>
                <!--  <th>cityroute</th>-->
                  <th></th>

              <!--    <th>dist</th>  -->
              <!--    <th>Time (minute)</th> -->
              <!--    <th>speed</th> -->
             <!-- <th>Action</th> -->
            </tr>
        </tfoot>
        </table>

    </div>

</div>
</body>

<script type="text/javascript">

 $tableofdate =[
                   { data: 'id', name: 'id' },
                    { data: 'nameflight'},
                    { data: 'nameline' },
                    { data: 'data' },
                    { data: 'time' },
                  //  { data: 'cityroute', name: 'cityroute' },

                    { data: 'startNicName' },
                    { data: 'finishNicName' },
                    { data: 'modeltype' },
                    { data: 'distancion' },
                  // { data: 'speed', name: 'speed' },
                    { data: 'flighttime' },

        @if (Route::has('login') && Auth::check())
                    {data: 'action', name: 'action', orderable: false},
        @endif

                 ];
    $columsnotvisible = [0,4];
    $columsissearch =[5,6];
    $sortbyorder = [[2, 'asc'],[9, 'desc']/**/];
    $path = 'flights';
    $setcmddelete = "{{route('flights.destroy','flight')}}";
    $setcallback  = "{{route('flights.index')}}";
</script>
@endsection

