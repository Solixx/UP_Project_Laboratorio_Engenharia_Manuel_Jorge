@php
    use Gloudemans\Shoppingcart\Facades\Cart;
    use App\Models\Stock;
@endphp

<div id="cartSidebar" class="cartSB">
    <a href="javascript:void(0)" class="cartClosebtn" onclick="closeCartNav()">×</a>
    <h1>Cart</h1>

    <hr>
    
    <div class="cartProds">
        @forelse ($cart->content() as $item)
            @php $stock = $item->model; @endphp
            @if(!$stock) 
                @continue
            @endif	
            <div class="cartProdBox">
                <div class="cartProdImg">
                    @if(count($stock->product_color->photos) > 0)
                        <img src="{{ asset($stock->product_color->photos->first()->imgPath) }}" alt="{{ $stock->product_color->photos->first()->img }}">
                    @else
                        <img src="{{ asset('imgs/no_img.JPG') }}" alt="">
                    @endif
                </div>
                <div class="cartProdTitleQuant">
                    <h3>{{ $item->name }}</h3>
                    <div class="cartProdQuant">
                        <form class="formBtn" action="{{ Route('cart.decrease', $stock->id) }}" method="POST">
                            @csrf
                            <button class="no-right-border">-</button>
                        </form>
                        <form class="formInput" action="{{ Route('cart.setQty', $stock->id) }}" method="POST">
                            @csrf
                            <input name="qty" type="text" value="{{ $item->qty }}">
                            <button style="display: none"></button>
                        </form>
                        <form class="formBtn" action="{{ Route('cart.increase', $stock->id) }}" method="POST">
                            @csrf
                            <button class="no-left-border">+</button>
                        </form>
                    </div>
                </div>
                <div class="cartProdPriceDelete">
                    <p>€{{ $item->price }}</p>
                    <form action="{{ Route('cart.remove', $stock->id) }}" method="POST">
                        @csrf
                        <button><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                    </form>
                </div>
            </div>
        @empty
            
        @endforelse
    </div>
    
    <div class="cartBottom">
        <div class="cartOrderInfo">
            <div class="cartOrderInfoBox">
                <p>Subtotal</p>
                <p>€{{ $cart->subtotal(); }}</p>
            </div>
            <div class="cartOrderInfoBox">
                <p>Tax</p>
                <p>€{{ $cart->tax(); }}</p>
            </div>
            <div class="cartOrderInfoBox">
                <p>Total</p>
                <p>€{{ $cart->total(); }}</p>
            </div>
        </div>
        <div class="cartBtn">
            <form action="{{ Route('stripe.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" @if($cart->total() <= 0) disabled @endif>Checkout</button>
            </form>
        </div>
    </div>
</div>