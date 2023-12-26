@extends('layouts.app')

@section('title')
    UP | {{ $authUser->name }}
@endsection

@section('content')

    <div class="container">
        <div class="col12 colL12 colM8 colS4 userInfo">
            <div class="userAvatar">
                <a href="{{ Route('settings.editProfile') }}"><img src="{{asset($authUser->imgPath)}}" alt=""></a>
            </div>
            <div class="userName">
                <h1> {{ $authUser->name }} </h1>
            </div>
            <div class="userDate">
                <p>Member Since: {{ $authUser->created_at }}</p>
            </div>
        </div>
    </div>


        <div class="container favorites">
            <div class="col12 colL12 colM8 colS4">
                <hr>
                <h1>Favorites</h1>
            </div>
        </div>
        <div class="content favProducts">
            <div id="favProductsImageGallery" class="favProductsInfo">
                @forelse ($favorites as $fav)
                    @if($fav && $fav->stock)
                        <div class="newArrivalsBox">
                            <img src="{{ asset($fav->stock->product_color->photos->first()->imgPath) }}" alt="{{ $fav->stock->product_color->photos->first()->img }}">
                            <a href="{{ route('product',$fav->stock->id) }}"><p>Go To ></p></a>    
                        </div>
                    @endif
                @empty
                    
                @endforelse

                {{-- <img src="{{ asset('imgs/snekears.jpg') }}" alt="">
                <img src="{{ asset('imgs/db37e277c3e9b04a677e5e936fe6c497.jpg') }}" alt="">
                <img src="{{ asset('imgs/snekears3.jpg') }}" alt="">
                <img src="{{ asset('imgs/snekears4.jpg') }}" alt="">
                <img src="{{ asset('imgs/snekears2.jpg') }}" alt="">
                <img src="{{ asset('imgs/snekears5.jpg') }}" alt=""> --}}
            </div>
        </div>

    <div class="container">
        <div class="col12 colL12 colM8 colS4 orders">
            <h1>Orders</h1>
            @forelse ($orders as $order)
                <div class="orderList">
                    <div class="orderBox">
                        <div class="orderBoxStats">
                            <h3>Order: #{{ $order->id }}</h3>
                            <p>{{ $order->status }}</p>
                        </div>
                        @forelse ($order->order_itemsWithTrashed as $item)
                            <div class="orderBoxContent">
                                <div class="orderProds">
                                    <div class="orderBoxContentImage">
                                        <a href="{{ Route('product', $item->stockWithTrashed->id) }}">
                                            @if($item->stockWithTrashed->product_colorWithTrashed->photos->first()->exists()) 
                                                <img src="{{ asset($item->stockWithTrashed->product_colorWithTrashed->photos->first()->imgPath) }}" alt="{{ $item->stockWithTrashed->product_colorWithTrashed->photos->first()->img }}">
                                            @else
                                                <img src="https://via.placeholder.com/100" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="orderBoxContentInfo">
                                        <div class="orderProdInfos">
                                            <h3>{{ $item->stockWithTrashed->product_colorWithTrashed->productWithTrashed->name }}</h3>
                                            <p>{{ $item->stockWithTrashed->product_colorWithTrashed->productWithTrashed->description }}</p>
                                            <h3>{{ $item->stockWithTrashed->size->size }}</h3>
                                            <div class="colorBox colorActive" style="background-color: {{ $item->stockWithTrashed->product_colorWithTrashed->color->color }};"></div>
                                        </div>
                                        <div class="orderProdPrice">
                                            <h3>{{ $item->price }}€</h3>
                                            <p>x{{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            
                        @endforelse
                        

                        <div class="orderFooter">
                            <div class="orderFooterBtn">
                                <form action="{{ Route('invoice', $order->id) }}" method="GET">
                                    @csrf
                                    <button type="submit">Invoice</button>
                                </form>
                                @if (strtolower($order->status) == 'pending' || strtolower($order->status) == 'processing')
                                    <form action="{{ route('deleteOrder', $order->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Cancel</button>
                                    </form>
                                @endif
                            </div>
                            <div class="orderFooterInfo">
                                <p>Processed Date: {{ $order->processed_date }}</p>
                                <p>Delivery Date: {{ $order->delivery_date }}</p>
                                <h3>Total: {{ $order->total_price }}€</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                
            @endforelse
            {{-- <div class="orderList">
                <div class="orderBox">
                    <div class="orderBoxStats">
                        <h3>Order: #1</h3>
                        <p>Delivered</p>
                    </div>
                    <div class="orderBoxContent">
                        <div class="orderProds">
                            <div class="orderBoxContentImage">
                                <img src="{{ asset('imgs/snekears.jpg') }}" alt="">
                            </div>
                            <div class="orderBoxContentInfo">
                                <div class="orderProdInfos">
                                    <h3>Product Name</h3>
                                    <p>Product Description</p>
                                    <h3>L</h3>
                                    <div class="colorBox colorActive" style="background-color: #ffffff;"></div>
                                </div>
                                <div class="orderProdPrice">
                                    <h3>100.00€</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="orderBoxContent">
                        <div class="orderProds">
                            <div class="orderBoxContentImage">
                                <img src="{{ asset('imgs/snekears.jpg') }}" alt="">
                            </div>
                            <div class="orderBoxContentInfo">
                                <div class="orderProdInfos">
                                    <h3>Product Name</h3>
                                    <p>Product Description</p>
                                    <h3>L</h3>
                                    <div class="colorBox colorActive" style="background-color: #ffffff;"></div>
                                </div>
                                <div class="orderProdPrice">
                                    <h3>100.00€</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="orderFooter">
                        <div class="orderFooterBtn">
                        </div>
                        <div class="orderFooterInfo">
                            <p>Order Date: xx/yy/zzzz</p>
                            <p>Delivery Date: xx/yy/zzzz</p>
                            <h3>Total: 100.00€</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="orderList">
                <div class="orderBox">
                    <div class="orderBoxStats">
                        <h3>Order: #2</h3>
                        <p>Processing</p>
                    </div>
                    <div class="orderBoxContent">
                        <div class="orderProds">
                            <div class="orderBoxContentImage">
                                <img src="{{ asset('imgs/snekears.jpg') }}" alt="">
                            </div>
                            <div class="orderBoxContentInfo">
                                <div class="orderProdInfos">
                                    <h3>Product Name</h3>
                                    <p>Product Description</p>
                                    <h3>L</h3>
                                    <div class="colorBox colorActive" style="background-color: #ffffff;"></div>
                                </div>
                                <div class="orderProdPrice">
                                    <h3>100.00€</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="orderFooter">
                        <div class="orderFooterBtn">
                            <button>Cancel</button>
                        </div>
                        <div class="orderFooterInfo">
                            <p>Order Date: xx/yy/zzzz</p>
                            <p>Delivery Date: xx/yy/zzzz</p>
                            <h3>Total: 100.00€</h3>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    
@endsection

<script src="{{ asset('js/favProductsScrollX.js') }}"></script>