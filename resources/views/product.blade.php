@extends('layout')

@section('title', $product->name)

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="/">Home</a>
          <strong> > </strong>

            {{-- <i class="fa fa-chevron-right breadcrumb-separator"></i> --}}
            <a href="{{ route('shop.index') }}">Shop</a>
            {{-- <i class="fa fa-chevron-right breadcrumb-separator"></i> --}}
          <strong> > </strong>
            <span>Macbook Pro</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="product-section container">
    
        <div class="product-section-image">

            <img src="{{ productImage($product->image) }}" alt="product" 
            class="active"  id="currentImage">

        </div>

        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product->name }}</h1>
            <div class="product-section-subtitle">{{ $product->details }}</div>
            <div class="product-section-price">{{ asDollars($product->price) }}</div>

            <p>
                {!! $product->description !!}
            </p>

            <p>&nbsp;</p>

            {{-- add product to cart when we click the add to cart button  --}}
            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <button type="submit" class="button button-plain">Add to Cart</button>
            </form>
        </div>
                <div class="product-section-images ">

                    <div class="img-thumbnail selected ">
                        <img class="" src="{{ productImage($product->image) }}" alt="product">
                   </div>

                    @if ($product->images)
                        @foreach ( json_decode($product->images,true) as $image )
                                <div class="img-thumbnail ">
                                     <img class="" src="{{ productImage($image) }}" alt="product">
                                </div>
                        @endforeach
                    @endif
                
                </div>
    </div> <!-- end product-section -->

    @include('partials.might-like')


@endsection

@section('extra-js')
        <script>

            ( function(){

                    const currentImage = document.querySelector('#currentImage');
                    const images = document.querySelectorAll('.img-thumbnail');

                    images.forEach((element) => element.addEventListener('mouseenter', thumbnailClick));

                    function thumbnailClick(e) {
                        // currentImage.src = this.querySelector('img').src;

                        currentImage.classList.remove('active');

                        currentImage.addEventListener('transitionend', () => {

                             currentImage.src = this.querySelector('img').src;
                             currentImage.classList.add('active');

                        })

                    images.forEach((element) => element.classList.remove('selected'));
                    this.classList.add('selected');

                        
                    }

            })();

        </script>
    
@endsection
