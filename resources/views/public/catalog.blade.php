@extends('_template.master-public-news')

@section('page_title', 'Katalog')

@section('title', 'Katalog')

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper mt-3 mb-3">
        <div class="container">
           
            <div class="row">
                <div class="col-lg-9">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                           <div class="ts-grid-box pt-3 mb-0">
                                <ol class="ts-breadcrumb">
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <i class="fa fa-home"></i>
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('catalog') }}">Katalog</a>
                                    </li>
                                </ol>
                                <div class="clearfix entry-cat-header text-center">
                                    <form method="get">
                                        <input type="text" class="form-control text-center" placeholder="Cari produk" name="q" value="{{ request()->get('q') }}">
                                    </form>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="post-list">

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
                    
                        <!-- row start-->
                        
                        <div class="row">
                            <!-- Product Card -->
                            @if ($list && $list->count() > 0)
                                @foreach ($list as $l)
                                    <div class="col-md-4 mb-3">
                                        <div class="product-card" data-id="{{ $l->id }}">
                                            <div class="bg-img">
                                                <img src="{{ @$l->catalog_images[0]->image_path ? asset('media/products/' . ($l->catalog_images[0]->image_path)) : asset('src/img/product-placeholder.jpg') }}" alt="{{ $l->product_name }}">
                                            </div>
                                            <div class="cart-icon viewProductDetails">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                            <div class="pb-3 pl-3 pr-3 pt-2">
                                                <div class="product-name viewProductDetails">{{ $l->product_name }}</div>
                                                <div class="product-price">Rp {{ number_format($l->product_price, 0, ',', '.') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12">
                                    <div class="alert alert-warning text-center">Tidak ada produk</div>
                                </div>
                            @endif
                        </div>
                        
                        <!-- row end-->
                        <div class="ts-pagination text-center mt-15 md-mb-30">
                            {{ $list->onEachSide(1)->links('vendor.pagination.default') }}
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
                </div>

                <!-- Product Details Modal -->
                <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel">Detail Produk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row d-none" id="productDetails">
                                    <!-- Image Carousel -->
                                    <div class="col-md-6 mb-2 d-flex justify-content-center">
                                        <div id="productCarousel" class="carousel slide w-100" data-bs-ride="carousel">
                                            <div class="carousel-inner" id="productImages">
                                                <!-- Images will be appended here -->
                                               
                                            </div>
                                            <ol class="carousel-indicators">
                                                
                                            </ol>
                                        </div>
                                        <img id="noimage" src="{{ asset('src/img/product-placeholder.jpg') }}" alt="Product Placeholder" class="img-fluid d-none" style="object-fit: cover; object-position: center; width: auto; height: 320px;">
                                    </div>

                                    <!-- Product Details -->
                                    <div class="col-md-6 mb-2 d-flex flex-column">
                                        <h5 id="modal_product_owner" class="text-uppercase">Nama Owner</h5>
                                        <h1 id="modal_product_name" class="fw-bold">Nama Produk</h1>
                                        <p id="modal_product_description">Deskripsi</p>
                                        <p id="modal_product_price" class="product-price" style="color: #2ecc71"></p>
                                        <a href="#" id="modal_product_link" class="mt-auto">
                                            <button class="btn btn-primary btn-add-to-cart w-100"><i class="fa fa-shopping-cart me-2"></i> Beli Produk</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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

@push('styles')
<style>
    .product-card {
        border: none;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
    }
    .bg-img {
        height: 220px;
        overflow: hidden;
        position: relative;
    }
    .bg-img img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image covers the entire container */
        object-position: center; /* Center the image within the container */
    }
    .cart-icon {
        width: 50px;
        height: 50px;
        background-color: #ff6b6b;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        margin: -25px auto 0px;
        font-size: 1.5rem;
        position: relative;
        border: 3px solid white;
        transition: all 0.5s;
    }
    .cart-icon:hover {
        cursor: pointer;
        transform: scale(1.05);
        transition: all 0.5s;
    }
    .product-name {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 5px;
        transition: 0.3s;
        line-height: 1;
    }
    .product-name:hover {
        cursor: pointer;
        color: #ff6b6b;
        transition: 0.3s;
    }
    .product-price {
        color: #ff6b6b;
        font-weight: bold;
    }

    #productModal .product-price {
      font-size: 2rem;
      font-weight: bold;
    }
    #productModal .carousel-indicators img {
      height: 50px;
      cursor: pointer;
    }

    /* Indicators list style */
    .carousel-indicators {
        position: relative;
        bottom: 0;
        top: 5px;
        margin-bottom: 0px;
    }
    /* Indicators list style */
    .carousel-indicators li {
        border: medium none;
        border-radius: 0;
        float: left;
        height: 54px;
        margin: 0;
        width: 100px;
    }
    /* Indicators images style */
    .carousel-indicators img {
        border: 2px solid #FFFFFF;
        float: left;
        height: 54px;
        left: 0;
        width: 100%;
    }
    /* Indicators active image style */
    .carousel-indicators .active img {
        border: 2px solid #428BCA;
        opacity: 0.7;
    }
</style>
@endpush

@push('scripts')
<script>
    // Show Modal on Button Click
    $('.viewProductDetails').on('click', function() {
        $('#productModal').modal('show');
        loadProductDetails($(this).closest('.product-card').data('id'));
    });

    // Auto-slide functionality for the carousel
    const carousel = document.querySelector('#productCarousel');
    new bootstrap.Carousel(carousel, {
        interval: 3000, // 3 seconds
        ride: "carousel"
    });

    // Load Product Details
    function loadProductDetails(id) {
        // Show Loading Spinner
        $('#productDetails').addClass('d-none');
        $('#productModal .modal-body').append('<div id="loading" class="text-center text-muted"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');

        // Fetch Product Details
        $.get('/api/catalog/' + id, function(data) {
            // Hide Loading Spinner
            $('#loading').remove();

            console.log(data);

            // Update Product Details
            $('#modal_product_owner').text(data.product_owner);
            $('#modal_product_name').text(data.product_name);
            $('#modal_product_description').html(data.product_description.replace(/\r?\n/g, '<br>'));
            $('#modal_product_price').text(
                new Intl.NumberFormat('id-ID',{
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
            }).format(data.product_price));
            if (data.product_link) {
                $('#modal_product_link').attr('href', data.product_link).show();
            } else {
                $('#modal_product_link').hide();
            }
            $('#productCarousel .carousel-inner').html('');
            $('#productCarousel .carousel-indicators').html('');

            // Update Product Images
            data.catalog_images.forEach((image, index) => {
                $('#productCarousel .carousel-inner').append(`
                    <div class="carousel-item ${index == 0 ? 'active' : ''}">
                        <img src="${image.image_path ? '/media/products/' + image.image_path : 'https://fakeimg.pl/500x500'}" class="d-block w-100" alt="Product Image ${index + 1}" style="object-fit: contain; width: 100%; height: 320px;">
                    </div>
                `);
                $('#productCarousel .carousel-indicators').append(`
                    <li data-target="#productCarousel" data-slide-to="${index}" class="${index == 0 ? 'active' : ''}">
                        <img src="${image.image_path ? '/media/products/' + image.image_path : 'https://fakeimg.pl/50x50'}" alt="Thumb ${index + 1}">
                    </li>
                `);
            });

            // Image not found
            if (data.catalog_images.length == 0) {
                $('#noimage').removeClass('d-none');
            } else {
                $('#noimage').addClass('d-none');
            }

            // Show Product Details
            $('#productDetails').removeClass('d-none');
        });
    }

    // Viewer
    window.addEventListener('DOMContentLoaded', function () {
        var galley = document.getElementById('productImages');
        var viewer;
        var options = {
            toolbar: false,
            rotatable: false,
            title: false,
            navbar: false,
        };

        $('#productModal').on('shown.bs.modal', function (e) {
            // WARNING: should ignore Viewer's `shown` event here.
            if(e.namespace === 'bs.modal') {
                viewer = new Viewer(galley, options);
            }
        }).on('hidden.bs.modal', function (e) {
            // WARNING: should ignore Viewer's `hidden` event here.
            if(e.namespace === 'bs.modal') {
                viewer.destroy();
            }
        });
    });
  </script>
@endpush