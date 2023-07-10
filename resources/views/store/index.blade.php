<x-layouts.app title="Tienda" meta-description="Tienda develoapapp">


    <section style="min-height: 60vh;">
        <div class="row">

            @foreach ($products as $value)
                <div class="col-md-3">
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
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </section>

    
</x-layouts.app>