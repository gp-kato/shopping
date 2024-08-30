<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <div class="content wrapper">
            <h1>Thank you for your purchase!</h1>
            <p>Your order has been received and is being processed.</p>
            <ul class="product-list">
                @foreach($sessionData as $data)
                    @if(!empty($data['id']) && !empty($data['name']) && !empty($data['price']) && !empty($data['session_quantity']))
                        <li>
                            <img src="{{asset('img/item' . $data['id'] . '.jpg')}}">
                            <p>{{ $data['name'] }}</p>
                            <p>¥{{ number_format($data['price']) }} 円 +tax</p>
                            <span>
                                {{ $data['session_quantity'] }}
                            </span>
                            個
                            <p>¥{{ number_format($data['session_quantity'] * $data['price']) }}</p>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </body>
</html>
