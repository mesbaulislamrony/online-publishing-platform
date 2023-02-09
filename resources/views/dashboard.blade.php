@extends('layouts.app')

@section('content')
    @if(!empty($articles))
        @foreach($articles as $article)
            <div class="card mb-3">
                <div class="card-header">
                    <p class="mb-0">{{ $article->title }}</p>
                    <p class="mb-0">Published at : {{ $article->updated_at }}</p>
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ $article->description }}</p>
                </div>
            </div>
        @endforeach
    @endif
@endsection
