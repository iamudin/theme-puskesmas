
<section class="relative w-full">
  <!-- Container full width dengan rounded di mobile saja -->
  <div class="relative overflow-hidden md:rounded-none shadow-lg">
    <!-- Wrapper slides -->
    <div id="hero-slider" class="flex transition-transform duration-700 ease-in-out">
      @foreach(get_banner('hero-slider',5) as $row)
      <div class="min-w-full aspect-[16/6] flex items-center justify-center bg-cover bg-center"
           style="background-image: url('{{ $row->image }}');">
      
      </div>
      @endforeach
    </div>

    <!-- Tombol Navigasi -->
    <button id="prev" class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white-500 p-2 rounded-full shadow">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>

    <button id="next" class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white-200 p-2 rounded-full shadow">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>

    <!-- Indikator Bulat -->
 
  </div>
</section>

<script>
  const slider = document.getElementById("hero-slider");
  const slides = slider.children.length;
  const dots = document.querySelectorAll(".dot");
  let index = 0;

  function updateSliders() {
    slider.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach((dot, i) => {
      dot.classList.toggle("bg-white", i === index);
      dot.classList.toggle("bg-white/50", i !== index);
    });
  }

  document.getElementById("next").addEventListener("click", () => {
    index = (index + 1) % slides;
    updateSliders();
  });

  document.getElementById("prev").addEventListener("click", () => {
    index = (index - 1 + slides) % slides;
    updateSliders();
  });

  dots.forEach((dot, i) => {
    dot.addEventListener("click", () => {
      index = i;
      updateSliders();
    });
  });

  setInterval(() => {
    index = (index + 1) % slides;
    updateSliders();
  }, 5000);
</script>
<section class="max-w-7xl mx-auto px-4 py-7 grid md:grid-cols-2 gap-8">
  <!-- Sambutan Pimpinan -->
  <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6">
    @php 
    $sambutan = query()->detail('sambutan');
    @endphp
    <div class="flex items-center space-x-4 mb-6">
      <img src="{{ $sambutan?->thumbnail ?? 'https://picsum.photos/120/120' }}" alt="Pimpinan Puskesmas"
           class="w-24 h-24 rounded-full shadow-md object-cover">
      <div>
        <h2 class="text-xl md:text-2xl font-bold text-gray-800">{{ $sambutan?->field?->nama ?? 'Nama Pejabat' }}</h2>
        <p class="text-gray-500 text-sm">{{ $sambutan?->field?->jabatan ?? 'Jabatan' }}</p>
      </div>
    </div>
    <p class="text-gray-600 leading-relaxed">
     {!!  $sambutan?->content ?? 'Isi Sambutan' !!}
    </p>
  </div>

  <!-- Jadwal Pelayanan -->
<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6">
  <h2 class="text-xl font-bold flex items-center mb-4">
    <span class="mr-2">💛</span> Jadwal Pelayanan
  </h2>

  <!-- Loket Pendaftaran -->
  <div class="mb-4">
    <h3 class="font-semibold text-gray-600">Loket Pendaftaran</h3>
    <div class="flex justify-between">
      <span>Senin - Kamis :</span>
      <span>{{ get_option('pendaftaran_senin_kamis') }}</span>
    </div>
    <div class="flex justify-between">
      <span>Jumat :</span>
      <span>{{ get_option('pendaftaran_jumat') }}</span>
    </div>
    <div class="flex justify-between">
      <span>Sabtu :</span>
      <span>{{ get_option('pendaftaran_sabtu') }}</span>
    </div>
  </div>

  <!-- Rawat Jalan -->
  <div class="mb-4">
    <h3 class="font-semibold text-gray-600">Rawat Jalan</h3>
    <div class="flex justify-between">
      <span>Senin - Kamis :</span>
      <span>{{ get_option('rawat_jalan_senin_kamis') }}</span>
    </div>
    <div class="flex justify-between">
      <span>Jumat :</span>
      <span>{{ get_option('rawat_jalan_jumat') }}</span>
    </div>
    <div class="flex justify-between">
      <span>Sabtu :</span>
      <span>{{ get_option('rawat_jalan_sabtu') }}</span>
    </div>
  </div>

  <!-- Rawat Inap -->
  <div>
    <h3 class="font-semibold text-gray-600">Rawat Inap</h3>
    <div class="flex justify-between">
      <span>Senin - Minggu :</span>
      <span>{{ get_option('rawat_inap') }}</span>
    </div>
  </div>

  </div>
</section>
<section class="max-w-7xl mx-auto px-4 py-12 grid md:grid-cols-3 gap-8">
  <!-- === Kolom 1: Berita === -->
  <div>
    <h2 class="text-xl font-bold text-gray-800 mb-4"> <i class="fa fa-newspaper"></i> Berita Terbaru</h2>
    <!-- Berita Utama -->
    @foreach(query()->index_limit('berita',5) as $row)
    @if($loop->first)
     <a href="">
    <div class="relative rounded-xl overflow-hidden shadow-md mb-4">
      <img src="{{ $row->thumbnail }}" alt="Berita Utama" class="w-full h-48 object-cover">
      <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent flex flex-col justify-end p-4">
        <p class="text-xs text-gray-200">{{ $row->created_at->translatedFormat('d F Y') }}</p>
        <h3 class="text-lg font-bold text-white">{{ $row->title }}</h3>
      </div>
    </div>
    </a>
    <!-- List Berita Lainnya -->
    <ul class="space-y-4">
      @else
      <li class="flex items-center space-x-3">
        <img src="{{ $row->thumbnail }}" class="w-24 h-16 object-cover rounded-md shadow">
        <div>
          <p class="text-xs text-gray-500">{{ $row->created_at->translatedFormat('d F Y') }}</p>
          <a href="#" class="font-medium text-gray-800 hover:text-teal-600">{{ $row->title }}</a>
        </div>
      </li>
     @endif
     @endforeach
    </ul>
  </div>

  <!-- === Kolom 2: Jenis Layanan === -->
  <div>
    <h2 class="text-xl font-bold text-gray-800 mb-4">Jenis Layanan</h2>
    @php
$colors = [
    'bg-teal-50 hover:bg-teal-100',
    'bg-blue-50 hover:bg-blue-100',
    'bg-pink-50 hover:bg-pink-100',
    'bg-green-50 hover:bg-green-100'
];
@endphp
    <div class="grid gap-4">
      @foreach(query()->index_limit('layanan',5) as $key=>$row)
      <a href="">
       <div class="p-4 rounded-xl shadow {{ $colors[$key % count($colors)] }} transition-colors cursor-pointer">
        <h3 class="font-semibold text-teal-700">{{ $row->title }}</h3>
        <p class="text-sm text-gray-600">{{ $row->description }}</p>
      </div></a>

      @endforeach
     
    </div>
  </div>

  <!-- === Kolom 3: FAQ === -->
  <div>
    <h2 class="text-xl font-bold text-gray-800 mb-4">FAQ</h2>
    <div class="space-y-3">
      <!-- Item 1 -->
      @foreach(query()->published()->onType('faq')->get() as $row)
      <div class="border rounded-lg overflow-hidden bg-white">
        <button class="faq-toggle w-full flex justify-between items-center px-4 py-3 text-left text-gray-700 font-medium hover:bg-gray-50">
          {{ $row->title }}
          <span class="transform transition-transform">+</span>
        </button>
        <div class="faq-content max-h-0 overflow-hidden px-4 text-sm text-gray-600 transition-all duration-300">
            <div class="pb-3"> {!! $row->content !!}</div>
        </div>
      </div>
      @endforeach
   
    </div>
  </div>
</section>

<script>
  document.querySelectorAll(".faq-toggle").forEach(button => {
    button.addEventListener("click", () => {
      const content = button.nextElementSibling;
      const symbol = button.querySelector("span");

      if (content.style.maxHeight) {
        content.style.maxHeight = null;
        symbol.textContent = "+";
      } else {
        document.querySelectorAll(".faq-content").forEach(c => c.style.maxHeight = null);
        document.querySelectorAll(".faq-toggle span").forEach(s => s.textContent = "+");
        content.style.maxHeight = content.scrollHeight + "px";
        symbol.textContent = "−";
      }
    });
  });
</script>
<section class="max-w-7xl mx-auto mb-10 flex flex-col justify-center items-center bg-gray-50 px-4">
  <h2 class="text-2xl font-bold text-gray-800 mb-6">Kepegawaian</h2>

  <div class="relative w-full max-w-7xl overflow-hidden">
    <!-- Container Slider -->
    <div id="medis-slider" class="flex transition-transform duration-500 ease-in-out">
      <!-- Card akan digenerate oleh foreach -->
    </div>

    <!-- Navigasi -->
    <button id="prevMedis"
      class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white shadow-md rounded-full p-2 hover:bg-teal-500 hover:text-white transition">
      &#10094;
    </button>
    <button id="nextMedis"
      class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white shadow-md rounded-full p-2 hover:bg-teal-500 hover:text-white transition">
      &#10095;
    </button>
  </div>
</section>
@php 
 $pegawai = query()->onType('kepegawaian')->select('title', 'url','media','description', 'data_field')->get()->map(function ($item) {
            return [
                'nama'      => $item->title,
                'jabatan'   => $item->field?->jabatan ?? null,
                'deskripsi' => $item->description ?? null,
                'foto'      => $item->thumbnail ?? null,
                'link'      => $item->link ?? null,
            ];
        });
@endphp
<script>
  const tenagaMedis = @json($pegawai);
console.log(tenagaMedis);
  const medisSlider = document.getElementById("medis-slider");

  tenagaMedis.forEach(medis => {
    const card = document.createElement("div");
    card.className = "w-full sm:w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-2";
    card.innerHTML = `<a href="${medis.link}">
      <div class="relative h-[450px] rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition">
        <img src="${medis.foto}" alt="${medis.nama}"
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/100 via-black/10 to-transparent"></div>
        <div class="absolute bottom-0 p-6 text-white">
          <h3 class="text-lg font-semibold">${medis.nama}</h3>
          <p class="text-teal-300 text-sm mb-1">${medis.jabatan}</p>
          <p class="text-sm text-gray-200">${medis.deskripsi}</p>
        </div>
      </div>
      </a>
    `;
    medisSlider.appendChild(card);
  });

  let indexs = 0;
  const totalItems = tenagaMedis.length;

  function getItemsPerSlide() {
    if (window.innerWidth >= 1024) return 3; 
    if (window.innerWidth >= 768) return 2;  
    return 1; 
  }

  function updateSlider() {
    const itemsPerSlide = getItemsPerSlide();
    const slideWidth = medisSlider.querySelector("div").offsetWidth;
    medisSlider.style.transform = `translateX(-${indexs * slideWidth}px)`;
  }

  document.getElementById("nextMedis").addEventListener("click", () => {
    const itemsPerSlide = getItemsPerSlide();
    if (indexs < totalItems - itemsPerSlide) {
      indexs++;
      updateSlider();
    }
  });

  document.getElementById("prevMedis").addEventListener("click", () => {
    if (indexs > 0) {
      indexs--;
      updateSlider();
    }
  });

  window.addEventListener("resize", updateSlider);
</script>

