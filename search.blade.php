                                                    <main class="max-w-7xl mx-auto px-4 py-8" style="min-height:60vh">
    <form action="/search" method="post"
        class="mb-10 flex items-center w-full max-w-md mx-auto bg-white/70 backdrop-blur-sm rounded-full shadow-lg overflow-hidden">
        @csrf
        <span class="px-4 text-gray-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
            </svg>
        </span>
        <input type="text" name="keyword" placeholder="Cari informasi..."
            class="w-full bg-transparent text-black text-base md:text-lg px-2 py-3 outline-none placeholder-gray-600">
        <button
            class="bg-yellow-400 text-black px-4 md:px-5 py-3 text-base md:text-lg font-medium hover:bg-yellow-500 transition rounded-none">
            Cari
        </button>
    </form>

    <h1 class="text-xl md:text-2xl font-bold text-gray-400 mb-6">
        <i class="fa fa-search"></i>
        Hasil Pencarian untuk: <span class="text-green-600">"{{ $keyword }}"</span> total {{$index->total()}} hasil
    </h1>

    @if (count($index) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($index as $item)
                <article
                    class="rounded-xl w-full border border-slate-200 bg-white p-4 hover:shadow-sm transition">
                    <div class="flex flex-col sm:flex-row gap-4">
                        @if (!empty($item->media))
                            <img src="{{ $item->thumbnail }}"
                                class="w-full sm:w-24 h-40 sm:h-24 object-cover rounded-lg border">
                        @else
                            <div
                                class="w-full sm:w-24 h-40 sm:h-24 grid place-items-center rounded-lg border bg-slate-100 text-slate-500">
                                <i class="fa fa-file"></i>
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
							
                             <div class="text-xs text-slate-500 mb-1 flex items-center justify-between">
                            <span>{{ get_module($item->type)->title }}</span>
                            <span class="text-gray-400">{{ $item->created_at->format('d M Y') }}</span>
                        </div>
                            <h3 class="text-base md:text-lg font-semibold mb-1 truncate">
                                <a href="{{ $item->link ?? '#' }}" class="hover:text-blue-600">{{ $item->title }}</a>
                            </h3>
                            <p class="text-sm text-slate-600 line-clamp-2">
                                {{ $item->short_content }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div
            class="rounded-xl border border-dashed border-slate-300 p-8 text-center text-slate-500">
            Tidak ada hasil ditemukan.
        </div>
    @endif

    <div class="mt-4">
        {{ $index->links('pagination::tailwind') }}
    </div>
</main>
                                                    