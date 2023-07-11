<x-layouts.app title="Tienda" meta-description="Tienda develoapapp">


    <section style="min-height: 70vh;">
        <div class="row">

            @foreach ($products as $value)
                <div class="col-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2">
                    <a id="link" href="{{ route('catalogue.product', $value->slug) }}">
                        <div class="card">
                            <div class="card-body" style="text-align: left;">
                                <img src="{{ $value->picture }}" alt="" srcset=""
                                    style="max-height: 250px">
                                <h5>{{ $value->name }}</h5>
                                <p> @if($value->sale_price)
                                        <span class="saleprice">${{ number_format($value->price , 0 , ',' , '.' )}}</span> ${{ number_format($value->sale_price , 0 , ',' , '.' )}}
                                    @else
                                        ${{ number_format($value->price , 0 , ',' , '.' )}}
                                    @endif
                                </p>
                                <form class="cart" action="{{ route('save.data') }}" method="post">
                                    @csrf
                                    <div class="quantity buttons_added"><input type="number" id="quantity"
                                            class="input-text qty text" step="1" min="1"
                                            max="{{ $value->inventory }}" name="quantity" value="1"
                                            title="Cantidad" size="4" placeholder="" inputmode="numeric">
                                            <input type="hidden" name="id" value="{{ $value->id }}">
                                            <button
                                            type="submit" name="add-to-cart" 
                                            class="addcart">Añadir al
                                            carrito</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </section>

    
</x-layouts.app>