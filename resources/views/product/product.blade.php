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
                                                    <th scope="col">Description</th>
                                                    <th scope="col" class="text-center" style="width: 150px;">Action</th>
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
                    <input name="id" type="text" hidden id="id"/>
                    <div class="form-body">
                        <div class="row pr-1 pl-1">
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Category</label>
                                    <select class="form-control" id="category_id" name="category_id" onchange="chooseCategory();" required>
                                        <option value="" selected disabled>- Pilih -</option>
                                        @foreach ($category as $item)
                                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <label style="padding-bottom: 4px;">Nama Product</label>
                                    <input type="text" id="product_name" class="form-control" name="product_name" required>
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
                                    <input type="number" id="jml_halaman" class="form-control" name="jml_halaman">
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
                                    <input type="number" id="status" class="form-control" name="status">
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
        table = $('#tb').DataTable({
            "ajax": "{{ route('product.get') }}"
        });
        
    });
    
    function chooseCategory(){
        var category = $('#category_id').val();
        if(category === "1"){
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
        $('#category_id').attr('disabled', false);
    }

    function reload() {
        table.ajax.reload(null, false);
    }

    // $('#form').submit(function(){
    //     save();
    // });
    
    function save(){
        var id              = $('#id').val();
        var category_id     = $('#category_id').val();
        var product_name    = $('#product_name').val();
        var nidn            = $('#nidn').val();
        var nama_lengkap    = $('#nama_lengkap').val();
        var isbn            = $('#isbn').val();
        var jml_halaman     = $('#jml_halaman').val();
        var penerbit        = $('#penerbit').val();
        var pic             = $('#pic').val();
        var mitra           = $('#mitra').val();
        var status          = $('#status').val();
        var image           = $('#image').prop('files')[0];
        var description     = tinyMCE.get('description').getContent();

        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('category_id', category_id);
        form_data.append('product_name', product_name);
        form_data.append('nidn', nidn);
        form_data.append('nama_lengkap', nama_lengkap);
        form_data.append('isbn', isbn);
        form_data.append('jml_halaman', jml_halaman);
        form_data.append('penerbit', penerbit);
        form_data.append('pic', pic);
        form_data.append('mitra', mitra);
        form_data.append('status', status);
        form_data.append('image', image);
        form_data.append('description', description);

        if(category_id == null){
            alertResponse('info', 'Info!','Mohon pilih kategori');
        }else if(product_name == ""){
            alertResponse('info', 'Info!','Nama produk tidak boleh kosong');
        }else if(description < 1){
            alertResponse('info', 'Info!','Deskripsi tidak boleh kosong');
        }else{
            var url = "";
            if(save_method === 'add'){
                url = "<?= url('/product/add') ?>";
            }else{
                url = "<?= url('/product/update') ?>";
            }
            $.ajax({
                url: url,
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'POST',
                success: function(response) {
                    console.log(response.callback);
                    if(response.callback === "success"){
                        alertResponse('success', 'Success!', response.desc);
                        $('#modal_form').modal('hide');
                        reload();
                    }else{
                        alertResponse('error', 'Failed!', response.desc);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown){
                    console.log("Error json " + errorThrown);
                }
            });
        }

        
       
        
    }
    
    function ganti(id){
        save_method = 'update';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
        $('.modal-title').text('Edit Users');
        $('#category_id').attr('disabled', true);
        $.ajax({
            url : "/product/detail/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                if(data.callback === "success"){
                    var data = data.data;
                    console.log(data);
                    $('#category_id').val(data.category_id);
                    chooseCategory();
                    $('#id').val(data.id);
                    $('#product_name').val(data.product_name);
                    $('#description').val(data.description);
                    $('#pic').val(data.pic);
                    $('#mitra').val(data.mitra);
                    $('#nidn').val(data.nidn);
                    $('#jml_halaman').val(data.jml_halaman);
                    $('#penerbit').val(data.penerbit);
                    $('#nama_lengkap').val(data.nama_lengkap);
                    $('#isbn').val(data.isbn);
                    $('#status').val(data.status);
                    tinyMCE.get('description').setContent(data.description);
                    
                }else{
                    alertResponse('error', 'Failed!', 'Data tidak ditemukan');
                }
               
            },error: function (jqXHR, textStatus, errorThrown){
                console.log('Error get data');
            }
        });
    }

    function hapus(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
            }).then(function (result) {
            if (result.value) {
                ajax_delete(id);
            }
        });
    }

    function ajax_delete(id){
        $.ajax({
            url : "/product/delete/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.callback === "success"){
                    alertResponse('success', 'Deleted!', 'Your file has been deleted.');
                    reload();
                }else{
                    alertResponse('error', 'Failed!', 'Your file has failed to delete.');
                }
               
            },error: function (jqXHR, textStatus, errorThrown){
                console.log('Error get data');
            }
        });
    }
</script>
@endsection