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
                                        <img style="width: 500px; height: auto;" src="{{asset('images/'.$product->image)}}" class="img-fluid" alt="product image">
                                    </div>
                                </div>
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
