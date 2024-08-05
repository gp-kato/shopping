@extends('layout')

@section('title', 'Furniture Design')

@section('content')
    @if(!is_null($cartData))
        @foreach($cartData as $key => $data)
            <section>
                <tr class="text-center">
                    <th class="align-middle">{{ $key }}</th>
                        <td class="align-middle">
                            {{ $data['name'] }}
                        </td>
                        <td class="align-middle">
                            ¥{{ number_format($data['price']) }} 円
                        </td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-outline-dark">
                                {{ $data['session_quantity'] }}
                            </button>
                            個
                        </td>
                        <td class="align-middle">
                            ¥{{ number_format($data['session_quantity'] * $data['price']) }}
                        </td>
                        <td class="border-0 align-middle">
                            {!! Form::open(['route' => ['itemRemove', 'method' => 'post', $data['session_products_id']]]) !!}
                            {{ Form::submit('削除', ['name' => 'delete_products_id', 'class' => 'btn btn-danger']) }}
                            {{ Form::hidden('product_id', $data['session_products_id']) }}
                            {{ Form::hidden('product_quantity', $data['session_quantity']) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
            </section>
        @endforeach
    @else
        <p>カートに商品がありません。</p>
    @endif
@endsection
