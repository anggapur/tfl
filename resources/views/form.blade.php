<form method="POST" action="{{url('cart','1')}}">
<input type="text" name="">
<input type="submit" name="">
<input type="hidden" name="_method" value="DELETE">

<input type="text" name="_token" value="{{csrf_token()}}">
</form>