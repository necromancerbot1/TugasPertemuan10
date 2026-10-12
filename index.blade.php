@extends('layouts.app')

@section('title', 'Semua Post')

@section('content')

    <div class="mb-8 flex items-end justify-between">
        <div>
            <span class="text-xs font-semibold tracking-widest uppercase text-white/30">Blog</span>
            <h1 class="text-3xl font-bold mt-1">Semua Post</h1>
        </div>
        <span class="text-sm text-white/30">{{ $posts->total() }} post ditemukan</span>
    </div>

    @if(isset($query) && $query)
        <div class="mb-6 text-sm text-white/40">
            Hasil pencarian untuk: <span class="text-white/70 font-medium">"{{ $query }}"</span>
            <a href="{{ route('posts.index') }}" class="ml-3 text-white/30 hover:text-white transition">× Reset</a>
        </div>
    @endif

    @if($posts->isEmpty())
        <div class="text-center py-24 border border-white/10 rounded-xl bg-white/[0.02]">
            <p class="text-white/30 text-lg mb-4">Belum ada post.</p>
            <a href="{{ route('posts.create') }}" class="bg-white text-black px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-white/90 transition">
                Tulis Post Pertama
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach($posts as $post)
                <x-card
                    :id="$post->id"
                    :title="$post->title"
                    :excerpt="$post->body"
                    :image="$post->image"
                    :date="$post->created_at->format('d M Y')"
                />
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @endif

@endsection
