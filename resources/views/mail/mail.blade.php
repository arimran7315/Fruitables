<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .receipt {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receipt h1 {
            font-size: 24px;
            color: #333;
        }

        .receipt h2 {
            font-size: 20px;
            color: #666;
        }

        .receipt p {
            font-size: 14px;
            color: #333;
        }

        .receipt .details {
            margin: 20px 0;
        }

        .receipt .details th,
        .receipt .details td {
            padding: 10px;
            text-align: left;
        }

        .receipt .details th {
            background-color: #f8f8f8;
        }

        .receipt .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="receipt">
        {{-- order confirmed mail templates --}}
        @if ($mailData['status'] == 'confirmed')
            <h2>{{ $mailData['subject'] }}</h2>
            <p><strong>Date:</strong> {{ date('F d, Y') }}</p>
            <p><strong>Order Id:</strong> #{{ $mailData['code'] }}</p>
        @endif

        {{-- order rejected mail templates --}}
        @if ($mailData['status'] == 'reject')
            <h2>{{ $mailData['subject'] }}</h2>
            <p><strong>Date:</strong> {{ date('F d, Y') }}</p>
            <p><strong>Order Id:</strong> #{{ $mailData['code'] }}</p>
        @endif

        {{-- order completed mail templates --}}
        @if ($mailData['status'] == 'complete')
            <h2>{{ $mailData['subject'] }}</h2>
            <p><strong>Date:</strong> {{ date('F d, Y') }}</p>
            <p><strong>Order Id:</strong> #{{ $mailData['code'] }}</p>
        @endif

        {{-- order placed mail templates --}}
        @if ($mailData['status'] == 'placed')
            <h2>Thank you for your purchase! Your Order has been Placed</h2>
            <p><strong>Date:</strong> {{ date('F d, Y') }}</p>
            <p><strong>Order Id:</strong> #{{ $mailData['code'] }}</p>

            <table class="details" width="100%" border="1" style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 3; @endphp
                    @foreach ($mailData['orders'] as $order)
                        <tr>
                            <td>{{ $order->product }}</td>
                            <td>$ {{ $order->price }}</td>
                            <td>{{ $order->quantity . ' ' . $order->unit }}</td>
                            <td>${{ $order->price * $order->quantity }}</td>
                        </tr>

                        @php $total += $order->price * $order->quantity @endphp
                    @endforeach
                    <tr>
                        <td colspan="3" class="shipping">
                            Shipping Rate
                        </td>
                        <td>
                            $3
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="total">Total</td>
                        <td><b>${{ $total }}</b></td>
                    </tr>
                </tbody>
            </table>
        @endif
        <p>If you have any questions, feel free to contact us at support@fruitable.com.</p>

        <div class="footer">
            <p>&copy; 2024 Fruitable. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
