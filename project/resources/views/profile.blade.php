@extends('layouts.app')

@section('title')
    UP | Nome
@endsection

@section('content')

    <div class="container">
        <div class="col12 colL12 colM8 colS4 userInfo">
            <div class="userAvatar">
                <a href="{{ url('settings/edit-profile') }}"><img src="{{ asset('imgs/snekears.jpg') }}" alt=""></a>
            </div>
            <div class="userName">
                <h1>Manuel Gonçalves</h1>
            </div>
            <div class="userDate">
                <p>Member Since: xx/yy/zzzz</p>
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
                <img src="{{ asset('imgs/snekears.jpg') }}" alt="">
                <img src="{{ asset('imgs/db37e277c3e9b04a677e5e936fe6c497.jpg') }}" alt="">
                <img src="{{ asset('imgs/snekears3.jpg') }}" alt="">
                <img src="{{ asset('imgs/snekears4.jpg') }}" alt="">
                <img src="{{ asset('imgs/snekears2.jpg') }}" alt="">
                <img src="{{ asset('imgs/snekears5.jpg') }}" alt="">
            </div>
        </div>

    <div class="container">
        <div class="col12 colL12 colM8 colS4 orders">
            <h1>Orders</h1>
            <div class="orderList">
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
            </div>
        </div>
    </div>
    
@endsection

<script src="{{ asset('js/favProductsScrollX.js') }}"></script>
