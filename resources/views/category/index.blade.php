@extends('layouts.app')
@section('third_party_stylesheets')

  <!-- DataTables -->
  <link rel="stylesheet" href="{!! asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
  <link rel="stylesheet" hre="{!! asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">
@endsection
@section('content')
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('layouts.partials')

        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Categories</h3>
                <h3 class="card-title" style="float:right"><a href="{{ route('category.create') }}" class="btn btn-primary float-right">Add new Category</a>

              </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description(s)</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                      @php $i=0; @endphp
                  @foreach($categories as $category)
                    <tr>
                        <td>{{ ++$i }} </td>
                        <td>{{ $category->name }} </td>
                        <td>{{ $category->description }}</td>
                        
                        <td class="project-actions text-right">
                            <a  href="{{ route('category.show', $category->id) }}"  class="btn btn-primary " href="#">
                              View</a></td>
                        <td class="project-actions text-right"><a href="{{ route('category.edit', $category->id) }}" class="btn btn-info " href="#">
                              Edit</a></td>
                              
                        <td class="project-actions text-right">  
                            <button type="button" class="btn btn-danger btn-info "  data-toggle="modal" data-target="#modal-danger-{{ $category->id }}">
                            Delete 
                            </button>
                        </td>
                    </tr>
                @endforeach  
                      
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('third_party_scripts')

<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
@endsection



