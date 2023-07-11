<x-layouts.app title="{{ $products[0]->name }}" meta-description="{{ $products[0]->name }}">
    <section id="sectionsingleproduct">

        <div class="container">
            <div class="card">
                <div class="card-body cardbody">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ $products[0]->picture }}" alt="" style="max-width: 100%;">
                        </div>
                        <div class="col-md-6">
                            <br>
                            <br>
                            <h3 class="h3singleproduct">
                                {{ $products[0]->name }}
                            </h3>
                            <p>
                                {{ $products[0]->short_description }}
                            </p>
                            <p>
                                <label for="" class="prodcutSingleLabel">Precio</label>
                                @if ($products[0]->sale_price)
                                    <span
                                        class="saleprice">${{ number_format($products[0]->price, 0, ',', '.') }}</span>
                                    <span
                                        class="price">${{ number_format($products[0]->sale_price, 0, ',', '.') }}</span>
                                @else
                                    <span class="price"> ${{ number_format($products[0]->price, 0, ',', '.') }}</span>
                                @endif
                            </p>
                            <p>
                                <label for="" class="prodcutSingleLabel">Stock Disponible</label>
                                {{ $products[0]->inventory }}
                            </p>
                            <form class="cart" action="{{ route('save.data') }}" method="post">
                                @csrf
                                <div class="quantity buttons_added"><input type="number" id="quantity"
                                        class="input-text qty text" step="1" min="1"
                                        max="{{ $products[0]->inventory }}" name="quantity" value="1"
                                        title="Cantidad" size="4" placeholder="" inputmode="numeric">
                                    <input type="hidden" name="id" value="{{ $products[0]->id }}">
                                    <button type="submit" name="add-to-cart" class="addcart">Añadir al
                                        carrito</button>
                                </div>
                            </form>

                            <p>
                                <br>
                                <label for="" style="font-size: 12px"><span
                                        class="prodcutSingleLabel">Categorias : </span>
                                    {{ $products[0]->categorieData[0]->name }}</label>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab"
                                        aria-controls="description" aria-selected="true">Descripción</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#propiedades" type="button" role="tab"
                                        aria-controls="propiedades" aria-selected="false">Propiedades</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <p>{{ $products[0]->description }}</p>
                                </div>
                                <div class="tab-pane fade" id="propiedades" role="tabpanel"
                                    aria-labelledby="propiedades-tab">
                                    @foreach ($products[0]->additionalData as $value)
                                        <p>{{ $value->name }}: {{ $value->description }}</p>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

</x-layouts.app>
