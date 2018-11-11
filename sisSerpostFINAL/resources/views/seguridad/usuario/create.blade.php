@extends ('layouts.admin')
@section ('contenido')
    <div class="row"><!--para agregar una fila -->
        <!-- -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
            <!-- token-->

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre: </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail: </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-md-4 control-label">Tipo de Usuario</label>
                          <div class="col-md-6">
                            <select name="tipo-usuario" class="form-control">
                                <option value="1">Administrador</option>
                                <option value="2">Trabajador</option>
                            </select>
                          </div>  
                       </div>
                        
                       <div class="col-md-6">  
                        <div class="form-group">
                             <button class="btn btn-primary" type="submit">Guardar</button>
                             <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                      </div>  



            {!!Form::close()!!}

        </div>
    </div>
@endsection
