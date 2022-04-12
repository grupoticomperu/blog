@extends('admin.layout')
    @section('header')
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lista de usuarios </h1>
                <a class="btn btn-primary pull-right" href=" {{ route('admin.users.create')}}"><i class="fa fa-plus"> </i> Crear Usuario</a>
                
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">inicio</a></li>
                <li class="breadcrumb-item active">Usuario</li>
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
            <table id="users-table" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Acciones</th>
              </tr>
              </thead>

              <tbody>

                  @foreach ($users as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                          <td>
                              <a href="{{ route('admin.users.show', $user)}}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i></a>
                              <a href="{{ route('admin.users.edit', $user)}}" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                            

                              <form method="POST"
                                  action="{{ route('admin.users.destroy', $user)}}"
                                  style="display: inline">
                                  {{ csrf_field()}} {{ method_field('DELETE') }}
                                  <button class="btn btn-xs btn-danger"
                                  onclick="return confirm('¿Estas seguro de eliminar al usuario?')">
                                    <i class="fas fa-times-circle"></i>
                                  </button>
                                
                              </form>



                          </td>
                      </tr>
                                      
                  @endforeach

              </tbody>

              <tfoot>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
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
     
        $('#users-table').DataTable({
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


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="POST" action="{{ route('admin.posts.store') }}">
          {{ csrf_field() }}
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Título de la Publicación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group {{ $errors->has('title') ? 'text-danger' : '' }}">
                          <label for="exampleInputEmail1">Título de la Publicación</label>
                          <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese el título de la Publicación">
                          {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Crear Publicación</button>
              </div>
            </div>
          </div>
      </form>  
    </div>
@endpush
