<x-layouts.app title="Carrito" meta-description="Carrito">
    <section id="sectionsingleproduct">

        <div class="container">
            <div class="card" style="min-height: 60vh; padding: 2rem;">
                <div class="card-body">
                    <h4>
                        Carrito de compras
                    </h4>
                    <div class="row">
                        @if (Session::has('itemsCar') && count(Session::get('itemsCar')) != 0)
                            <div class="col-md-8">
                                <div class="row">

                                    <table id="customers">
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
                                                <td> cant{{ $value->quantity }} llave{{ $key }}</td>
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
                                                            <button type="submit" name="" class="removecart"><i
                                                                    class="bi bi-trash-fill"></i></button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col"
                                        style="border: 1px solid; margin: 0px 2rem; background-color: #e8e8e8;">
                                        <p><span class="prodcutSingleLabel">Subtotal:</span>
                                            ${{ $subtotal }}</p>
                                        <p><span class="prodcutSingleLabel">Total:</span>${{-- {{ $products[0]->price * $products[0]->quantity }} --}}
                                        </p>
                                        <p></p>

                                        <form class="cart" action="{{ route('cart') }}" method="post">
                                            @csrf

                                            <div>
                                                @foreach (Session::get('Shipping_zone_methods') as $value)
                                                    <div class="col-md-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="shippinMehtod" id="shippingMethod"
                                                                value="{{ $value->id }}">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                {{ $value->name }} <span>{{ $value->value }} </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                            <div class="quantity buttons_added mb-2">
                                                <input type="hidden" name="id" value="{{-- {{ $products[0]->id }} --}}">
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

</x-layouts.app>
