@extends('partial.app')
@section('content')

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
                                <li class="breadcrumb-item" style="font-size: 12px;"><a href="javascript:void(0)">Home</a>
                                </li>
                                <li class="breadcrumb-item" style="font-size: 12px;"><a href="javascript:void(0)">Product</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="text-right pr-0">
                            <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" onclick="add();"><i class="feather icon-plus"></i> Add</button>
                            <button type="button" class="btn btn-warning mb-1 waves-effect waves-light"><i class="feather icon-refresh-cw"></i> Reload</button>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List Product</h4>
                            </div><hr>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0" id="tb">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">User Input</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form" autocomplete="off">
                    <input name="_token" type="text" hidden id="_token" value="{{ csrf_token() }}" />
                    <input name="id" type="text" hidden id="id"/>
                    <div class="form-body">
                        <div class="row pr-1 pl-1">
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Category</label>
                                    <select class="form-control" id="category_id" name="category_id" onchange="chooseCategory();">
                                        <option value="">- Pilih -</option>
                                        <option value="book">Book</option>
                                        <option value="beauty">Beauty</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Nama Product</label>
                                    <input type="text" id="product_name" class="form-control" name="product_name">
                                </div>
                            </div>
                            <!-- Book Category Start -->
                            <div class="col-6 book-category">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">NIDN</label>
                                    <input type="text" id="nidn" class="form-control" name="nidn">
                                </div>
                            </div>
                            <div class="col-6 book-category">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Nama Lengkap</label>
                                    <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap">
                                </div>
                            </div>
                            <div class="col-6 book-category">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">ISBN</label>
                                    <input type="text" id="isbn" class="form-control" name="isbn">
                                </div>
                            </div>
                            <div class="col-6 book-category">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Jumlah Halaman</label>
                                    <input type="text" id="jml_halaman" class="form-control" name="jml_halaman">
                                </div>
                            </div>
                            <div class="col-6 book-category">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Penerbit</label>
                                    <input type="text" id="penerbit" class="form-control" name="penerbit">
                                </div>
                            </div>
                            <!-- Book Category End -->
                            
                            <!-- Others Category Start -->
                            <div class="col-6 other-category">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">PIC</label>
                                    <input type="text" id="pic" class="form-control" name="pic">
                                </div>
                            </div>
                            <div class="col-6 other-category">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Mitra</label>
                                    <input type="text" id="mitra" class="form-control" name="mitra">
                                </div>
                            </div>
                            <div class="col-6 other-category">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Status</label>
                                    <input type="text" id="status" class="form-control" name="status">
                                </div>
                            </div>
                            <!-- Others Category End -->
                            
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                    <script>
                                        tinymce.init({ 
                                            selector: "#description",
                                            height : "150",
                                            plugins: "image,media,link"
                                        });
                                    </script>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save();">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var save_method;
    var table;

    $(document).ready(function () {
        $('.book-category').attr('hidden', true);
        $('.other-category').attr('hidden', true);
        table = $('#tb').DataTable();
    });
    
    function chooseCategory(){
        var category = $('#category_id').val();
        if(category === "book"){
            $('.book-category').attr('hidden', false);
            $('.other-category').attr('hidden', true);
        }else if(category === ""){
            $('.book-category').attr('hidden', true);
            $('.other-category').attr('hidden', true);
        }else{
            $('.book-category').attr('hidden', true);
            $('.other-category').attr('hidden', false);
        }
    }
    function add() {
        save_method = 'add';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
        $('.modal-title').text('Add Product');
    }

    function reload() {
        table.ajax.reload(null, false);
    }
    
    function save(){
        var desc = tinyMCE.get('description').getContent();
        
        
    }
</script>
@endsection