@extends('frontend.template.template')

@section('ftitle', 'Blog')

@section('meta_tag')
    <meta name="description" content="Blog">
    <meta name="keywords" content="Blog">
    <meta property="type" content="post">
    <meta property="title" content="Blog" />
    <meta property="image" content="frontend/img/default-feature-image.jpg"/>
    <meta property="url" content="{{ url()->current() }}"/>

    <meta name="og:description" content="Blog">
    <meta name="og:keywords" content="Blog">
    <meta property="og:type" content="post">
    <meta property="og:title" content="Blog" />
    <meta property="og:image" content="frontend/img/default-feature-image.jpg"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
@endsection

@section('header')
    @include('frontend.includes.header_two')
@endsection

@section('content')
    <section class="page-title" style="background-image: url('frontend/img/default-background.jpg');">
        <div class="auto-container">
            <div class="title-outer">
                <h1 class="title">Page</h1>
            </div>
        </div>
    </section>

    <section class="news-section">
        <div class="auto-container">
            <div class="row">

            </div>
        </div>
    </section>
@endsection
