{{ web_header() }}
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Content -->
    <article class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
      <div class="mb-6">
  
        <h1 class="text-3xl font-bold text-gray-800 mt-2">{{ $detail->title }}</h1>
        <p class="text-gray-500 text-sm mt-1">Diperbarui pada {{ $detail->updated_at->translatedFormat('d F Y') }} • oleh {{ $detail->user->name }}</p>
  

      <div class="mt-4 prose max-w-none text-gray-700 leading-relaxed">
        <div class="space-y-5">
    <!-- WhatsApp -->
    <div class="flex items-center space-x-3">
      <i class="fab fa-whatsapp text-green-600 text-2xl"></i>
      <a href="https://wa.me/{{get_option('whatsapp')}}" target="_blank" class="text-gray-700 hover:text-green-600">
        {{get_option('whatsapp')}}
      </a>
    </div>

    <!-- Email -->
    <div class="flex items-center space-x-3">
      <i class="fas fa-envelope text-blue-600 text-2xl"></i>
      <a href="mailto:{{get_option('email')}}" class="text-gray-700 hover:text-blue-600">
        {{get_option('email')}}
      </a>
    </div>

    <!-- Instagram -->
    <div class="flex items-center space-x-3">
      <i class="fab fa-instagram text-pink-500 text-2xl"></i>
      <a href="https://instagram.com/{{get_option('instagram')}}" target="_blank" class="text-gray-700 hover:text-pink-500">
        {{get_option('instagram')}}
      </a>
    </div>

    <!-- Facebook -->
    <div class="flex items-center space-x-3">
      <i class="fab fa-facebook text-blue-700 text-2xl"></i>
      <a href="{{get_option('facebook')}}" target="_blank" class="text-gray-700 hover:text-blue-700">
              {{get_option('facebook')}}

      </a>
    </div>

    <!-- Lokasi -->
    <div class="flex items-start space-x-3">
      <i class="fas fa-map-marker-alt text-red-600 text-2xl mt-1"></i>
      <p class="text-gray-700">
       {{get_option('alamat')}}
      </p>
    </div>

    <iframe src="{{ get_option('link_maps') }}" class="h-[400px] w-full rounded-xl" frameborder="0"></iframe>
  </div>
      </div>
    </article>

    <!-- Sidebar -->
   {{ get_element('sidebar') }}
  </div>
</main>
{{ web_footer() }}
