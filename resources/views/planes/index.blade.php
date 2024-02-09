{{-- Airplane --}}
@extends("layout_pages")
@section('title')  Літаки  @endsection
@section('headtitle')  Таблиця літаків   @endsection
@section('setcmdcreate') "{{route('airplaners.create')}}" @endsection
@section('addbuttontitle')  Створити Літак  @endsection
@section('table_content')

    <div class="card-body">

        <table class="display table table-bordered" id="datatable-crud">
           <thead>
              <tr>
              <th>Id</th>
              <th>Модель</th>
              <th>Пасадочних мест</th>
              <th>Скорость</th>
            @if (Route::has('login') && Auth::check())
              <th>дія</th>
            @endif
              </tr>
           </thead>

        <tfoot>
            <tr>
                  <th>Модель</th>
                  <th>Пасадочних мест</th>
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
                           { data: 'modeltype'},
                           { data: 'capacitance' },
                           { data: 'speed' },
               @if (Route::has('login') && Auth::check())
                           {data: 'action', name: 'action', orderable: false},
               @endif

                        ];
        $columsnotvisible = [0];
        $columsissearch =[1,2];
        $sortbyorder = [1, 'asc'];
        $path = 'airplaners';
        $setcmddelete = "{{route('airplaners.destroy','airplane')}}";
        $setcallback  = "{{route('airplaners.index')}}";
       </script>

@endsection

