<x-layouts.app title="Carrito" meta-description="Carrito">
    <section id="sectionsingleproduct">

        <div class="container">
            <div class="card" style="min-height: 60vh; padding: 2rem;">
                <div class="card-body">
                    <h4>
                        Carrito de compras
                    </h4>
                    <br>
                    <div class="row">
                        @if (Session::has('itemsCar') && count(Session::get('itemsCar')) != 0)
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="border-round">
                                        <table {{-- id="customers" --}} class="table rounded">
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                            @php
                                                $subtotal = 0;
                                            @endphp
                                            @foreach (Session::get('itemsCar') as $key => $value)
                                                <tr>
                                                    <td> {{ $value->name }}</td>
                                                    <td>{{ $value->quantity }}</td>
                                                    <td>${{ number_format($value->price, 0, ',', '.') }}
                                                        @php
                                                            $subtotal += $value->price * $value->quantity;
                                                        @endphp

                                                    </td>
                                                    <td>
                                                        <form class="cart" action="{{ route('delete.data') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="quantity buttons_added">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $key }}">
                                                                <button type="submit" name=""
                                                                    class="removecart"><i
                                                                        class="bi bi-trash-fill"></i></button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </table>
                                    </div>



                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col"
                                        style="border: 1px solid #ddd;margin: 0px 2rem;background-color: white; border-radius: 8px; padding: 20px;">
                                        <p><span class="prodcutSingleLabel">Subtotal:</span>
                                            ${{ number_format($subtotal, 0, ',', '.') }}</p>

                                        <form class="cart" action="{{ route('cheackout') }}" method="get">
                                            @csrf

                                            <div>
                                                <span>Envío</span>
                                                @foreach (Session::get('Shipping_zone_methods') as $value)
                                                    <div class="col-md-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="shippinMehtod" id="shippingMethod"
                                                                value="{{ $value->id }}"
                                                                onclick="total({{ $subtotal }},{{ $value->value }})">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{ $value->name }} <span>{{ $value->value }} </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                            <hr>
                                            <p><span class="prodcutSingleLabel">Total:</span>
                                                <span
                                                    id="total">${{ number_format($subtotal, 0, ',', '.') }}</span>
                                            </p>
                                            <div class="quantity buttons_added mb-2">
                                                <button type="submit" name="add-to-cart"
                                                    class="finalizarcompra ">Finalizar
                                                    compra</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="noproduct"><i class="bi bi-exclamation-circle-fill"></i>
                                <p>No tiene productos en el carrito.</p>

                                <a href="{{ route('catalogue') }}">Regresar al catalogo</a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </section>

    <script>
        function total(value, method) {

            if (!method) {
                method = 0;
            }

            let total = value + method;
            let opciones = { style: 'decimal', currency: 'USD' };
            let numeroFormateado = total.toLocaleString('es', opciones);

            var spanElement = document.getElementById("total");

            // Cambia el texto utilizando textContent
            spanElement.textContent = "$" + numeroFormateado;

        }
    </script>

</x-layouts.app>
