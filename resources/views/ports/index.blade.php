{{-- Airport --}}
@extends("layout_pages")
@section('title')  Аеропорт  @endsection
@section('headtitle')  Таблиця аеропортів   @endsection
@section('setcmdcreate') "{{route('airports.create')}}" @endsection
@section('addbuttontitle')  Створити аеропорт  @endsection

@section('table_content')
    <div class="card-body">

        <table class="display table table-bordered" id="datatable-crud">
           <thead>
              <tr>
              <th>Id</th>
              <th>Назва Аеропорту</th>
              <th>Lat координата</th>
              <th>Lng координата</th>
            @if (Route::has('login') && Auth::check())
              <th>Дія</th>
            @endif
              </tr>
           </thead>

        <tfoot>
            <tr>
                  <th>Назва Аеропорту</th>
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
                    { data: 'nicName'},
                    { data: 'CoordinateX' },
                    { data: 'CoordinateY' },
        @if (Route::has('login') && Auth::check())
                    {data: 'action', name: 'action', orderable: false},
        @endif

                 ];
 $columsnotvisible = [0];
 $columsissearch =[1];
 $sortbyorder = [0, 'desc'];
 $setcmddelete = "{{route('airports.destroy','airport')}}";
 $path = 'airports';
 $setcallback  = "{{route('airports.index')}}";
</script>
@endsection

