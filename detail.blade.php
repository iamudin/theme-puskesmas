<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Content -->
    <article class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
      <div class="mb-6">
        @if($detail->category)<span class="text-sm text-teal-600 font-semibold"> <i class="fa fa-tag"></i> {{ $detail->category->name }} </span>@endif
        <h1 class="text-3xl font-bold text-gray-800 mt-2">{{ $detail->title }}</h1>
        <p class="text-gray-500 text-sm mt-1">Dipublikasikan pada {{ $detail->created_at->translatedFormat('d F Y') }} • oleh {{ $detail->user->name }}</p>
      </div>
@if($detail->media && media_exists($detail->media))
      <img src="{{ $detail->thumbnail }}" class="rounded-xl mb-6 w-full object-cover ">
@endif
      <div class="prose max-w-none text-gray-700 leading-relaxed">
       {!! $detail->content !!}
      </div>
    </article>

    <!-- Sidebar -->
   {{ get_element('sidebar') }}
  </div>
</main>