@extends('insaelements::layouts.master')
@section('title', 'Inventario de Elementos')
@section('content')

<!-- /.card -->

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Codigo Inventario</th>
                    <th>Nombre Elemento</th>
                    <th>Cuentadante</th>
                    <th>Estado</th>
                    <th>otro</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($inventories as $inventori)
                    <tr>
                      <td>{{ $inventori->inventoryCode }}</td>
                      <td>j</td>
                      <td>l</td>
                      <td></td>
                      <td>X</td>
                    </tr>
                   @endforeach
                 </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@stop
  @section('js')
     <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>


  @stop