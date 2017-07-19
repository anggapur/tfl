@foreach($products as $val)

    {{$val->product_name}}
@endforeach
{{$products->render()}}