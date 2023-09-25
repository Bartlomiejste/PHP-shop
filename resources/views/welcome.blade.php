@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-3">
            <h3 class="mb-5">Products <span class="text-primary">{{count($products)}}</span></h3> 
            <div class="mb-5">
                <h5>Category:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Accessories">
                    <label class="form-check-label" for="Accessories">Accessories</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Coats & Jackets">
                    <label class="form-check-label" for="Coats & Jackets">Coats & Jackets</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Hoodies & Sweatshirts">
                    <label class="form-check-label" for="Hoodies & Sweatshirts">Hoodies & Sweatshirts</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Jeans">
                    <label class="form-check-label" for="Jeans">Jeans</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Shirts">
                    <label class="form-check-label" for="Shirts">Shirts</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Underwear">
                    <label class="form-check-label" for="Underwear">Underwear</label>
                </div>
            </div>
            <div class="mb-5">
                <h5>Size:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="X-Small">
                    <label class="form-check-label" for="X-Small">X-Small</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Small">
                    <label class="form-check-label" for="Small">Small</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Medium">
                    <label class="form-check-label" for="Medium">Medium</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="Large">
                    <label class="form-check-label" for="Large">Large</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="X-Large">
                    <label class="form-check-label" for="X-Large">X-Large</label>
                </div>

            </div>
            <div class="mb-5">
                <h5>Price:</h5>
                <input type="text" class="form-control mb-2" placeholder="Min Price">
                <input type="text" class="form-control" placeholder="Max Price">
            </div>
        </div>


        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sortowanie
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
                @foreach($products as $product)
                    <div class="col">
                        <div class="card">
                        @if(!is_null($product->image_path))
                            <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top" alt="ProductImg">
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
            
        </div>
    </div>
</div>
@endsection