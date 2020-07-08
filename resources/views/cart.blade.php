@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')

@endsection

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <a href="#">Home</a>
        {{-- <i class="fa fa-chevron-right breadcrumb-separator"></i> --}}
        <strong> > </strong>
        <span>Shopping Cart</span>
    </div>
</div> <!-- end breadcrumbs -->

<br>
<div class="container">
    <div class="row">
        <div class="col-md-7">
           <div class="card">
            <div class="card-header"><h3> <span class="badge badge-danger">{{ Cart::count() }} </span> item(s) in Shopping Cart</h3></div>
               <div class="card-body">
                {{-- checking if the cart is empty --}}
                 @if (Cart::count() > 0)
                    <div class="cart-table">
                        {{-- loop all cart --}}
                        @foreach (Cart::content() as $item)
                        <div class="cart-table-row row">

                            <div class="col-md-6">
                                <div class="cart-table-row-left">
                                    <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('storage/'.$item->model->image) }}" alt="item" class="cart-table-img"></a>
                                    <div>
                                        <select class="quantity custom-select input-sm" data-id="{{ $item->rowId }}"> 
                                            @for ($i = 1; $i < 5 + 1 ; $i++)
                                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                            {{-- <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                            <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                            <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                            <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                            <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>{{-- col-md-6 --}}

                            {{-- <div class="cart-table-row-right"> --}}

                                <div class="col-md-5">
                                    <div class="cart-table-actions">  
                                        <div class="cart-item-details">
                                            {{-- $item->model->name it's mean's that go to product model and get product name  --}}
                                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                                            <div class="cart-table-description">{{ $item->model->details }}</div>
                                        </div>


                                        <span class="badge badge-dark">Price: {{ asDollars($item->subtotal) }}</span>
                                        {{-- {{ presentPrice($item->subtotal) }} --}}

                                        <div class="form-inline ">
                                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-outline-danger btn-sm btn-size">Remove</button>
                                            </form>
                                                
                                            <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-outline-success  btn-size">Save for Later</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            {{-- </div>  <!-- cart-table-row-right --> --}}
                        </div> <!-- end cart-table-row -->
                        @endforeach
                    </div> <!-- end cart-table -->
               </div><!-- end card-body -->
           </div> <!-- end card -->

           
           <br>
           <div class="cart-buttons">
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <a href="{{ route('checkout.index') }}" class="button-primary">PLACE ORDER</a>
           </div>
        </div> <!-- end col-md-7 -->

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">PRICE DETAILS</div>
                    <div class="card-body">
                        <div class="cart-totals">
                            {{-- <div class="cart-totals-left">
                                Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
                            </div> --}}

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action
                                        align-items-center justify-content-between d-flex "> Price ({{ Cart::count() }} items)
                                    <span>{{ asDollars(Cart::subtotal()) }} </span> 
                                </li>

                                <li class="list-group-item list-group-item-action
                                        align-items-center justify-content-between d-flex "> Delivery Fee
                                    <span style="color:#388E3C">FREE </span> 
                                </li>

                                <li class="list-group-item list-group-item-action
                                        align-items-center justify-content-between d-flex "> Tax (20%)
                                    <span>{{ asDollars(Cart::tax()) }} </span> 
                                </li>

                                <li class="list-group-item list-group-item-action
                                        align-items-center justify-content-between d-flex "> Total Amount
                                    <span class="badge badge-dark  ">{{ asDollars(Cart::total()) }} </span> 
                                </li>  
                            </ul>
                        </div> <!-- end cart-totals -->
                        @else
                            <h3 class="alert alert-warning">No items in Cart!</h3>
                        @endif
                       {{-- End of  checking if ther cart is empty --}}
                    </div> <!-- card-body -->
                </div>  <!-- card -->
                
              
            </div><!-- col-md-5 -->

            
    </div><!-- end row -->



    
 

    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3> <span class="badge badge-danger">{{ Cart::instance('saveForLater')->count() }} </span> item(s) Saved For Later</h3></div>
                   <div class="card-body"> 
    
                        {{-- saveForLater  --}}
                        @if (Cart::instance('saveForLater')->count() > 0)

                        <div class="saved-for-later cart-table">
                            {{-- saved item for later --}}
                            @foreach (Cart::instance('saveForLater')->content() as $item)

                            <div class="cart-table-row row">

                                <div class="col-md-3">
                                    <div class="cart-table-row-left">
                                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('storage/'.$item->model->image) }}" alt="item" class="cart-table-img"></a>
                            
                                    </div>
                                </div> {{-- col-md-6 --}}

                                <div class="col-md-3">
                                    <div class="cart-table-row-right">

                                        <div class="cart-item-details">
                                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                                            <div class="cart-table-description">{{ $item->model->details }}</div>
                                                <div>
                                                    <span class="badge badge-dark">Price: {{ asDollars(Cart::subtotal()) }}</span> 
                                                </div>
                                        </div>

                                        <div class="cart-table-actions">
                                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
    
                                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn  btn-outline-danger">Remove</button>
                                            </form>
    
                                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-outline-primary savelater">Move to Cart</button>
                                            </form>
                                        </div>
                                        {{-- <div>{{ $item->model->presentPrice() }}</div> --}}
                                    </div> <!-- cart-table-row-right -->
                                </div> {{-- col-md-6 --}}
                            </div> <!-- end cart-table-row row -->
                            @endforeach

                        </div> <!-- end saved-for-later -->

                        @else

                        <h3 class="alert alert-warning">You have no items Saved for Later.</h3>
                        @endif
        
                   </div> <!-- end card-body--> 
            </div><!-- end card-->
        </div><!-- col-md-12 -->
    </div><!-- end row -->
    <br>
</div><!-- end container -->

    @include('partials.might-like')


@endsection

@section('extra-js')


    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>
@endsection 
