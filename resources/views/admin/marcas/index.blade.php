@extends('admin.layout')
    @section('header')
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Todas las Marcas </h1>
                <a href="{{ route('marca.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"> </i> Crear Marcas</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">inicio</a></li>
                <li class="breadcrumb-item active">Marcas</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    @endsection


    @section('content')
        
      <div class="card">
          <div class="card-header">
           
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="posts-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>imagen</th>
   
                <th>Acciones</th>
              </tr>
              </thead>

              <tbody>

                  @foreach ($marcas as $marca)
                      <tr>
                          <td>{{ $marca->id }}</td>
                          <td>{{ $marca->name }}</td>
                          <td><img width="100px" src="{{ Storage::url($marca->imagen) }}"></td>
                          <td>
                              <a href="{{ route('marca.show', $marca)}}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i></a>
                              <a href="{{ route('marca.edit', $marca)}}" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>

   

                                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $marca->id }}"
                    class="btn btn-xs btn-danger"><i class="fas fa-times-circle"></i></button>
                        

                          </td>
                      </tr>
                                      
                  @endforeach

              </tbody>

              <tfoot>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
                
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>

    @endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>
      $(function () {
     
        $('#posts-table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>



<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Seguro que desea borrar el registro seleccionado?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                <form id="formDelete" method="POST" action="{{ route('marca.destroy',0) }}"
                    data-action="{{ route('marca.destroy',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>


            </div>
        </div>
    </div>
</div>

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

  action = $('#formDelete').attr('data-action').slice(0,-1)
  action += id
  console.log(action)

  $('#formDelete').attr('action',action)

  var modal = $(this)
  modal.find('.modal-title').text('Vas a borrar la  Categoria: ' + id)
})
</script>




@endpush
