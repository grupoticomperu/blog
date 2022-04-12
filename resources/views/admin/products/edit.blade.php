@extends('admin.layout')


@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Nuevo producto</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Productos</a></li>
                        <li class="breadcrumb-item active">Nuevo Producto</li>
                    </ol>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.1/dropzone.css">
    <!--   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"> -->

    <link rel="stylesheet" href="/adminlte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">


@endpush

@section('content')

    <form method="POST" action="{{ route('admin.product.update', $product) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="row">

            <div class="col-md-8">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Creando un Producto</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('titulo') ? 'text-danger' : '' }}">
                            <label>Titulo </label>
                            <input name="titulo" value="{{ old('titulo', $product->titulo) }}" type="text"
                                class="form-control" placeholder="ingrese aquí el título del producto">
                            <!-- el segundo parametro del old sirve para pintar en caso este vacio -->
                            <!-- <div class="poner la clase para sombrear solo el mensaje">-->
                            {!! $errors->first('titulo', '<span class="help-block">:message</span>') !!}
                            <!-- </div>-->
                            <!-- le ponemos !! a cambio del { y del }-->
                        </div>



                        <div class="form-group {{ $errors->has('descripcion') ? 'text-danger' : '' }}">
                            <label>Contenido </label>
                            <textarea rows="10" name="descripcion" id="editor" class="form-control"
                                placeholder="Ingrese decripción del producto">{{ old('descripcion', $product->descripcion) }}</textarea>
                            {!! $errors->first('descripcion', '<span class="help-block">:message</span>') !!}


                        </div>

                        <div class="form-group {{ $errors->has('iframe') ? 'text-danger' : '' }}">
                            <label>Enlace Video o Audio</label>
                            <textarea rows="3" name="iframe" id="editor" class="form-control"
                                placeholder="Ingrese Conenido embebido de audio o video ">{{ old('iframe', $product->iframe) }}</textarea>
                            {!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}


                        </div>




                    </div>


                </div>

            </div>

            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Creando un Producto</h3>
                    </div>
                    <div class="card-body">


                        <div class="form-group {{ $errors->has('categoria_id') ? 'text-danger' : '' }}">
                            <label>Categorias</label>
                            <select name="categoria_id" class="form-control select2">
                                <option value="">Selecciona una categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categoria_id', $product->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('categoria_id', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{ $errors->has('marca_id') ? 'text-danger' : '' }}">
                            <label>Marcas</label>
                            <select name="marca_id" class="form-control select2">
                                <option value="">Selecciona una marca</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}"
                                        {{ old('marca_id', $product->marca_id) == $marca->id ? 'selected' : '' }}>
                                        {{ $marca->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('marca_id', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{ $errors->has('precio') ? 'text-danger' : '' }}">
                            <label>Precio </label>
                            <input name="precio" value="{{ old('precio', $product->precio) }}" type="text"
                                class="form-control" placeholder="precio">
                            <!-- el segundo parametro del old sirve para pintar en caso este vacio -->
                            <!-- <div class="poner la clase para sombrear solo el mensaje">-->
                            {!! $errors->first('precio', '<span class="help-block">:message</span>') !!}
                            <!-- </div>-->
                            <!-- le ponemos !! a cambio del { y del }-->
                        </div>


                        <div class="form-group {{ $errors->has('cantidad') ? 'text-danger' : '' }}">
                            <label>Cantidad</label>
                            <input name="cantidad" value="{{ old('cantidad', $product->cantidad) }}" type="number"
                                class="form-control" placeholder="cantidad">
                            <!-- el segundo parametro del old sirve para pintar en caso este vacio -->
                            <!-- <div class="poner la clase para sombrear solo el mensaje">-->
                            {!! $errors->first('cantidad', '<span class="help-block">:message</span>') !!}
                            <!-- </div>-->
                            <!-- le ponemos !! a cambio del { y del }-->
                        </div>


                        <div class="form-group {{ $errors->has('resumen') ? 'text-danger' : '' }}">
                            <label>Resumen del producto</label>
                            <textarea name="resumen" class="form-control" placeholder="Ingrese resumen de la publicación">
                                {{ old('resumen', $product->resumen) }}
                              </textarea>
                            {!! $errors->first('resumen', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group">
                            <div class="dropzone">


                            </div>
                        </div>


                        <div class="form-group">
                            <button type='submit' class="btn btn-primary btn-block">Guardar Producto</button>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </form>





@stop





@push('scripts')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.1/min/dropzone.min.js"></script>



    <script src="/adminlte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>



    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>  -->

    <script>
        $('#datepicker').datepicker({
            autoclose: true
        });



        CKEDITOR.replace('editor');
        CKEDITOR.config.height = 315;


        ///var myDropzone = new Dropzone('.dropzone',{
        new Dropzone('.dropzone', {
            //url: '/'
            url:'/admin/product/{{ $product->id }}/image',
            	acceptedFiles: 'image/*',
            	paramName: 'photo',
            	maxFilesiZe: 2,
            	headers:{
            		'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
           // headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

            dictDefaultMessage: 'Arrastrar fotos para Subir'
        });

        
              myDropzone.on('error', function(file, res){
                var msg = res.photo[0];
                $('.dz-error-message:last > span').text(msg);
              });
        
        Dropzone.autoDiscover = false;
    </script>

@endpush
