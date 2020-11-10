@extends('partial_horizontal.app')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
        <div class="content-overlay"></div>
        <!--<div class="header-navbar-shadow"></div>-->
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- app ecommerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5 mt-2">
                                <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../../../app-assets/images/elements/macbook-pro.png" class="img-fluid" alt="product image">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5>Canon - EOS 5D Mark IV DSLR Camera with 24-70mm f/4L IS USM Lens
                                    </h5>
                                    <p class="text-muted">by Apple</p>
                                    <div class="ecommerce-details-price d-flex flex-wrap">

                                        <p class="text-primary font-medium-3 mr-1 mb-0">$43.99</p>
                                        <span class="pl-1 font-medium-3 border-left">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </span>
                                        <span class="ml-50 text-dark font-medium-1">424 ratings</span>
                                    </div>
                                    <hr>
                                    <p>Shoot professional photos and videos with this Canon EOS 5D Mk V 24-70mm lens kit. A huge 30.4-megapixel
                                        full-frame sensor delivers outstanding image clarity, and 4K video is possible from this DSLR for powerful
                                        films. Ultra-precise autofocus and huge ISO ranges give you the images you want from this Canon EOS 5D Mk V
                                        24-70mm lens kit.</p>
                                    <p class="font-weight-bold mb-25"> <i class="feather icon-truck mr-50 font-medium-2"></i>Free Shipping
                                    </p>
                                    <p class="font-weight-bold"> <i class="feather icon-dollar-sign mr-50 font-medium-2"></i>EMI options available
                                    </p>
                                    <hr>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Color</label>
                                        <ul class="list-unstyled mb-0 product-color-options">
                                            <li class="d-inline-block selected">
                                                <div class="color-option b-primary">
                                                    <div class="filloption bg-primary"></div>
                                                </div>
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="color-option b-success">
                                                    <div class="filloption bg-success"></div>
                                                </div>
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="color-option b-danger">
                                                    <div class="filloption bg-danger"></div>
                                                </div>
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="color-option b-warning">
                                                    <div class="filloption bg-warning"></div>
                                                </div>
                                            </li>
                                            <li class="d-inline-block">
                                                <div class="color-option b-black">
                                                    <div class="filloption bg-black"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <p>Available - <span class="text-success">In stock</span></p>

                                    <div class="d-flex flex-column flex-sm-row">
                                        <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i class="feather icon-shopping-cart mr-25"></i>ADD TO CART</button>
                                        <button class="btn btn-outline-danger"><i class="feather icon-heart mr-25"></i>WISHLIST</button>
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i class="feather icon-facebook"></i></button>
                                    <button type="button" class="btn btn-icon rounded-circle btn-outline-info mr-1 mb-1"><i class="feather icon-twitter"></i></button>
                                    <button type="button" class="btn btn-icon rounded-circle btn-outline-danger mr-1 mb-1"><i class="feather icon-youtube"></i></button>
                                    <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i class="feather icon-instagram"></i></button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
                <!-- app ecommerce details end -->

            </div>
        </div>
    </div>
<!-- END: Content-->
@endsection
