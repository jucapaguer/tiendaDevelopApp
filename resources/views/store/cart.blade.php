<x-layouts.app title="Carrito" meta-description="Carrito">
    <section id="sectionsingleproduct">

        <div class="container">
            <div class="card" style="min-height: 60vh; padding: 2rem;">
                <div class="card-body">
                    <h4>
                        Carrito de compras
                    </h4>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <table id="customers">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                    </tr>
                                    <tr>
                                        <td> {{ $products[0]->name }}</td>
                                        <td> {{ $products[0]->quantity }}</td>
                                        <td>${{ number_format($products[0]->price, 0, ',', '.') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col"
                                    style="border: 1px solid; margin: 0px 2rem; background-color: #e8e8e8;">
                                    <p><span class="prodcutSingleLabel">Subtotal:</span>
                                        ${{ $products[0]->price * $products[0]->quantity }} </p>
                                    <p><span
                                            class="prodcutSingleLabel">Total:</span>${{ $products[0]->price * $products[0]->quantity }}
                                    </p>
                                    <p></p>

                                    <form class="cart" action="{{ route('cart') }}" method="post">
                                        @csrf

                                        <div>
                                            @foreach ($products[0]->shippingMethod as $value)
                                                <div class="col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="shippinMehtod" id="shippingMethod" value="{{ $value->id}}">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            {{ $value->name }} <span>{{ $value->value }} </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <br>
                                        <div class="quantity buttons_added mb-2">
                                            <input type="hidden" name="id" value="{{ $products[0]->id }}">
                                            <button type="submit" name="add-to-cart" class="finalizarcompra ">Finalizar
                                                compra</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>

</x-layouts.app>
