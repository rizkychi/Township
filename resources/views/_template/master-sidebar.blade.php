<div class="right-sidebar">
    <div class="ts-grid-box widgets category-list-item">
        <h2 class="widget-title">Kategori</h2>
        <ul class="category-list">
            <li>
                <a href="{{ route('topic', ['topic' => 'Post']) }}">Post
                    <span class="ts-{{ $colors['Post'] }}-bg">{{ $count_post }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('topic', ['topic' => 'Pengumuman']) }}">Pengumuman
                    <span class="ts-{{ $colors['Pengumuman'] }}-bg">{{ $count_pengumuman }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('topic', ['topic' => 'Event']) }}">Event
                    <span class="ts-{{ $colors['Event'] }}-bg">{{ $count_event }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('topic', ['topic' => 'Berita']) }}">Berita
                    <span class="ts-{{ $colors['Berita'] }}-bg">{{ $count_berita }}</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="widgets widgets-item ts-social-list-item d-none">

        <div class="ts-widget-newsletter">
            <div class="newsletter-introtext">
                <h4>Newsletter</h4>
                <p>Subscribe to get the best stories into your inbox!</p>
            </div>

            <div class="newsletter-form">
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="email" name="email" id="newsletter-form-email"
                            class="form-control form-control-lg" placeholder="E-mail"
                            autocomplete="off">
                        <button class="btn btn-primary">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- widgets end-->
    <div class="post-list-item widgets">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation">
                <a class="active" href="#home" aria-controls="home" role="tab"
                    data-toggle="tab">
                    Pengumuman
                </a>
            </li>
            <li role="presentation">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                    Berita
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
                @if ($pengumuman)
                    @foreach ($pengumuman as $p)
                        <div class="post-content media">
                            <img class="d-flex sidebar-img" src="{{ getImage($p->desc) }}" alt="">
                            <div class="media-body">
                                <span class="post-tag">
                                    <a href="{{ route('topic', ['topic' => $p->topic]) }}" class="{{ $colors[$p->topic] }}-color">{{ $p->topic }}</a>
                                </span>
                                <h4 class="post-title">
                                    <a href="{{ route('post', ['id' => $p->id]) }}">{{ $p->title }}</a>
                                </h4>
                            </div>
                        </div>
                        <!--post-content end-->
                    @endforeach
                @endif

            </div>
            <!--ts-grid-box end -->

            <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="profile">
                @if ($berita)
                    @foreach ($berita as $b)
                        <div class="post-content media">
                            <img class="d-flex sidebar-img" src="{{ getImage($b->desc) }}" alt="">
                            <div class="media-body">
                                <span class="post-tag">
                                    <a href="{{ route('topic', ['topic' => $b->topic]) }}" class="{{ $colors[$b->topic] }}-color"> {{ $b->topic }}</a>
                                </span>
                                <h4 class="post-title">
                                    <a href="{{ route('post', ['id' => $b->id]) }}">{{ $b->title }}</a>
                                </h4>
                            </div>
                        </div>
                        <!--post-content end-->
                    @endforeach
                @endif
            </div>
            <!--ts-grid-box end -->
        </div>
        <!-- tab content end-->
    </div>
    <!-- widgets end-->
</div>