<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Home</h1>
    <div>
        {{-- <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a> --}}
        {{-- <form action="{{ route('reservation.store') }}" method="POST"> --}}
        <form action="" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="check_in">Check-in Date:</label>
            <input type="date" name="check_in" id="check_in" required>

            <label for="check_out">Check-out Date:</label>
            <input type="date" name="check_out" id="check_out" required>

            <button type="submit">Make Reservation</button>
        </form>
        
    </div>
</body>
</html>