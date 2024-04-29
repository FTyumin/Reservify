<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow-lg">
        <nav class="container mx-auto py-4">
            <ul class="flex justify-center">
                <li><a href="/" class="text-gray-800 hover:text-gray-600 px-4">Home</a></li>
                <li><a href="/hotels" class="text-gray-800 hover:text-gray-600 px-4">Hotels</a></li>
                <li><a href="/contact" class="text-gray-800 hover:text-gray-600 px-4">Contact</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero bg-gray-900 text-white py-16">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4">Find Your Perfect Stay</h1>
                <p class="text-lg mb-6">Book from thousands of hotels worldwide</p>
                <form action="/search" method="GET" class="max-w-md mx-auto">
                    <input type="text" name="location" placeholder="Enter destination" class="w-full bg-gray-800 text-white px-4 py-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-40
