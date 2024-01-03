<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
    <title>UP | Invoice</title>
</head>

<body>

<div class="orderList">
    <div class="orderBox">
        <div class="orderBoxStats">
            <h3>Order: #{{ $order->id }}</h3>
            <p>{{ $order->status }}</p>
        </div>
        @forelse ($order->order_items as $item)
            <div class="orderBoxContent">
                <div class="orderProds">
                    <div class="orderBoxContentInfo">
                        <div class="orderProdInfos">
                            <h3>{{ $item->stock->Product_Color->product->name }}</h3>
                            <p>{{ $item->stock->Product_Color->product->description }}</p>
                            <h3>{{ $item->stock->size->size }}</h3>
                            <div class="colorBox colorActive" 
                                style="background-color: {{ $item->stock->Product_Color->color->color }};">
                            </div>
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
            <div class="orderFooterInfo">
                <p>Processed Date: {{ $order->processed_date }}</p>
                <p>Delivery Date: {{ $order->delivery_date }}</p>
                <h3>Total: {{ $order->total_price }}€</h3>
            </div>
        </div>
    </div>
</div>
    
</body>

</html>