<article class="border border-white/10 rounded-xl overflow-hidden bg-white/[0.03] hover:bg-white/[0.06] transition group">
    @if($image)
        <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    @endif
    <div class="p-5">
        <p class="text-xs text-white/30 mb-2">{{ $date }}</p>
        <h2 class="font-semibold text-white/90 mb-2 group-hover:text-white transition line-clamp-2">{{ $title }}</h2>
        <p class="text-sm text-white/50 mb-4 line-clamp-3">{{ $excerpt }}</p>
        <div class="flex items-center justify-between">
            <a href="{{ route('posts.show', $id) }}" class="text-xs text-white/40 hover:text-white transition">
                Baca selengkapnya →
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('posts.edit', $id) }}" class="text-xs text-white/30 hover:text-white transition">Edit</a>
                <form action="{{ route('posts.destroy', $id) }}" method="POST"
                      onsubmit="return confirm('Hapus post ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-xs text-red-500/50 hover:text-red-400 transition">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</article>
