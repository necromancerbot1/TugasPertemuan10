@extends('layouts.app')

@section('title', 'Tulis Post Baru')

@section('content')

    <div class="mb-8">
        <span class="text-xs font-semibold tracking-widest uppercase text-white/30">Blog</span>
        <h1 class="text-3xl font-bold mt-1">Tulis Post Baru</h1>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-white/60 mb-2">Judul</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Judul post..."
                    class="w-full bg-white/5 border @error('title') border-red-500/50 @else border-white/10 @enderror rounded-lg px-4 py-3 text-white placeholder-white/20 focus:outline-none focus:border-white/30 transition"
                >
                @error('title')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Body --}}
            <div>
                <label for="body" class="block text-sm font-medium text-white/60 mb-2">Isi Post</label>
                <textarea
                    id="body"
                    name="body"
                    rows="8"
                    placeholder="Tulis konten post di sini..."
                    class="w-full bg-white/5 border @error('body') border-red-500/50 @else border-white/10 @enderror rounded-lg px-4 py-3 text-white placeholder-white/20 focus:outline-none focus:border-white/30 transition resize-none"
                >{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Bonus: Upload Gambar --}}
            <div>
                <label for="image" class="block text-sm font-medium text-white/60 mb-2">
                    Gambar <span class="text-white/20 font-normal">(opsional)</span>
                </label>
                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/*"
                    class="w-full bg-white/5 border @error('image') border-red-500/50 @else border-white/10 @enderror rounded-lg px-4 py-3 text-white/50 text-sm focus:outline-none focus:border-white/30 transition
                    file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-white/10 file:text-white/60 hover:file:bg-white/20"
                >
                @error('image')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="bg-white text-black px-6 py-2.5 rounded-lg text-sm font-semibold hover:bg-white/90 transition">
                    Simpan Post
                </button>
                <a href="{{ route('posts.index') }}" class="text-sm text-white/40 hover:text-white transition">
                    Batal
                </a>
            </div>

        </form>
    </div>

@endsection
