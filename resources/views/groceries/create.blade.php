@extends ('layout.app')


@section('content')

<!-- @if($errors->any())
{{ implode('', $errors->all('<div>:message</div>')) }}
@endif -->

<form action="/groceries" method="POST">
    @csrf
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <tr>
            <td>
                <input type="text" name="grocerie" value="{{ old('grocerie')}}">

                @if ($errors->has('grocerie'))
                <div class="error">{{ $errors->first('grocerie') }}</div>
                @endif
            </td>
            <td>
                <input type="text" name="price" value="{{ old('price')}}">

                @if ($errors->has('price'))
                <div class="error">{{ $errors->first('price') }}</div>
                @endif
            </td>
            <td>
                <input type="text" name="quantity" value="{{ old('quantity')}}">

                @if ($errors->has('quantity'))
                <div class="error">{{ $errors->first('quantity') }}</div>
                @endif
            </td>
        </tr>
    </table>
    <div id=inputTableButton>
        <button type="sumbit">button</button>
    </div>
</form>

@if ($errors->has('product'))
<div class="error">{{ $errors->first('product') }}</div>
@endif

@endsection