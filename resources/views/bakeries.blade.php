@extends('layout')

@section('content')
    <table>
        <tr>
            <td>Name</td>
            <td>Weight</td>
            <td>Price</td>
            <td></td>
        </tr>

        @forelse($bakeries as $bakery)
            <tr>
                <td>{{ $bakery->name }}</td>
                <td>{{ $bakery->weight }}</td>
                <td>{{ $bakery->price }}</td>
                <td><a href="{{ route('bakery.add', $bakery->id) }}"> + Add to Cart</a></td>
            </tr>
        @empty
            <tr><p>Empty</p></tr>
        @endforelse
    </table>
    @if(!Cart::isEmpty())
        Total: {{ Cart::getTotalQuantity() }}
    @endif
@endsection