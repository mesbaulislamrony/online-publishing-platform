@extends('layouts.app')

@section('content')
    @if(!empty($articles))
        @foreach($articles as $article)
            <div class="card mb-3">
                <div class="card-header">
                    <p class="mb-0">{{ $article->title }}</p>
                    <p class="text-muted mb-0 text-sm">
                        <small>Published Date : {{ $article->updated_at }}</small>
                    </p>
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ $article->description }}</p>
                </div>
            </div>
        @endforeach
    @endif
@endsection
