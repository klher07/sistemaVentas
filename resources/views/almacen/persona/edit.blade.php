@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Persona: {{ $persona->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($persona,['method'=>'PATCH','route'=>['almacen.persona.update',$persona->idpersona]])!!}
            {{Form::token()}}
             <div class="form-group">
            	<label for="nombre">Tipo_persona</label>
            	<input type="text" name="tipo_persona" class="form-control" value="{{$persona->tipo_persona}}" placeholder="Tipo_persona...">
            </div>
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$persona->nombre}}" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="tipo_documento">Tipo_documento</label>
            	<input type="text" name="tipo_documento" class="form-control" value="{{$persona->tipo_documento}}" placeholder="Tipo_documento...">
            </div>
            <div class="form-group">
            	<label for="num_documento">Num_documento</label>
            	<input type="text" name="num_documento" class="form-control" value="{{$persona->num_documento}}" placeholder="Num_documento...">
            </div>
            <div class="form-group">
            	<label for="direccion">Direccion</label>
            	<input type="text" name="direccion" class="form-control" value="{{$persona->direccion}}" placeholder="Direccion...">
            </div>
            <div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$persona->telefono}}" placeholder="Telefono...">
            </div>
            <div class="form-group">
            	<label for="email">Email</label>
            	<input type="text" name="email" class="form-control" value="{{$persona->email}}" placeholder="Email...">
            </div>


            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection