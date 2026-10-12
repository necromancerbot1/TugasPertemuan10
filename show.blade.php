@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="max-w-2xl">

        {{-- Back --}}
        <a href="{{ route('posts.index') }}" class="text-sm text-white/30 hover:text-white transition mb-6 inline-block">
            ← Kembali
        </a>

        {{-- Gambar --}}
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                class="w-full h-64 object-cover rounded-xl border border-white/10 mb-8">
        @endif

        {{-- Meta --}}
        <div class="mb-3">
            <span class="text-xs font-semibold tracking-widest uppercase text-white/30">
                {{ $post->created_at->format('d M Y') }}
            </span>
        </div>

        {{-- Title --}}
        <h1 class="text-4xl font-bold mb-6 leading-tight">{{ $post->title }}</h1>

        {{-- Body --}}
        <div class="text-white/60 leading-relaxed whitespace-pre-line text-[15px]">
            {{ $post->body }}
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-4 mt-12 pt-8 border-t border-white/10">
            <a href="{{ route('posts.edit', $post->id) }}"
               class="border border-white/20 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-white/5 transition">
                Edit Post
            </a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="border border-red-500/30 text-red-400 px-5 py-2 rounded-lg text-sm font-medium hover:bg-red-500/10 transition">
                    Hapus Post
                </button>
            </form>
        </div>

    </div>

@endsection
