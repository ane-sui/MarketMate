<x-guest-layout>
    <h1>Thank You for Your Purchase!</h1>
    <p>Dear {{ $orderDetails['customer_name'] }},</p>
    <p>Your order of {{$orderDetails['product_name']}}</p>
    <p>Your order ID is {{ $orderDetails['order_id'] }}.</p>
    <p>Total Amount: ${{ $orderDetails['total_amount'] }}</p>
</x-guest-layout>
