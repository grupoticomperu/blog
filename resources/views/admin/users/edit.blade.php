@extends('admin.layout')

@section('content')

	<div class="row">

		<div class="col-md-6">
			<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div >

                	 <h3 class="profile-username text-center">Editando Usuario</h3>

                	 @if($errors->any())
                	 	<ul class="list-group">
                	 		@foreach($errors->all() as $error)
	                	 		<li class="list-group-item list-group-item-danger">
	                	 			{{ $error }}
	                	 		</li>

                	 		@endforeach

                	 	</ul>
                	 @endif

                	 <form method="POST" action="{{ route('admin.users.update', $user) }}">

                	 	{{ csrf_field() }}
                	 	{{ method_field('PUT')}}
                	 	<div class="form-group">
                	 		<label for="name">Nombre:</label>
                	 		<input type="" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                	 		
                	 	</div>



                        <div class="form-group">
                            <label for="name">Email:</label>
                            <input type="" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                            
                        </div>


                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            
                        </div>
                        <span class="help-block">Dejar en blanco si no cambiaras la contraseña</span>

                        <div class="form-group">
                            <label for="password_confirmation">Repite la Contraseña:</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la Contraseña">
                            
                        </div>


                	 	<button class="btn btn-primary btn-block">Actualizar usuario</button>
                	 </form>




                </div>
              </div>
            </div>  


			
		</div>


        <div class="col-md-6">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="with-border">
                    <h3 class="profile-username text-center">Roles</h3>

                    <div class="box-body">
                    <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">    
                       {{ csrf_field() }} {{ method_field('PUT')}}

                       @foreach($roles as $role)
                            

                        <div class="checkbox">
                            <label>
                                <input name="roles[]" type="checkbox" value="{{ $role->name }}"
                                {{ $user->roles->contains($role->id) ? 'checked':''}}>
                                {{ $role->name }} <br>
                                <small class="text-muted">
                                    {{ $role->permissions->pluck('name')->implode(', ') }}
                                </small>
                            </label>
                        </div>

                            
                        @endforeach

                        <button class="btn btn-primary btn-block">Actualizar Roles</button>
                    </form>
                    </div>

                </div>
              </div>
            </div>  


            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="with-border">
                    <h3 class="profile-username text-center">Permisos</h3>

                    <div class="box-body">
                    <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">    
                       {{ csrf_field() }} {{ method_field('PUT')}}
                       @foreach($permissions as $id => $name)
                            

                        <div class="checkbox">
                            <label>
                                <input name="permissions[]" type="checkbox" value="{{ $name }}"
                                {{ $user->permissions->contains($id) ? 'checked':''}}>   
                            {{ $name }}
                            </label>
                        </div>

                            
                        @endforeach

                        <button class="btn btn-primary btn-block">Actualizar Permisos</button>
                    </form>
                    </div>

                </div>
              </div>
            </div>  


        </div>

	</div>


@endsection