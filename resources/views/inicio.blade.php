<x-layouts.app title="Inicio" meta-description="Tienda develoapapp">


    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.alternatur.es/wp-content/uploads/2021/09/banner-productos-naturales-alternatur.jpg"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Productos Naturales</h5>
                    <p>Salud integral con productos de calidad.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.alternatur.es/wp-content/uploads/2021/09/banner-natural-alternatur.jpg"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Productos Naturales</h5>
                    <p>Salud integral con productos de calidad.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <section>
        <h5>Categorias</h5>
        <div class="row">
            @foreach ($products->categoriesData as $value)
                <div class="col-md-2">
                    <a id="link" href="{{ route('catalogue.category', $value->id) }}">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://www.alternatur.es/wp-content/uploads/2021/09/favicon-alternatur-300x300.png"
                                    alt="" srcset="" style="max-height: 150px">
                                <p>{{ $value->name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>


    <section>
        <h5>Nuestros productos</h5>
        <div class="row">

            @foreach ($products as $value)
                <div class="col-md-3">
                    <a id="link" href="{{ route('catalogue.product', $value->slug) }}">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ $value->picture }}" alt="" srcset=""
                                    style="max-height: 250px">
                                <h5>{{ $value->name }}</h5>
                                <p>
                                    @if ($value->sale_price)
                                        <span class="saleprice">${{ number_format($value->price, 0, ',', '.') }}</span>
                                        ${{ number_format($value->sale_price, 0, ',', '.') }}
                                    @else
                                        ${{ number_format($value->price, 0, ',', '.') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </section>

    <script>
        window.onload = function() {
            const swiper = new Swiper('.bOnSale', {
                direction: 'horizontal',
                loop: true,
                /* autoplay: {
                    delay: 4500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }, */
                breakpoints: {
                    600: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                    1200: {
                        slidesPerView: 5,
                        spaceBetween: 10,
                    }
                },
            });
        }
    </script>

    </x-layout>
