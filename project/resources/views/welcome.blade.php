@foreach ($product_Brands as $product_Brand)
    <p>This is Product Name: {{ $product_Brand->product->name }}</p>
    <p>This is Product Description: {{ $product_Brand->product->description }}</p>
    <p>This is Brand Name: {{ $product_Brand->brand->name }}</p>
    <img src="{{asset($product_Brand->brand->imgPath)}}" />
@endforeach