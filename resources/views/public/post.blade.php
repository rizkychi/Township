@extends('_template.master-public-news')

@section('page_title', $content->title)

@section('title', $content->title)

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper mt-3">
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
					<div class="ts-grid-box content-wrapper single-post">
						<div class="entry-header">
							<div class="category-name-list">
								<span>
									<a href="{{ route('topic', ['topic' => $content->topic]) }}" class="post-cat ts-{{ $colors[$content->topic] }}-bg">{{ $content->topic }}</a>
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
								{!! $content->desc !!}
							</div>
							<!-- entry content end-->
						</div>
						<!-- post content area-->
						
						<div class="post-navigation clearfix mb-3">
							<div class="post-previous float-left">
								@if ($prev)
                                    <a href="{{ route('post', ['id' => $prev->id]) }}">
                                        <img src="{{ getImage($prev->desc) }}" alt="">
                                        <span>Baca Sebelumnya</span>
                                        <p>
                                            {{ $prev->title }}
                                        </p>
                                    </a>
                                @endif
							</div>
							<div class="post-next float-right">
								@if ($next)
                                    <a href="{{ route('post', ['id' => $next->id]) }}">
                                        <img src="{{ getImage($next->desc) }}" alt="">
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
					<div class="comments-form ts-grid-box d-none">

						<h3 class="comments-counter">03 Comments</h3>
						<ul class="comments-list">
							<li>
								<div class="comment">
									<img class="comment-avatar float-left" alt="" src="images/avater/author.png">
									<div class="comment-body">
										<div class="meta-data"><span class="float-right"><a class="comment-reply" href="#"><i 	class="fa fa-mail-reply-all"></i> Reply</a></span>
											<span class="comment-author">Demon Lion</span><span class="comment-date">October 31, 2018</span>
										</div>
										<div class="comment-content">
											<p>There’s such a thing as “too much information”, especially for the companies scaling out their sales operations. That’s why Attentive was help sales teams </p>
										</div>
									</div>
								</div>
								<!-- Comments end-->
								<ul class="comments-reply">
									<li>
										<div class="comment">
											<img class="comment-avatar float-left" alt="" src="images/avater/author2.png">
											<div class="comment-body reply-bg">
												<div class="meta-data"><span class="float-right"><a class="comment-reply" href="#"><i class="fa fa-mail-reply-all"></i> Reply</a></span>
													<span class="comment-author">Henry kendel</span><span class="comment-date">October 31, 2018</span>
												</div>
												<div class="comment-content">
													<p>There’s such a thing as “too much information”, especially for the companies scaling out their sales operations. That’s why Attentive was born</p>
												</div>
											</div>
										</div>
										<!-- Comments end-->
									</li>
								</ul>
								<!-- comments-reply end-->
							</li>
							<!-- Comments-list li end-->
							<li>
								<div class="comment last">
									<img class="comment-avatar float-left" alt="" src="images/avater/author.png">
									<div class="comment-body">
										<div class="meta-data"><span class="float-right"><a class="comment-reply" href="#"><i 	class="fa fa-mail-reply-all"></i> Reply</a></span>
											<span class="comment-author">Demon Lion</span><span class="comment-date">October 31, 2018</span>
										</div>
										<div class="comment-content">
											<p>Cras lectus sed arcus volutpat tincidun met diam placerat.Vis solum numquam. That’s why Attentive help sales teams </p>
										</div>
									</div>
								</div><!-- Comments last end-->
							</li>
						</ul>
						<!-- Comments-list ul end-->

						<h3 class="comment-reply-title">Add Comment</h3>
						<form role="form" class="ts-form">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required="">
									</div>
									<!-- form group end-->
									<div class="form-group">
										<input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required="">
									</div>
									<!-- form group end-->
									<div class="form-group">
										<input class="form-control" placeholder="Your Website" type="text" required="">
									</div>
									<!-- form group end-->
								</div>
								<!-- Col end -->
								<div class="col-md-6">
									<div class="form-group">
										<textarea class="form-control msg-box" id="message" placeholder="Your Comment" rows="10" required=""></textarea>
									</div>
								</div>
								<!-- Col end -->
								<div class="col-md-12">
									<p class="comment-form-cookies-consent">
										<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
										<label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
									</p>
								</div>
							</div>
							<!-- Form row end -->
							<div class="clearfix">
								<button class="comments-btn btn btn-primary" type="submit">Post Comment</button>
							</div>
						</form>
						<!-- Form end -->
					</div>
					<!-- comment form end-->
					<div class="ts-grid-box mb-30">
						<h2 class="ts-title">Konten Relevan</h2>

						<div class="most-populers owl-carousel">
                            @if ($related)
                                @foreach ($related as $rel)
                                    <div class="item">
                                        <a class="post-cat ts-{{ $colors[$rel->topic] }}-bg" href="{{ route('topic', ['topic' => $rel->topic]) }}">{{ $rel->topic }}</a>
                                        <div class="ts-post-thumb">
                                            <a href="{{ route('post', ['id' => $rel->id]) }}">
                                                <img class="img-fluid image-popular" src="{{ getImage($rel->desc) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <h3 class="post-title">
                                                <a href="{{ route('post', ['id' => $rel->id]) }}">{{ $rel->title }}</a>
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
                    @include('_template.master-sidebar');
                </div>
            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->

@endsection

@php
    function getImage($text) {
        $regex = '/(data:image\/[^;]+;base64[^"]+)/i';
        preg_match($regex, $text, $matches_out);
        
        if ($matches_out) {
            return $matches_out[0];
        } else {
            return asset('src/img/No-Image-Placeholder.png');
        }
    }
@endphp