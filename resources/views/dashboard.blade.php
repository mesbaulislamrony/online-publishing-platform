@extends('layouts.app')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4>{{ __('Your articles') }}</h4>
    <a href="{{ route('article.create') }}" class="btn btn-warning">{{ __('Create article') }}</a>
</div>
@if(!empty($articles))
    @foreach($articles as $article)
        <div class="mb-4">
            <div class="">
                <p style="margin: 0"><a href="" class="">{{ $article->title }}</a></p>
                <p style="margin: 0"><small>Published Date : {{ $article->updated_at }}</small></p>
            </div>
            <div class="mt-2 text-sm">{{ $article->description }}</div>
        </div>
    @endforeach
@endif
@endsection
