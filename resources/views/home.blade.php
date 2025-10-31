@extends('layouts.app')

@section('title', 'DocExtract AI - Extract Data from Documents')
@section('description', 'AI-powered document extraction service. Extract data from any document format with ease.')

@section('content')
<main class="min-h-screen bg-background">
    @include('components.header')
    @include('components.hero')
    @include('components.features')
    @include('components.supported-formats')
    @include('components.payment-methods')
    @include('components.pricing')
    @include('components.footer')
</main>
@endsection
