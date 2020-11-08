@extends('template')
@section('content')

<script>
    var save_method;
    var table;
        
    $(document).ready(function() {
        table = $('#tb_product').DataTable();
    });
    
    function add(){
        save_method = 'add';
//        $('#form')[0].reset();
        $('#modal_form').modal('show');
        $('.modal-title').text('Add Product');
        
    }
</script>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-0">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                           <h3 class="content-header-title float-left mb-0">Product</h3>
                           <div class="breadcrumb-wrapper col-12">
                               <ol class="breadcrumb">
                                   <li class="breadcrumb-item" style="font-size: 12px;"><a href="index.html">Home</a>
                                   </li>
                                   <li class="breadcrumb-item" style="font-size: 12px;"><a href="#">Product</a>
                                   </li>
                               </ol>
                           </div>
                       </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Basic Horizontal form layout section start -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="text-right pr-0">
                            <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" onclick="add();"><i class="feather icon-plus"></i> Add</button>
                            <button type="button" class="btn btn-warning mb-1 waves-effect waves-light"><i class="feather icon-refresh-cw"></i> Reload</button>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List Data</h4>
                            </div><hr>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0" id="tb_product">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Stok</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                </tr>
                                                <tr>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                    <td>AA</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic Horizontal form layout section end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form" autocomplete="off">
                    <div class="form-body">
                        <div class="row pr-1 pl-1">
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Nama Product</label>
                                    <input type="text" id="nama_produk" class="form-control" name="nama_produk">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Stok</label>
                                    <input type="text" class="form-control" id="stok" name="stok">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 150px;"></textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@stop