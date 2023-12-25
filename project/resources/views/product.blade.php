@extends('layouts.app')

@section('title')
    UP | 
    {{ $stock->product_color->product->name }}
@endsection

@section('content')
    <div class="produto">
        <div class="container">
            <div class="col8 colL6 colM8 colS4 prodImgs">
                @foreach ($stock->product_color->photos as $photo)
                    <img src="{{ asset($photo->imgPath) }}" alt="{{ $photo->img }}">
                @endforeach
                {{-- @for ($i = 0; $i < 4; $i++)
                    <img src="{{ asset('imgs/snekears.jpg') }}" alt="Produto">
                @endfor --}}
            </div>
            <div class="col4 colL6 colM8 colS4 prodInfo">

                @section('prodName')
                    {{ $stock->product_color->product->name }}
                @endsection

                @section('prodPrice')
                    €{{ $stock->price }}
                @endsection

                @section('prodDesc')
                {{ $stock->product_color->product->description }}
                @endsection

                @section('prodColors')
                    <div class="color">
                        @php $thisProduct = $stock->product_color->product; @endphp
                        @foreach ($thisProduct->colors as $color)
                        @if ($color->stock->isNotEmpty()) 
                            @if ($color->color->id == $stock->product_color->color_id)
                                <div class="colorBox colorActive" style="background-color: {{ $color->color->color }};"></div>
                            @else
                                <a href="{{ route('product',$color->stock->first()->id) }}"><div class="colorBox" style="background-color: {{ $color->color->color }};"></div></a>
                            @endif
                        @endif
                        @endforeach
                    </div>
                @endsection

                @section('prodSizes')
                    <div class="size">
                        @forelse ($stocks as $thisStock)
                            <div class="sizeBoxSpace"> 
                                @if ($stock->id == $thisStock->stock_id)
                                    @if($thisStock->stock == 0)
                                        <a href="{{ route('product',$thisStock->stock_id) }}">
                                            <div class="sizeBox sizeActive sizeOut">{{ $thisStock->size }}</div>
                                        </a>
                                    @else
                                        <a href="{{ route('product',$thisStock->stock_id) }}">
                                            <div class="sizeBox sizeActive">{{ $thisStock->size }}</div>
                                        </a>
                                    @endif
                                @else
                                    @if($thisStock->stock == 0)
                                        <a href="{{ route('product',$thisStock->stock_id) }}">
                                            <div class="sizeBox sizeOut">{{ $thisStock->size }}</div>
                                        </a>
                                    @else
                                        <a href="{{ route('product',$thisStock->stock_id) }}">
                                            <div class="sizeBox">{{ $thisStock->size }}</div>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        @empty 
                        @endforelse
                    </div>
                    {{-- <div class="size">
                        @php $thisProductColor = $stock->product_color; 
                          $stocks = Stock::where('product_color_id', $thisProductColor->id)->get();
                          $sizes = array();
                        @endphp
                        @foreach ($stocks as $thisStock)
                            @php $sizes[] = $thisStock->size_id; @endphp
                        @endforeach
                        @php sort($sizes); @endphp
                        @foreach ($sizes as $sizeID)
                            <div class="sizeBoxSpace"> 
                                @php $thisSize = Size::where('id', $sizeID)->get()->first(); @endphp
                                @if ($thisSize->id == $stock->size_id)
                                    @if($stock->stock == 0)
                                        <a href="{{ route('product',Stock::where('product_color_id', $stock->product_color_id)->where('size_id', $thisSize->id)->get()->first()->id) }}">
                                            <div class="sizeBox sizeActive sizeOut">{{ $thisSize->size }}</div>
                                        </a>
                                    @else
                                        <a href="{{ route('product',Stock::where('product_color_id', $stock->product_color_id)->where('size_id', $thisSize->id)->get()->first()->id) }}">
                                            <div class="sizeBox sizeActive">{{ $thisSize->size }}</div>
                                        </a>
                                    @endif
                                @else
                                    @if(Stock::where('product_color_id', $stock->product_color->id)->where('size_id', $thisSize->id)->get()->first()->stock == 0)
                                        <a href="{{ route('product',Stock::where('product_color_id', $stock->product_color_id)->where('size_id', $thisSize->id)->get()->first()->id) }}">
                                            <div class="sizeBox sizeOut">{{ $thisSize->size }}</div>
                                        </a>
                                    @else
                                        <a href="{{ route('product',Stock::where('product_color_id', $stock->product_color_id)->where('size_id', $thisSize->id)->get()->first()->id) }}">
                                            <div class="sizeBox">{{ $thisSize->size }}</div>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        @endforeach
                    </div> --}}
                @endsection

                @include('includes.productInfo')

                <div class="prodButtons">
                    @if ($stock->stock == 0)
                        <form action="#">
                            @csrf
                            <button type="button" class="addCartBtn addCartBtnDisabled" disabled>Out Of Stock</button>
                        </form>
                    @else
                        <form action="{{ Route('cart.store',$stock->id) }}" method="POST">
                            @csrf
                            <button class="addCartBtn">Add to cart</button>
                        </form>
                    @endif
                    @if ($authUser && $fav != null)
                        <form method="POST" class="favForm" action="{{ Route('favorite.delete',$fav->id) }}">
                            @method('DELETE')
                            @csrf
                            <button class="favBtn favBtnActive">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
                                </svg>
                            </button>
                        </form>
                    @else
                        <form class="favForm" action="{{ Route('favorite.store',$stock->id) }}" method="POST">
                            @csrf
                            <button class="favBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/>
                                </svg>
                            </button>
                        </form>
                    @endif
                </div>

                <div class="prodComments">
                    <hr>
                    <div class="commentCreate">
                        <form action="{{ Route('comment.store',$stock->product_color->product_id) }}" method="POST">
                            @csrf
                            <textarea name="comment" cols="30" rows="10" placeholder="Comment"></textarea>
                            <button>Submit</button>
                        </form>
                    </div>
                    @foreach ($comments as $comment)
                        <div class="commentBox">
                            <div class="commentUserInfo">
                                <img src="{{ asset($comment->user->imgPath) }}" alt="User">
                                <h3>{{ $comment->user->name }}</h3>
                                @if($authUser && $authUser->id == $comment->user->id)
                                    <div class="commentDelete">
                                        <form method="POST" action="{{ Route('comment.delete',$comment->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    @endforeach
                    {{-- <div class="commentBox">
                        <div class="commentUserInfo">
                                <img src="{{ asset('imgs/logo.png') }}" alt="User">
                                <h3>Name</h3>
                            </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
