@extends('admin.layout')
    @section('header')
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lista de Productos </h1>
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModalp"><i class="fa fa-plus"> </i> Crear Producto</button>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">inicio</a></li>
                <li class="breadcrumb-item active">Productos</li>
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
                <th>Título</th>
                <th>Resumen</th>
                <th>Acciones</th>
              </tr>
              </thead>

              <tbody>

                  @foreach ($products as $product)
                      <tr>
                          <td>{{ $product->id }}</td>
                          <td>{{ $product->titulo }}</td>
                          <td>{{ $product->resumen }}</td>
                          <td>
                              {{-- <a href="{{ route('product.show', $product)}}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i></a> --}}
                              <a href="{{ route('admin.product.edit', $product)}}" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                              <a href="" class="btn btn-xs btn-danger"><i class="fas fa-times-circle"></i></a>



                          </td>
                      </tr>
                                      
                  @endforeach

              </tbody>

              <tfoot>
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Resumen</th>
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


    <div class="modal fade" id="exampleModalp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="POST" action="{{ route('admin.product.store') }}">
          {{ csrf_field() }}
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresando Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group {{ $errors->has('titulo') ? 'text-danger' : '' }}">
                          <label for="titulo">Título del producto </label>
                          <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Ingrese el título del producto" required>
                          {!! $errors->first('titulo','<span class="help-block">:message</span>') !!}
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Crear Producto</button>
              </div>
            </div>
          </div>
      </form>  
    </div>
@endpush
