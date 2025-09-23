<!DOCTYPE html>
<html lang="id">
<head>
  
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="text-gray-900 relative" 
  style="
    background-image: url('https://bengkaliskab.go.id/media/gbr11.webp');
    background-repeat: repeat;
    background-size: 70px 70px;
">
  <div style="
    position: absolute;
    inset: 0;
    background: rgba(255, 255, 255, 0.8); 
    pointer-events: none; 
    z-index: -1; 
  "></div>

  <!-- Header -->
  <header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-20">

        <!-- Logo -->
         <a href="/" class="flex items-center space-x-2" title="Halaman Utama">
      <!-- Logo -->
      <img src="{{ get_option('logo') }}" alt="Logo Puskesmas" class="w-12 h-12 object-contain">

      <!-- Brand Name -->
       <div class="leading-snug">
        <h1 class="text-xl my-0 font-bold text-gray-800 leading-tight">{{ logo_upt(get_option('nama'))[0] }}</h1>
        <h2 class="text-lg font-semibold text-green-700">{{ logo_upt(get_option('nama'))[1] }}</h2>
      </div>
    </a>

        <!-- Desktop Menu -->
      <nav class="hidden md:flex space-x-6 items-center relative">
  <a href="/" class="text-gray-600 hover:text-teal-700">Beranda</a>

  <!-- Layanan dengan submenu -->
  @foreach(get_menu('header') as $row)
  @if($row->sub)
  <div class="relative">
    <button class="submenu-toggle text-gray-600 hover:text-teal-700 flex items-center space-x-1 focus:outline-none">
      <span>{{ $row->name }}</span>
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </button>
    <div class="submenu hidden absolute left-0 mt-2 w-40 bg-white rounded-lg shadow-lg">
      @foreach($row->sub as $row2)
      <a href="{{ $row2->url }}" class="block px-4 py-2 text-gray-600 hover:bg-teal-50">{{ $row2->name }}</a>
      @endforeach
     
    </div>
  </div>
  @else
  <a href="{{$row->url}}" class="text-gray-600 hover:text-teal-700">{{ $row->name }}</a>

  @endif
  @endforeach



  <!-- Search Icon -->
  <button id="search-button" class="text-gray-600 hover:text-teal-700 focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
    </svg>
  </button>
</nav>

<script>
  const submenuButtons = document.querySelectorAll(".submenu-toggle");

  submenuButtons.forEach(btn => {
    btn.addEventListener("click", (e) => {
      e.stopPropagation(); 
      const submenu = btn.parentElement.querySelector(".submenu");

      document.querySelectorAll(".submenu").forEach(menu => {
        if (menu !== submenu) menu.classList.add("hidden");
      });

      submenu.classList.toggle("hidden");
    });
  });

  document.addEventListener("click", () => {
    document.querySelectorAll(".submenu").forEach(menu => {
      menu.classList.add("hidden");
    });
  });
</script>


        <div class="flex md:hidden items-center space-x-3">
          <!-- Search (mobile) -->
          <button id="search-button-mobile" class="text-gray-600 hover:text-teal-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
          </button>
          <button id="mobile-menu-button" class="text-gray-600 hover:text-teal-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
  <nav class="px-4 pt-4 pb-6 space-y-2">
    <a href="/" class="block text-gray-600 hover:text-teal-700">Beranda</a>
 @foreach(get_menu('header') as $row)
  @if($row->sub)
    <!-- Layanan dengan submenu -->
    <div class="mobile-submenu">
      <button class="submenu-toggle-mobile flex justify-between w-full text-gray-600 hover:text-teal-700 focus:outline-none py-2">
        <span>{{ $row->name }}</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
      <div class="submenu hidden pl-4 space-y-2">
      @foreach($row->sub as $row2)

        <a href="{{ $row2->url }}" class="block text-gray-600 hover:text-teal-700">{{ $row2->name }}</a>
      @endforeach
      </div>
    </div>
@else


    <a href="{{ $row->url }}" class="block text-gray-600 hover:text-teal-700">{{ $row->name }}</a>
    @endif
    @endforeach
  </nav>
</div>

<script>
  const mobileSubmenuBtns = document.querySelectorAll(".submenu-toggle-mobile");

  mobileSubmenuBtns.forEach(btn => {
    btn.addEventListener("click", (e) => {
      e.stopPropagation(); 
      const submenu = btn.parentElement.querySelector(".submenu");

      document.querySelectorAll("#mobile-menu .submenu").forEach(menu => {
        if (menu !== submenu) menu.classList.add("hidden");
      });

      submenu.classList.toggle("hidden");
    });
  });

  document.addEventListener("click", (e) => {
    if (!e.target.closest("#mobile-menu")) {
      document.querySelectorAll("#mobile-menu .submenu").forEach(menu => {
        menu.classList.add("hidden");
      });
    }
  });
</script>

  </header>
<!-- Search Bar (hidden initially) -->
  <div id="search-bar" class="fixed top-0 left-0 w-full bg-white shadow-lg transform -translate-y-full transition-transform duration-500 ease-in-out z-50">
    <form action="/search" method="post" class="max-w-4xl mx-auto px-4 py-4 flex items-center space-x-3">
        @csrf
      <input type="text" name="keyword" placeholder="Cari layanan atau informasi..." 
             class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
      <button id="close-search" type="button" class="text-gray-600 hover:text-red-600 focus:outline-none">
        <!-- Heroicon: X -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

    </form>
  </div>

  <script>
    const menuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");

    menuButton.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });

    const searchBar = document.getElementById("search-bar");
    const searchButton = document.getElementById("search-button");
    const searchButtonMobile = document.getElementById("search-button-mobile");
    const closeSearch = document.getElementById("close-search");

    function toggleSearch() {
      if (searchBar.classList.contains("-translate-y-full")) {
        searchBar.classList.remove("-translate-y-full");
        searchBar.classList.add("translate-y-0");
      } else {
        searchBar.classList.add("-translate-y-full");
        searchBar.classList.remove("translate-y-0");
      }
    }

    searchButton.addEventListener("click", toggleSearch);
    searchButtonMobile.addEventListener("click", toggleSearch);
    closeSearch.addEventListener("click", toggleSearch);
  </script>