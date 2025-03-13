@extends('_template.master-public-news')

@section('page_title', $content->title)

@section('title', $content->title)

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper mt-3 mb-3">
        <div class="container">
           
            <div class="row">
                <div class="col-lg-9">
                    <ol class="breadcrumb">
						<li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('topic', ['topic' => $content->topic]) }}">{{ $content->topic }}</a>
                        </li>
						<li>{{ Str::limit($content->title, 30, '...') }}</li>
					</ol>
					<!-- breadcump end-->
					
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

					<div class="ts-grid-box content-wrapper single-post">
						<div class="entry-header">
							<div class="category-name-list d-flex justify-content-between align-items-center">
								<span>
									<a href="{{ route('topic', ['topic' => $content->topic]) }}" class="post-cat ts-{{ $colors[$content->topic] }}-bg">{{ $content->topic }}</a>
								</span>
								<span>
									<!-- Social Share Button -->
									<script src="https://cdn.commoninja.com/sdk/latest/commonninja.js" defer></script>
									<div class="commonninja_component pid-c73d4cdb-a270-4d5c-968b-9426517dbc86"></div>
									<!-- Social Share Button end -->
								</span>
							</div>
							<h2 class="post-title lg">{{ $content->title }}</h2>
							<ul class="post-meta-info">
								<li>
									Admin
								</li>
								<li>
									<a href="">
										<i class="fa fa-clock-o"></i>
										{{ Carbon\Carbon::parse($content->created_at)->isoFormat('D MMMM Y'); }}
									</a>
								</li>
								{{-- <li>
									<a href="">
										<i class="fa fa-comments"></i>
										5 comments
									</a>
								</li> --}}
								<li class="active">
									<i class="fa fa-eye"></i>
									{{ $content->views }}
								</li>
							</ul>
						</div>
						<!-- single post header end-->
						<div class="post-content-area mb-5">
							<div class="entry-content">
								{{-- <p>
									<span class="tie-dropcap">A</span> farmers in the US’s South—faced with continued failure in their efforts to run on successful farms their
									launched a lawsuit claiming that “white racism” is to the blame for their inability to produce crop yields.
								</p> --}}
								{!! html_entity_decode($content->desc) !!}
							</div>
							<!-- entry content end-->
						</div>
						<!-- post content area-->

						
						
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

						<!-- Social Share Button -->
						<script src="https://cdn.commoninja.com/sdk/latest/commonninja.js" defer></script>
						<div class="commonninja_component pid-c73d4cdb-a270-4d5c-968b-9426517dbc86"></div>
						<!-- Social Share Button end -->

						<div class="post-navigation clearfix mb-3 mt-3">
							<div class="post-previous float-left">
								@if ($prev)
                                    <a href="{{ route('post', ['url' => $prev->url]) }}">
                                        <img src="{{ $prev->thumbnail }}" alt="">
                                        <span>Baca Sebelumnya</span>
                                        <p>
                                            {{ $prev->title }}
                                        </p>
                                    </a>
                                @endif
							</div>
							<div class="post-next float-right">
								@if ($next)
                                    <a href="{{ route('post', ['url' => $next->url]) }}">
                                        <img src="{{ $next->thumbnail }}" alt="">
                                        <span>Baca Selanjutnya</span>
                                        <p>
                                            {{ $next->title }}
                                        </p>
                                    </a>
                                @endif
							</div>
						</div>
						<!-- post navigation end-->
					</div>
					<!--single post end -->

					@if (env('DISQUS_ENABLED', false))
						<div class="comments-form ts-grid-box">
							<div id="disqus_thread"></div>
							<script>
								/**
								*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
								*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
								
								var disqus_config = function () {
									this.page.title = '{{ $content->title }}';  // Replace PAGE_TITLE with your page's title variable
									this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
									this.page.identifier = '{{ $content->url }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
								};
								
								(function() { // DON'T EDIT BELOW THIS LINE
									var d = document, s = d.createElement('script');
									s.src = 'https://' + '{{ env('DISQUS_USERNAME') }}' + '.disqus.com/embed.js';
									s.setAttribute('data-timestamp', +new Date());
									(d.head || d.body).appendChild(s);
								})();
							</script>
							<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
						</div>
					@endif
					<!-- comment form end-->
					
					<div class="ts-grid-box mb-30">
						<h2 class="ts-title">Konten Relevan</h2>

						<div class="most-populers owl-carousel">
                            @if ($related)
                                @foreach ($related as $rel)
                                    <div class="item">
                                        <a class="post-cat ts-{{ $colors[$rel->topic] }}-bg" href="{{ route('topic', ['topic' => $rel->topic]) }}">{{ $rel->topic }}</a>
                                        <div class="ts-post-thumb">
                                            <a href="{{ route('post', ['url' => $rel->url]) }}">
                                                <img class="img-fluid image-popular" src="{{ $rel->thumbnail }}" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h3 class="post-title">
                                                <a href="{{ route('post', ['url' => $rel->url]) }}">{{ $rel->title }}</a>
                                            </h3>
                                            <span class="post-date-info">
                                                <i class="fa fa-clock-o"></i>
                                                {{ Carbon\Carbon::parse($rel->created_at)->isoFormat('D MMMM Y'); }}
                                            </span>
                                        </div>
                                    </div>    
                                @endforeach
                            @endif
							<!-- ts-grid-box end-->
						</div>
						<!-- most-populers end-->
					</div>

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