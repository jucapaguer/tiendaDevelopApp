<x-layouts.app title="Facturación" meta-description="Tienda develoapapp">

    <section>
        <div class="container">
            <div class="card" style="min-height: 70vh; padding: 2rem;">
                <div class="card-body">
                    <h4>
                        Facturación
                    </h4>
                    <form method="POST" action="{{ route('register.session') }}" class="needs-validation" novalidate=""
                        autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2 text-muted" for="name">Nombre</label>
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6  mb-3">
                                        <label class="mb-2 text-muted" for="name">Apellidos</label>
                                        <input type="text" class="form-control" name="lastname"
                                            value="{{ old('lastname') }}" required autofocus>
                                        @error('lastname')
                                            <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6  mb-3">
                                        <label class="mb-2 text-muted" for="name">Telefono</label>
                                        <input type="number" class="form-control" name="phone"
                                            value="{{ old('phone') }}" required autofocus>
                                        @error('phone')
                                            <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6  mb-3">
                                        <label class="mb-2 text-muted" for="email">E-Mail</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="password">Direccion</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            value="{{ old('password') }}" required>
                                        @error('password')
                                            <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2 text-muted" for="password">Departamento</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            value="{{ old('password') }}" required>
                                        @error('password')
                                            <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="mb-2 text-muted" for="password">Estado</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            value="{{ old('password') }}" required>
                                        @error('password')
                                            <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="password">Crear una contraseña para crear la cuenta</label>
                                        <input id="password" type="password" class="form-control"
                                            name="password_confirmation" value="{{ old('password_confirmation') }}"
                                            required>
                                        @error('passwordconfirm')
                                            <small class="error">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <input type="hidden" name="rol" value="1">

                                    <p class="form-text text-muted mb-3">
                                        
                                    </p>
                                    <div class="quantity buttons_added mt-2">
                                        <button type="submit" name="add-to-cart" class="finalizarcompra">Finalizar
                                            compra</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col"
                                        style="border: 1px solid #ddd;margin: 0px 2rem;background-color: white; border-radius: 8px; padding: 20px;">
                                        <h5 class="mb-2">
                                            Tu pedido
                                        </h5>
                                        <br>
                                        <table style="width: 100%">
                                            <tr>
                                                <th>Producto</th>
                                                <th class="text-right">Valor</th>
                                            </tr>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach (Session::get('itemsCar') as $key => $value)
                                                @php
                                                    $subtotal = 0;
                                                @endphp
                                                <tr>
                                                    <td> {{ $value->name }} x{{ $value->quantity }}</td>
                                                    <td class="text-right">
                                                        @php
                                                            $subtotal += $value->price * $value->quantity;
                                                            $total += $subtotal;
                                                        @endphp
                                                        ${{ number_format($subtotal, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </table>
                                        <br>
                                        <hr>
                                        <table style="width: 100%">
                                            <tr>
                                                <td>Sub total:</td>
                                                <td class="text-right"><span>${{ number_format($total, 0, ',', '.') }}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Envio:</td>
                                                <td class="text-right"><span>Gratis</span></td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <th class="text-right"><span id="total">${{ number_format($total, 0, ',', '.') }}</span></th>
                                            </tr>
                                        </table>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
