@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <form class="col-md-3 sidebar-filter">
                <h3 class="mb-5">{{ __('shop.welcome.products') }} <span class="text-primary">{{ $totalProducts }}</span>
                </h3>
                <div class="mb-5">
                    <h5>{{ __('shop.product.fields.category') }}</h5>
                    @foreach ($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                id="category-{{ $category->id }}" name="filter[categories][]">
                            <label class="form-check-label" for="category-{{ $category->id }}">
                                {{ __('shop.welcome.categories.' . $category->name) }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mb-5">
                    <h5>{{ __('shop.welcome.price') }}</h5>
                    <input type="number" class="form-control mb-2" placeholder="{{ __('Min price') }}"
                        name="filter[price_min]" id="price-min-control">
                    <input type="number" class="form-control" placeholder="{{ __('Max price') }}" name="filter[price_max]"
                        id="price-max-control">
                </div>

                <a href="#" class="btn btn-lg btn-block btn-primary mt-5"
                    id="filter-button">{{ __('shop.welcome.filter') }}</a>
            </form>


            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('shop.welcome.sort') }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                            <li><a class="dropdown-item" href="#">Option 2</a></li>
                            <li><a class="dropdown-item" href="#">Option 3</a></li>
                            <li><a class="dropdown-item" href="#">Option 4</a></li>
                        </ul>
                    </div>
                    <div class="dropdown float-right">
                        <a class="btn btn-lg btn-light dropdown-toggle products-actual-count" data-bs-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-labelledby="sortDropdown" aria-expanded="false">6<span
                                class="caret"></span></a>
                        <div class="dropdown-menu dropdown-menu-right products-count" aria-labelledby="sortDropdown"
                            x-placement="bottom-end"
                            style="will-change: transform; position: absolute; transform: translate3d(120px, 48px, 0px); top: 0px; left: 0px;">
                            <a class="dropdown-item" href="#">6</a>
                            <a class="dropdown-item" href="#">12</a>
                            <a class="dropdown-item" href="#">18</a>
                            <a class="dropdown-item" href="#">24</a>
                            <a class="dropdown-item" href="#">Wszystkie</a>
                        </div>
                    </div>

                </div>


                <div class="row row-cols-1 row-cols-md-3 g-4" id="products-wrapper">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card">
                                @if (!is_null($product->image_path))
                                    <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top"
                                        alt="ProductImg" style="object-fit: cover; height:240px;">
                                @else
                                    <img src="{{ $defaultImage }}" class="card-img-top" alt="DefaultImg"
                                        style="object-fit: cover; height:240px;">
                                @endif
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">PLN {{ $product->price }}</p>
                                </div>
                                <button class="btn btn-success btn-sm add-cart-button" data-id="{{ $product->id }}"
                                    @guest disabled @endguest><i class="fa-solid fa-cart-shopping"></i> Dodaj do
                                    koszyka</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- {{ $products->links() }} --}}
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    const WELCOME_DATA = {
    storagePath: '{{ asset('storage') }}/',
    defaultImage: '{{ $defaultImage }}',
    addToCart: '{{ url('cart') }}/',
    listCart: '{{ url('cart') }}',
    isGuest: '{{ $isGuest }}'
    };
@endsection

@section('js-files')
    <script src="{{ asset('../js/welcome.js') }}"></script>
@endsection
