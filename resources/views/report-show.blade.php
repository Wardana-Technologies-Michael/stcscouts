@extends('layouts.master')

@section('title', $report->title . " – 16th Colombo Scout Group")

@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-white font-weight-bold text-8">{{ $report->title }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <div class="row">
            <div class="col">
                <div class="blog-posts single-post">
                    <article class="post post-large blog-single-post border-0 m-0 p-0">
                        <div class="post-content ms-0">
                            {!! $report->body !!}
                        </div>
                        <br>
                    </article>

                    <div class="text-center my-4">
                        <a href="{{ url('/recent-year-reports') }}" class="read-more-link">
                            ← Back to all Year Reports
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
