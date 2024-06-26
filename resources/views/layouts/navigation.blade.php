<nav class="bg-white shadow-lg p-4">
  <div class="container mx-auto flex justify-between items-center">
      <a href="/" class="text-xl font-semibold">{{ __('messages.reservify') }}</a>
      <div class="space-x-4 flex items-center">
          <a href="/about" class="text-gray-600 hover:text-gray-800">{{ __('messages.about') }}</a>
          <a href="/contact" class="text-gray-600 hover:text-gray-800">{{ __('messages.contact') }}</a>
          <a href="{{ route('myprofile.show') }}" class="text-gray-600 hover:text-gray-800">{{ __('messages.my_profile') }}</a>
          <div class="language-select ml-4">
              <form action="{{ route('locale.switch') }}" method="POST">
                  @csrf
                  <select name="locale" onchange="this.form.submit()" class="form-select border border-gray-300 rounded px-3 py-1 focus:outline-none focus:border-blue-500 w-32">                      <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    <option value="lv" {{ app()->getLocale() == 'lv' ? 'selected' : '' }}>Latvian</option>
                    <option value="ru" {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>Russian</option>
                  </select>
              </form>
          </div>
      </div>
  </div>
</nav>
