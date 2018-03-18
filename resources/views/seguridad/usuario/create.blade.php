@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Usuario</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'seguridad/usuario','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
            	<label for="name" class="col-md-4 control-label">Nombre</label>
            	<div class="col-md-6">
            	   <input id="name" type="text" name="name" class="form-control" value="{{old('name')}}">	
            	  @if ($errors->has('name'))
                      <span class="help-block">
                      	<strong>{{ $errors->first('name') }}</strong>
                      </span>
            	  @endif
            	</div>
            </div>
             
             <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
            	<label for="email" class="col-md-4 control-label">E-mail</label>
            	<div class="col-md-6">
            	   <input id="email" type="email" name="email" class="form-control" value="{{old('email')}}">	
            	  @if ($errors->has('email'))
                      <span class="help-block">
                      	<strong>{{ $errors->first('email') }}</strong>
                      </span>
            	  @endif
            	</div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
            	<label for="name" class="col-md-4 control-label">Password</label>
            	<div class="col-md-6">
            	   <input id="password" type="password" name="password" class="form-control">	
            	  @if ($errors->has('password'))
                      <span class="help-block">
                      	<strong>{{ $errors->first('password') }}</strong>
                      </span>
            	  @endif
            	</div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : ''}}">
            	<label for="name" class="col-md-4 control-label">Confirmar Password</label>
            	<div class="col-md-6">
            	   <input id="password-confirm" type="password" name="password_confirmation" class="form-control">	
            	  @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                      	<strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
            	  @endif
            	</div>
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection