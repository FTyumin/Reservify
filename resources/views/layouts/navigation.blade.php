<nav class="bg-white shadow-lg p-4">
    <div class="container mx-auto flex justify-between items-center">
      <a href="/" class="text-xl font-semibold">Reservify</a>
      <div class="space-x-4">
        <a href="/about" class="text-gray-600 hover:text-gray-800">About</a>
        {{-- <a href="/hotels" class="text-gray-600 hover:text-gray-800">Hotels</a> --}}
        <a href="/contact" class="text-gray-600 hover:text-gray-800">Contact</a>
        <a href="{{ route('myprofile.show') }}" class="text-gray-600 hover:text-gray-800">My profile</a>
      </div>
  </div>
</nav>
