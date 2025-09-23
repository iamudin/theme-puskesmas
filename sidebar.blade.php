 <aside class="space-y-6 sticky top-[110px] self-start">

      <!-- Banner Info -->
      <div class="bg-gradient-to-r from-teal-500 to-green-400 rounded-xl shadow p-6 text-white text-center">
        <h3 class="text-xl font-bold mb-2">Informasi Penting</h3>
        <p class="text-sm mb-4">{{ get_option('nama') }} siap melayani Anda setiap hari kerja mulai pukul 08.00 - 16.00.</p>
        <a href="/kontak" class="bg-white text-teal-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 inline-block">
          Hubungi Kami
        </a>
      </div>
      @if($banner = get_banner('sidebar-banner'))
      <div class="my-2">
        <a href="{{ $banner->link ?? '#' }}" >
        <img src="{{ get_banner('sidebar-banner')->image }}" class="w-full rounded-lg shadow-md">
        </a>
      </div>
      @endif
 <div class="bg-white p-4 rounded-lg shadow">
    <h2 class="text-lg font-semibold text-green-800 mb-4 border-b pb-2"> <i class="fa fa-rss"></i> Berita Terakhir</h2>
    <ul class="space-y-4 text-sm text-gray-700">
      @foreach(query()->index_recent('berita',5) as $row)
      <li class="flex gap-3">
        <img src="{{ $row->thumbnail }}" class="w-20 h-16 object-cover rounded shadow" alt="thumb">
        <div>
          <a href="{{ $row->link }}" class="font-semibold hover:text-green-700 block">{{ $row->title }}</a>
          <span class="text-xs text-gray-500"> <i class="fa-solid fa-clock-rotate-left"></i> {{ $row->created_at->translatedFormat('d F Y') }}</span>
        </div>
      </li>
      @endforeach
     
    </ul>
  </div>

<div class="bg-white rounded-2xl shadow p-4">
  <h2 class="text-lg font-semibold mb-4 text-gray-700"> <i class="fa fa-list"></i> Kategori</h2>
  <ul class="space-y-2">

@foreach(query()->index_category('berita') as $row)
    <li>
      <a href="{{ $row->link }}"
         class="flex items-center justify-between px-3 py-2 rounded-xl transition duration-300 ease-in-out 
                hover:bg-blue-50 hover:shadow-sm group">
        <div class="flex items-center gap-2">
          <div class="w-2 h-2 rounded-full bg-green-500 group-hover:scale-125 transition"></div>
          <span class="text-gray-700 group-hover:text-blue-600 font-medium">{{ $row->name }}</span>
        </div>
        <span class="text-sm text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full group-hover:bg-blue-100 group-hover:text-blue-600">
          {{ $row->posts_count }}
        </span>
      </a>
    </li>
@endforeach
  </ul>
</div>


    </aside>