<?php
@extends('layouts.client')

@section('title', $page->title)

@section('content')
    <div>
        {!! $page->content !!}
    </div>
@endsection

@push('scripts')
    <script>

    </script>
@endpush
