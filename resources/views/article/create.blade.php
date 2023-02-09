@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">Create an article</div>
        <div class="card-body">
            <form action="{{ route('article.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Type your title here">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Write your description here..."></textarea>
                </div>
                @if(auth()->user()->subscription_as == 'premium')
                <div class="mb-3">
                    <label for="published_at" class="form-label">{{ __('Schedule datetime') }}</label>
                    <input type="datetime-local" class="form-control" id="published_at" value="{{ $published_at }}" name="published_at">
                </div>
                @endif
                <button type="submit" class="btn btn-success">Published</button>
                <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
@endsection
