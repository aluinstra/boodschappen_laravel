@extends('layout.app')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<h1>Boodschappen Laravel 1.0</h1>



<table id='productTable'>
    <tr>
        @foreach ($tableHeads as $tableHead)
        <th>{{ $tableHead}}</th>
        @endforeach
    </tr>


    @foreach ($groceries as $key => $grocerie)
    <tr>
        <td>
            {{ $grocerie->id }}
        </td>
        <td>
            {{ $grocerie->grocerie }}
        </td>
        <td>
            {{ $grocerie->price }}
        </td>
        <td>
            {{ $grocerie->quantity }}
        </td>
        <td>
            {{ $grocerie->subtotal_price }}
        </td>
        <td>
            <form action="{{ route('groceries.edit', ['grocerie' => $grocerie->id]) }}" method='GET'>
                <button class="btn" type='submit' data-toggle="buttons">Update &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </form>
        </td>
        <td>
            <form action="{{ route('groceries.destroy', ['grocerie' => $grocerie->id]) }}" method='POST'>
                @csrf
                @method ('DELETE')
                <button class="btn" type='submit' data-toggle="buttons">Delete &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
    <tr>
        <td>Totaal</td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            {{ $totalPrice }}
        </td>
        <td></td>
        <td></td>
    </tr>
</table>



<!-- HOWTO::GET_MODEL_KEYS

    @foreach ($groceries as $key => $grocerie)
    <p>Grocerie show: {{ $grocerie->price}}</p>
    @foreach ($grocerie->toArray() as $key => $value)
    <p>Grocerie show: {{ $key }}</p>
    @endforeach
    @endforeach


    @foreach ($groceries as $key => $grocerie)
    <p>Grocerie show: {{ $grocerie->price}}</p>
    @foreach ($grocerie->getAttributes() as $key => $value)
    <p>Grocerie show: {{ $key }}</p>
    @endforeach
    @endforeach -->


@endsection