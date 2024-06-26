<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
</head>
<body>
    <h1>Payment Confirmation</h1>
    <p>Thank you for your payment. Here are the details:</p>
    <ul>
        <li>Reservation ID: {{ $payment->reservation_id }}</li>
        <li>Amount: {{ $payment->amount }}€</li>
        <li>Date: {{ $payment->date }}</li>
    </ul>
</body>
</html>
