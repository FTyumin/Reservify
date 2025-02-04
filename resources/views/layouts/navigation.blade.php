<nav class="bg-white shadow-lg p-2 m-0 w-full">
  
  <div class="container ml-4 flex justify-between items-center w-full p-0">
    <a href="/" class="text-3xl text-left font-semibold">{{ __('messages.reservify') }}</a>
      <div class="space-x-4 flex items-center justify-between text-right">
        
        @if(Auth::check())
          @if(Auth::user()->role==='admin')
                <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-800"> Dashboard </a>
          @endif
        @endif
          <a href="/about" class="text-gray-600 hover:text-gray-800">{{ __('messages.about') }}</a>
          <a href="/contact" class="text-gray-600 hover:text-gray-800">{{ __('messages.contact') }}</a>
          @if(Auth::check())
            <a href="{{ route('myprofile.show') }}" class="text-gray-600 hover:text-gray-800">{{ __('messages.my_profile') }}</a>
          @else
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">{{ __('messages.login') }}</a>
          @endif

          
          
          <div class="language-select ml-4">
              <form action="{{ route('locale.switch') }}" method="POST">
                  @csrf
                  <select name="locale" onchange="this.form.submit()" class="form-select border border-gray-300 rounded px-3 py-1 focus:outline-none focus:border-blue-500 w-48"> 
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    <option value="lv" {{ app()->getLocale() == 'lv' ? 'selected' : '' }}>Latvian</option>
                    <option value="ru" {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>Russian</option>
                  </select>
              </form>
          </div>
      </div>
  </div>
</nav>