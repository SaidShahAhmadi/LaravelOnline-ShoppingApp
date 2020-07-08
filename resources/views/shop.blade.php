@extends('layout')

@section('title', 'Products')

@section('extra-css')

@endsection

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <a href="/">Home</a>
          <strong> > </strong>
        <span>Shop</span>
    </div>
</div> <!-- end breadcrumbs -->
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="products-section">
                <div class="sidebar">
                    <h3>By Category</h3>
                    <ul>
                        @foreach ($categories as $category)
                            {{-- <li class=""><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li> --}}
                            <li class="{{ setActiveCategory($category->slug) }}"><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- end sidebar -->
        
                <div>
                 
                    <div class="products-header">
                        <h1 class="stylish-heading">{{ $categoryName }}</h1>
                        <div>
                            <h2>Price: </h2>
                            <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                            <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>
                        </div>
                    </div>
        
                    <div class="products text-center">
                    {{-- showing all product from shopController --}}
                        @forelse ($products as $product)
                            <div class="product">
                                {{-- to show specfic product when click --}}
                                <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ asset('storage/'.$product->image) }}" alt="product"></a>
                                <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                <div class="product-price">{{ asDollars($product->price) }}</div>
                            </div>
                        @empty
                            <div style="text-align: left">No items found</div>
                        @endforelse
                    </div> <!-- end products -->
        
                    <div class="spacer"></div>
                    {{-- pagination  --}}
                    {{ $products->appends(request()->input())->links() }}
                         {{-- {{ $products->links() }} --}}
                </div>
            </div>
        
        </div>
    </div>
</div>

@endsection
