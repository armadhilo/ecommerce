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
                                <div class="card-body">
                                    <div id="carousel-interval" class="carousel slide" data-ride="carousel" data-interval="5000">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-interval" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-interval" data-slide-to="1"></li>
                                            <li data-target="#carousel-interval" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">

                                            @foreach($slider as $key => $item)
                                            <div class="carousel-item @if($key == 0) active @endif" style="height: 300px;">
                                                <img class="img-fluid" src="{{asset('images/slider/'.$item->slider)}}" alt="Second slide">
                                            </div>
                                            @endforeach
                                            {{-- <div class="carousel-item active" style="height: 300px;">
                                                <img class="img-fluid" src="../../../app-assets/images/banner/banner-1.jpg" alt="First slide">
                                            </div>
                                            
                                            <div class="carousel-item" style="height: 300px;">
                                                <img class="img-fluid" src="../../../app-assets/images/banner/banner-3.jpg" alt="Third slide">
                                            </div> --}}
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
                                    </div>
                                </div>
                                <div class="view-options">
                                    
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
                        <form action="{{ route('main_product.index') }}" method="GET">
                                @csrf
                                <fieldset class="form-group position-relative">
                                <input type="text" class="form-control search-product" id="search_product" name="search_product" placeholder="Search here" value="{{ request()->search_product }}">
                                    <div class="form-control-position" onclick="filterProduct();">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- Ecommerce Search Bar Ends -->

                <!-- Ecommerce Products Starts -->
                <section id="ecommerce-products" class="grid-view">
                    
                        @foreach($product as $p)
                        <div class="card ecommerce-card">
                            <div class="card-content">
                                <div class="item-img text-center pt-0">
                                    <a href="/product_detail/{{$p->product_name}}">
                                        <img style="width: 380px; height: 220px;" class="img-fluid" src="{{ url('images/') }}/{{$p->image}}" alt="img-product"></a>
                                </div>
                                
                                <div class="card-body">
                                    
                                        <div class="item-wrapper">
                                            <div class="item-rating">
                                            <div class="badge-md"></div>
                                        </div>
                                        <div>
                                            <h6 class="item-price">
                                            
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="item-name">
                                        <a href="app-ecommerce-details.html">{{$p->product_name}}</a>
                                    </div>
                                    <div>
                                        <p class="item-description">{{strip_tags($p->description)}}</p>
                                    </div>
                                </div>
                                <div class="item-options text-center">
                                    <div class="item-wrapper">
                                        <div class="item-cost">
                                            <h6 class="item-price">
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="cart" onclick="product_detail('{{$p->id}}')">
                                        <i class="feather icon-eye"></i> 
                                        <a href="/product_detail/{{$p->id}}" class="view-in-cart">Product Details</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                </section>
                <section id="products_notfound">
                </section>
                <!-- Ecommerce Products Ends -->

                <!-- Ecommerce Pagination Starts -->
                <section id="ecommerce-pagination">
                    {{ $product->appends(request()->input())->links() }}
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
                                            <input type="radio" name="category_id" value="" checked>
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
                            <!--<hr>-->
                            <!-- Clear Filters Starts -->
                            <!--<div id="clear-filters">
                                <button class="btn btn-block btn-primary">CLEAR ALL FILTERS</button>
                            </div>-->
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
                alert('{{ count(request()->input()) }}')
                // filterProduct();
            });

            // $("input:radio:first").prop("checked", true).trigger("click");

            $('#search_product').keypress(function (e) {
            var key = e.which;
            if(key == 13){
                filterProduct();
                }
            });   

        });

        function searchProduct(){
            filterProduct();
        }

        function filterProduct(){

            // wes gawe kene
        }

        function filterProduct1(){
            var product_list = $('#ecommerce-products');
            $('#products_notfound').empty();
            product_list.empty();
            var category_id =$('input[name="category_id"]:checked').val();
            var search = $('#search_product').val(); 
            var form_data = new FormData();
            form_data.append('filter', category_id);
            form_data.append('search', search);

            $.ajax({
                url: "/main_product/search",
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'POST',
                success: function(response){
                    //append product
                    console.log(response);
                    var data = response.data;
                    $('#products_notfound').empty();
                    $('#products_notfound').empty();
                    if(data.length > 0){
                        for (let i = 0; i < data.length; i++) {
                            product_list.append(`
                                <div class="card ecommerce-card">
                                    <div class="card-content">
                                        <div class="item-img text-center pt-0">
                                            <a href="/product_detail/${data[i].id}">
                                                <img style="width: 380px; height: 220px;" class="img-fluid" src="{{ url('images/') }}/${data[i].image}" alt="img-product"></a>
                                        </div>
                                        
                                        <div class="card-body">
                                            
                                                <div class="item-wrapper">
                                                    <div class="item-rating">
                                                    <div class="badge-md"></div>
                                                </div>
                                                <div>
                                                    <h6 class="item-price">
                                                    
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="item-name">
                                                <a href="app-ecommerce-details.html">${data[i].product_name}</a>
                                            </div>
                                            <div>
                                                <p class="item-description">${data[i].description}</p>
                                            </div>
                                        </div>
                                        <div class="item-options text-center">
                                            <div class="item-wrapper">
                                                <div class="item-cost">
                                                    <h6 class="item-price">
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="cart" onclick="product_detail('${data[i].id}')">
                                                <i class="feather icon-eye"></i> 
                                                <a href="/product_detail/${data[i].id}" class="view-in-cart">Product Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                `);
                            
                        }
                    }else{
                       
                        $('#products_notfound').append(`
                        <div class="card">
                            <div class="card-body text-center p-4">
                                <img class="img-fluid rounded-sm mb-1" style="width: 200px; height: auto;" src="{{ asset('app-assets/images/logo/not_found.png') }}">
                                <p>
                                    Oops, produk tidak ditemukan.
                                    Coba gunakan kata kunci lain.
                                </p>
                            </div>
                            
                        </div>
                        `);

                    }
                    
                    
                },error: function (jqXHR, textStatus, errorThrown){
                    console.log('Error get data');
                }
            });

        }

        function product_detail(id){
            window.location.href = "/product_detail/"+ id;
        }
    </script>
    @endsection
