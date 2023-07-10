<x-layouts.app title="Recuperación de contraseña" meta-description="Recuperacion de contraseña">


<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-5">
                    <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Reset Password</h1>
                        <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password">New Password</label>
                                <input id="password" type="password" class="form-control" name="password" value="" required autofocus>
                                <div class="invalid-feedback">
                                    Password is required	
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirm" required>
                                <div class="invalid-feedback">
                                    Please confirm your new password
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Reset Password	
                                </button>
                            </div>
                        </form>
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