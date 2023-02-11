@extends('layouts.app')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h4>{{ __('Create an article') }}</h4>
</div>
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
    @if(auth()->user()->subscribed('default'))
        @if(auth()->user()->subscription()->stripe_price == env('PREMIUM_PLAN_STRIP_ID'))
        <div class="mb-3">
            <label for="published_at" class="form-label">{{ __('Schedule datetime') }}</label>
            <input type="datetime-local" class="form-control" id="published_at" value="{{ $published_at }}" name="published_at">
        </div>
        @endif
    @endif
    <button type="submit" class="btn btn-success">Published</button>
    <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
</form>
@endsection
