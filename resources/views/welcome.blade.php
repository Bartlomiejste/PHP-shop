@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3">
                <h3 class="mb-5">{{ __('shop.welcome.products') }} <span class="text-primary">{{ count($products) }}</span>
                </h3>
                <div class="mb-5">
                    <h5>{{ __('shop.product.fields.category') }}</h5>
                    @foreach ($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="category-{{ $category->id }}">
                            <label class="form-check-label" for="category-{{ $category->id }}">
                                {{ __('shop.welcome.categories.' . $category->name) }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mb-5">
                    <h5>{{ __('shop.welcome.price') }}</h5>
                    <input type="text" class="form-control mb-2" placeholder="{{ __('Min price') }}">
                    <input type="text" class="form-control" placeholder="{{ __('Max price') }}">
                </div>
            </div>


            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('shop.welcome.filter') }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                            <li><a class="dropdown-item" href="#">Option 1</a></li>
                            <li><a class="dropdown-item" href="#">Option 2</a></li>
                            <li><a class="dropdown-item" href="#">Option 3</a></li>
                            <li><a class="dropdown-item" href="#">Option 4</a></li>
                        </ul>
                    </div>
                </div>


                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card">
                                @if (!is_null($product->image_path))
                                    <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top"
                                        alt="ProductImg">
                                @else
                                    <img src="#" class="card-img-top" alt="DefaultImg">
                                @endif
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">${{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
