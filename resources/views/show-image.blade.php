
<h1>Show image</h1>
<p>Name : {{$product['name']}}</p>
<p>Quantity : {{$product['quantity'] }}</p>
@foreach($product['image'] as $item)

	<img src="{{$item}}">

@endforeach