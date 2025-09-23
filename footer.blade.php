<footer class="bg-teal-700 text-gray-100 mt-12">
  <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-4 gap-8">

    <!-- Profil Singkat -->
    <div>
      <h2 class="text-lg font-bold mb-3">{{ get_option('nama') }}</h2>
      <p class="text-sm text-gray-200 leading-relaxed">
       {{ get_option('deskripsi') }}
      </p>
    </div>

    <!-- Navigasi -->
    @foreach(get_menu('footer')->take(2) as $row)
    <div>
      <h2 class="text-lg font-bold mb-3">{{ $row->name }}</h2>
      <ul class="space-y-2 text-sm">
        @foreach($row->sub as $row2)
        <li><a href="{{ $row2->url }}" class="hover:text-yellow-300 transition">{{ $row2->name }}</a></li>
      @endforeach
      </ul>
    </div>
@endforeach

    <!-- Kontak -->
    <div id="kontak">
      <h2 class="text-lg font-bold mb-3">Kontak</h2>
      <ul class="text-sm space-y-2">
        <li class="flex items-start space-x-2">
          <svg class="w-5 h-5 flex-shrink-0 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17.657 16.657L13.414 12.414a4 4 0 10-5.657 5.657l4.243 4.243a8 8 0 1111.314-11.314l-4.243 4.243z"/>
          </svg>
          <span>{{ get_option('alamat') }}</span>
        </li>
        <li class="flex items-center space-x-2">
          <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5h12M9 3v2m-6 7h12M9 10v2m-6 7h12M9 17v2"/>
          </svg>
          <span>{{ get_option('telepon') }}</span>
        </li>
        <li class="flex items-center space-x-2">
          <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 12a4 4 0 01-8 0M12 14v7m0 0h8m-8 0H4"/>
          </svg>
          <span>{{ get_option('email') }}</span>
        </li>
      </ul>
    </div>
  </div>

  <!-- Copyright -->
  <div class="border-t border-teal-600 mt-6">
    <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center text-sm">
      <p>&copy; {{ date('Y') .' '.get_option('nama')}}. All rights reserved.</p>
      <div class="flex space-x-4 mt-3 md:mt-0">
        <a href="{{ get_option('facebook') }}" class="hover:text-yellow-300">Facebook</a>
        <a href="{{ get_option('instagram') }}" class="hover:text-yellow-300">Instagram</a>
        <a href="{{ get_option('youtube') }}" class="hover:text-yellow-300">YouTube</a>
      </div>
    </div>
  </div>
</footer>


</body>
</html>
