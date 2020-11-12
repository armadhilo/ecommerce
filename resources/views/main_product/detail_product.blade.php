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
                                <section id="carousel-options">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="card" style="margin-left: 14px; margin-right: 14px;">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div id="carousel-interval" class="carousel" data-interval="false">
                                                            <ol class="carousel-indicators">
                                                                <li data-target="#carousel-interval" data-slide-to="0" class="active"></li>
                                                                <li data-target="#carousel-interval" data-slide-to="1"></li>
                                                            </ol>
                                                            <div class="carousel-inner" role="listbox">
                                                                    <div class="carousel-item active" style="max-width: 450px; max-height: auto;">
                                                                        <img class="img-fluid" src="{{ asset('app-assets/images/slider/01.jpg') }}" alt="First slide">
                                                                    </div>
                                                                    <div class="carousel-item" style="max-width: 450px; max-height: auto">
                                                                        <img class="img-fluid" src="{{ asset('app-assets/images/slider/03.jpg') }}" alt="Second slide">
                                                                    </div>
                                                                </div>

                                                            <a class="carousel-control-prev" href="#carousel-interval" role="button" data-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next" href="#carousel-interval" role="button" data-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section> 
<!--                                <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img style="width: 500px; height: auto;" src="{{asset('images/'.$product->image)}}" class="img-fluid" alt="product image">
                                    </div>
                                </div>-->
                                <div class="col-12 col-md-6">
                                    <h5>{{$product->product_name}}
                                    </h5>
                                    <!--<p class="text-muted">by Apple</p> -->
                                    <hr>
                                    <table class="mb-1">
                                        <?php
                                            if($product->nama_lengkap != ""){
                                                ?>
                                                <tr class="book-category">
                                                    <td>
                                                        <p class="font-weight-bold mb-25"> 
                                                        Nama Lengkap
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="font-weight-bold mb-25 pl-1" id="nama_lengkap"> 
                                                            : {{$product->nama_lengkap}}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        
                                        <?php
                                            if($product->isbn != ""){
                                                ?>
                                                 <tr class="book-category">
                                                    <td>
                                                        <p class="font-weight-bold mb-25"> 
                                                        ISBN
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="font-weight-bold mb-25 pl-1" id="isbn"> 
                                                            : {{$product->isbn}}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                       
                                       <?php
                                            if($product->jml_halaman != ""){
                                                ?>
                                                <tr class="book-category">
                                                    <td>
                                                        <p class="font-weight-bold mb-25"> 
                                                        Jumlah Halaman
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="font-weight-bold mb-25 pl-1" id="jml_halaman"> 
                                                            : {{$product->jml_halaman}}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        
                                        <?php
                                            if($product->penerbit != ""){
                                                ?>
                                                <tr class="book-category">
                                                    <td>
                                                        <p class="font-weight-bold mb-25"> 
                                                        Penerbit
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="font-weight-bold mb-25 pl-1" id="penerbit"> 
                                                            : {{$product->penerbit}}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        
                                        <?php
                                            if($product->pic != ""){
                                                ?>
                                                <tr class="others-category">
                                                    <td>
                                                        <p class="font-weight-bold mb-25"> 
                                                        PIC
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="font-weight-bold mb-25 pl-1" id="pic"> 
                                                            : {{$product->pic}}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        
                                        <?php
                                            if($product->mitra != ""){
                                                ?>
                                                <tr class="others-category">
                                                    <td>
                                                        <p class="font-weight-bold mb-25"> 
                                                        Mitra
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="font-weight-bold mb-25 pl-1" id="mitra"> 
                                                            : {{$product->mitra}}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        
                                        
                                    </table>
                                    <p id="description"> {!! $product->description !!}</p>
                                    
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
