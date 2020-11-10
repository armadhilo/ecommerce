@extends('partial_horizontal.app')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <!--<div class="header-navbar-shadow"></div>-->
    <div class="content-wrapper">
        <div class="content-header row">  
            <section id="carousel-options">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card" style="margin-left: 14px; margin-right: 14px;">
                            <div class="card-content">
                                <div class="card-body" style="padding: 0px;">
                                    <div id="carousel-interval" class="carousel slide" data-ride="carousel" data-interval="5000">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-interval" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-interval" data-slide-to="1"></li>
                                            <li data-target="#carousel-interval" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active" style="height: 300px;">
                                                <img class="img-fluid" src="../../../app-assets/images/slider/01.jpg" alt="First slide">
                                            </div>
                                            <div class="carousel-item" style="height: 300px;">
                                                <img class="img-fluid" src="../../../app-assets/images/slider/03.jpg" alt="Second slide">
                                            </div>
                                            <div class="carousel-item" style="height: 300px;">
                                                <img class="img-fluid" src="../../../app-assets/images/slider/02.jpg" alt="Third slide">
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
        </div>
        <div class="content-detached content-right">
            <div class="content-body">
                
                <!-- Ecommerce Content Section Starts -->
                <section id="ecommerce-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ecommerce-header-items">
                                <div class="result-toggler">
                                    <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                                        <span class="navbar-toggler-icon d-block d-lg-none"><i class="feather icon-menu"></i></span>
                                    </button>
                                    <div class="search-results">
                                        16285 results found
                                    </div>
                                </div>
                                <div class="view-options">
                                    <select class="price-options form-control" id="ecommerce-price-options">
                                        <option selected>Featured</option>
                                        <option value="1">Lowest</option>
                                        <option value="2">Highest</option>
                                    </select>
                                    <div class="view-btn-option">
                                        <button class="btn btn-white view-btn grid-view-btn active">
                                            <i class="feather icon-grid"></i>
                                        </button>
                                        <button class="btn btn-white list-view-btn view-btn">
                                            <i class="feather icon-list"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Ecommerce Content Section Starts -->
                <!-- background Overlay when sidebar is shown  starts-->
                <div class="shop-content-overlay"></div>
                <!-- background Overlay when sidebar is shown  ends-->

                <!-- Ecommerce Search Bar Starts -->
                <section id="ecommerce-searchbar">
                    <div class="row mt-1">
                        <div class="col-sm-12">
                            <fieldset class="form-group position-relative">
                                <input type="text" class="form-control search-product" id="iconLeft5" placeholder="Search here">
                                <div class="form-control-position">
                                    <i class="feather icon-search"></i>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </section>
                <!-- Ecommerce Search Bar Ends -->

                <!-- Ecommerce Products Starts -->
                <section id="ecommerce-products" class="grid-view">
                    <div class="card ecommerce-card">
                        <div class="card-content">
                            <div class="item-img text-center">
                                <a href="{{ route('main_product.product_detail') }}">
                                    <img class="img-fluid" src="../../../app-assets/images/pages/eCommerce/1.png" alt="img-placeholder"></a>
                            </div>
                            <div class="card-body">
                                <div class="item-wrapper">
                                    <div>
                                        <h6 class="item-price">
                                        </h6>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a href="app-ecommerce-details.html">Amazon - Fire TV Stick with Alexa Voice Remote - Black</a>
                                    <p class="item-company">By <span class="company-name">Google</span></p>
                                </div>
                                <div>
                                    <p class="item-description">
                                        Enjoy smart access to videos, games and apps with this Amazon Fire TV stick. Its Alexa voice remote lets you
                                        deliver hands-free commands when you want to watch television or engage with other applications. With a
                                        quad-core processor, 1GB internal memory and 8GB of storage, this portable Amazon Fire TV stick works fast
                                        for buffer-free streaming.
                                    </p>
                                </div>
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
                                    <div class="item-cost">
                                        <h6 class="item-price">
                                        </h6>
                                    </div>
                                </div>
                                <div class="cart">
                                    <i class="feather icon-eye"></i> 
                                    <a href="{{ route('main_product.product_detail') }}" class="view-in-cart">Product Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
                <!-- Ecommerce Products Ends -->

                <!-- Ecommerce Pagination Starts -->
                <section id="ecommerce-pagination">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-2">
                                    <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                    <li class="page-item next-item"><a class="page-link" href="#"></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
                <!-- Ecommerce Pagination Ends -->

            </div>
        </div>
        <div class="sidebar-detached sidebar-left">
            <div class="sidebar">
                <!-- Ecommerce Sidebar Starts -->
                <div class="sidebar-shop" id="ecommerce-sidebar-toggler">

                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                        </div>
                    </div>
                    <span class="sidebar-close-icon d-block d-md-none">
                        <i class="feather icon-x"></i>
                    </span>
                    <div class="card">
                        <div class="card-body">
                            <!-- Categories Starts -->
                            <div id="product-categories">
                                <div class="product-category-title">
                                    <h6 class="filter-title mb-1">Categories</h6>
                                </div>
                                <ul class="list-unstyled categories-list">
                                    <li>
                                        <span class="vs-radio-con vs-radio-primary py-25">
                                            <input type="radio" name="category_id" value="all">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="ml-50"> All</span>
                                        </span>
                                    </li>
                                    <?php
                                    $list = DB::table('category')->get();
                                    foreach ($list as $row) {
                                        ?>
                                        <li>
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category_id" value="<?php echo $row->id;?>">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50"><?php echo $row->category_name?></span>
                                            </span>
                                        </li>
                                        <?php
                                    }    
                                    ?>
                                </ul>
                            </div>
                            <!-- Categories Ends -->
                            <hr>
                            <!-- Clear Filters Starts -->
                            <div id="clear-filters">
                                <button class="btn btn-block btn-primary">CLEAR ALL FILTERS</button>
                            </div>
                            <!-- Clear Filters Ends -->

                        </div>
                    </div>
                </div>
                <!-- Ecommerce Sidebar Ends -->

            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $("input:radio").click(function() {
                var category_id =$('input[name="category_id"]:checked').val();
                $.ajax({
                    url : "/users/detail/" + category_id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(response){
                        //append product
                        console.log(response);
                    },error: function (jqXHR, textStatus, errorThrown){
                        console.log('Error get data');
                    }
                });

            });

            

            // $("input:radio:first").prop("checked", true).trigger("click");

        });
    </script>
    @endsection
