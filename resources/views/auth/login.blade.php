<x-layouts.app title="Login" meta-description="Inicio de sesion">

    <section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://www.alternatur.es/wp-content/uploads/2021/09/favicon-alternatur-300x300.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Inicio de sesión</h1>
							<form method="POST" action="{{ route('login.session') }}" class="needs-validation" novalidate="" autocomplete="off">
								@csrf
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" required autofocus>
									@error('email')
										<small class="error">{{$message}}</small>
									@enderror
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Contraseña</label>
										{{-- <a href="{{ route('resetpasword') }}" class="float-end">
											Olvido la contraseña?
										</a> --}}
									</div>
									<input id="password" type="password" class="form-control" name="password" value="{{old('password')}}" required>
								    @error('password')
										<small class="error">{{$message}}</small>
									@enderror
								</div>

								<div class="d-flex align-items-center">
									<button type="submit" class="btn btn-primary ms-auto">
										Ingresar
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								No tiene una cuenta? <a href="{{ route('register') }}" class="text-dark">Crear una</a>
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