@extends('_template.master-public-news')

@section('page_title', 'Home')

@section('title', 'Home')

@section('content')
    <!-- block post area start-->
    <section class="block-wrapper m-0 p-0 section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ts-overlay-style featured-post owl-carousel" id="featured-slider-5">
                        @foreach ($banner as $bann)
                        <div class="item" style="background-image:url({{$bann->image}})">
                        </div>
                        <!-- item end-->
                        @endforeach
                        
                        {{-- <div class="item" style="background-image:url({{ asset('/src/img/featured/3.jpg') }})">
                        </div>
                        <!-- item end-->
                        <div class="item" style="background-image:url({{ asset('/src/img/featured/4.jpg') }})">
                        </div>
                        <!-- item end-->
                        <div class="item" style="background-image:url({{ asset('/src/img/featured/6.jpg') }})"> --}}
                            {{-- 
                            <div class="overlay-post-content">
                            <div class="post-content">
                                <a class="post-cat ts-orange-bg" href="#">Travel</a>

                                <h2 class="post-title lg">
                                <a href="#">Blueberry Muffin Cool Smoothie Bowl</a>
                                </h2>
                                <ul class="post-meta-info">
                                <li class="author">
                                    <a href="#">
                                    Donald Ramos
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                    March 21, 2019
                                </li>
                                <li class="active">
                                    <i class="icon-fire"></i>
                                    3,005
                                </li>
                                </ul>
                            </div>
                            </div> --}}
                            <!--/ Featured post end -->
                        </div>
                        <!-- item end-->

                    </div>
                    <!-- ts overlay style end-->
                </div>
            </div>
        </div>
    </section>
    <!-- block area end-->


    <!-- post wraper start-->
    <section class="block-wrapper mt-3 mb-3">
        <div class="container">

            <div class="row">

                <div class="col-lg-9">

                    <!-- ads -->
                    @if ($ad_top->active == 1)
                        <div class="d-flex flex-column align-items-center">
                            <div class="banner-ad border rounded shadow p-2 mb-3">
                                <a href="{{ $ad_top->url ?? '#' }}" target="_blank">
                                    <img src="{{ $ad_top->image ?? 'https://fakeimg.pl/1000x120' }}" class="img-fluid rounded" alt="Iklan Atas">
                                </a>
                            </div>
                        </div>
                    @endif
                    <!-- ads end -->
                    
                    <div class="ts-grid-box most-populer-item">
                        <h2 class="ts-title">Paling Populer</h2>

                        <div class="most-populers owl-carousel">
                            @if ($popular)
                                @foreach ($popular as $pop)
                                    <div class="item">
                                        <a class="post-cat ts-{{ $colors[$pop->topic] }}-bg" href="{{ route('topic', ['topic' => $pop->topic]) }}">{{ $pop->topic }}</a>
                                        <div class="ts-post-thumb">
                                            <a href="{{ route('post', ['url' => $pop->url]) }}">
                                                <img class="img-fluid image-popular" src="{{ $pop->thumbnail }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h3 class="post-title">
                                                <a href="{{ route('post', ['url' => $pop->url]) }}">{{ $pop->title }}</a>
                                            </h3>
                                            <span class="post-date-info">
                                                <i class="fa fa-clock-o"></i>
                                                {{ Carbon\Carbon::parse($pop->created_at)->isoFormat('D MMMM Y'); }}
                                            </span>
                                        </div>
                                    </div>
                                    <!-- ts-grid-box end-->
                                @endforeach
                            @endif
                        </div>
                        <!-- most-populers end-->
                    </div>
                    <!-- ts-populer-post-box end-->
                    
                    <div class="ts-grid-box clearfix ts-category-title">
                        <h2 class="ts-title float-left">Konten Terbaru</h2>
                    </div>
                    <div class="row post-col-list-item">
                        @if ($latest)
                            @foreach ($latest as $late)
                                <div class="col-lg-6 mb-30">
                                    <div class="ts-grid-box ts-grid-content">
                                        <a class="post-cat ts-{{ $colors[$late->topic] }}-bg" href="{{ route('topic', ['topic' => $late->topic]) }}">{{ $late->topic }}</a>
                                        <div class="ts-post-thumb">
                                            <a href="{{ route('post', ['url' => $late->url]) }}">
                                                <img class="img-fluid image-thumb" src="{{ $late->thumbnail }}" height="200px"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h3 class="post-title md">
                                                <a href="{{ route('post', ['url' => $late->url]) }}">{{ $late->title }}</a>
                                            </h3>
                                            <ul class="post-meta-info">
                                                <li class="author-name">
                                                    <a href="#">
                                                        Admin
                                                    </a>
                                                </li>
                                                <li>
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ Carbon\Carbon::parse($late->created_at)->isoFormat('D MMMM Y'); }}
                                                </li>
                                            </ul>
                                            <p>{{ Str::limit(strip_tags(str_replace('&nbsp;', ' ', $late->desc)), 145, '...') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- ads -->
                    @if ($ad_bot->active == 1)
                        <div class="d-flex flex-column align-items-center">
                            <div class="banner-ad border rounded shadow p-2 mb-3">
                                <a href="{{ $ad_bot->url ?? '#' }}" target="_blank">
                                    <img src="{{ $ad_bot->image ?? 'https://fakeimg.pl/1000x120' }}" class="img-fluid rounded" alt="Iklan Bawah">
                                </a>
                            </div>
                        </div>
                    @endif
                    <!-- ads end -->
                </div>
                <div class="col-lg-3">
                    @include('_template.master-sidebar')
                </div>
            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->

@endsection