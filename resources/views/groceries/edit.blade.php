@extends ('layout.app')

@section('content')
<form action="/groceries/{{$grocerie->id}}" method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <tr>
            <td><input type="text" name="grocerie" value='{{$grocerie->grocerie}}'></td>
            <td><input type="text" name="price" value='{{$grocerie->price}}'></td>
            <td><input type="text" name="quantity" value='{{$grocerie->quantity}}'></td>
        </tr>
    </table>
    <div id=inputTableButton>
        <button type="sumbit">button</button>
    </div>
</form>

@endsection