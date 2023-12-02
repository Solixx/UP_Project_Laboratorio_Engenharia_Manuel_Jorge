{{-- @foreach ($product_Brands as $product_Brand)
    <p>This is Product Name: {{ $product_Brand->product->name }}</p>
    <p>This is Product Description: {{ $product_Brand->product->description }}</p>
    <p>This is Brand Name: {{ $product_Brand->brand->name }}</p>
    <img src="{{asset($product_Brand->brand->imgPath)}}" />
@endforeach --}}

@foreach ($stocks as $stock)
<p>This is Product Name: {{ $stock->product_color->product->name }}</p>
<p>This is Product Description: {{ $stock->product_color->product->description }}</p>
    @foreach ($stock->product_color->product->brands as $brand)
        <p>This is Brand Name: {{ $brand->brand->name }}</p>
    @endforeach
    <p>This is Color: {{ $stock->product_color->color->color }}</p>
    <p>This is Size: {{ $stock->size->size }}</p>
    @foreach ($stock->product_color->photos as $photo)
        <img src="{{asset($photo->imgPath)}}" />
    @endforeach
{{-- <img src="{{asset($product_Brand->brand->imgPath)}}" /> --}}
@endforeach