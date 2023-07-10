<x-layouts.app title="Registro" meta-description="Registro de usuario">

    <section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Registro</h1>
							<form method="POST" action="{{ route('register.session') }}" class="needs-validation" novalidate="" autocomplete="off">
								@csrf
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Nombre</label>
									<input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" required autofocus>
									@error('name')
										<small class="error">{{$message}}</small>
									@enderror
								</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Apellidos</label>
									<input type="text" class="form-control" name="lastname" value="{{old('lastname')}}" required autofocus>
									@error('lastname')
										<small class="error">{{$message}}</small>
									@enderror
								</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Telefono</label>
									<input type="number" class="form-control" name="phone" value="{{old('phone')}}" required autofocus>
									@error('phone')
										<small class="error">{{$message}}</small>
									@enderror
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" required>
									@error('email')
										<small class="error">{{$message}}</small>
									@enderror
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Contraseña</label>
									<input id="password" type="password" class="form-control" name="password" value="{{old('password')}}" required>
								    @error('password')
										<small class="error">{{$message}}</small>
									@enderror
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Confirmar Contraseña</label>
									<input id="password" type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" required>
								    @error('passwordconfirm')
										<small class="error">{{$message}}</small>
									@enderror
								</div>

								<input type="hidden" name="rol" value="1">

								<p class="form-text text-muted mb-3">
									Al registrarte estás de acuerdo con nuestros términos y condiciones.
								</p>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">
										Registrar	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-dark">Inicia sesión</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2023-2023 &mdash; Prueba técnica
					</div>
				</div>
			</div>
		</div>
	</section>


</x-layouts.app>