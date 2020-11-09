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
                               <h3 class="content-header-title float-left mb-0">Users</h3>
                               <div class="breadcrumb-wrapper col-12">
                                   <ol class="breadcrumb">
                                       <li class="breadcrumb-item" style="font-size: 12px;"><a href="javascript:void(0)">Home</a>
                                       </li>
                                       <li class="breadcrumb-item" style="font-size: 12px;"><a href="javascript:void(0)">Users</a>
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
                                <h4 class="card-title">List Users</h4>
                            </div><hr>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0" id="tb">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Telepon</th>
                                                    <th scope="col">Alamat</th>
                                                    {{-- <th scope="col">Foto</th> --}}
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
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form" autocomplete="off">
<<<<<<< HEAD
                    
                    <input name="id" type="text" id="id" name="id"/>
=======
                    <input name="id" type="text" hidden id="id" name="id"/>
>>>>>>> 55af8f5d5a04f6183965f1e60fa3e34a6f80be6f
                    <div class="form-body">
                        <div class="row pr-1 pl-1">
                            <div class="col-12">
                                <div class="form-group row mb-1">
                                    <div class="col-md-3 text-right">
                                        <span>Username</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="username" name="username" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row mb-1">
                                    <div class="col-md-3 text-right">
                                        <span>Nama</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="nama" name="nama" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row mb-1">
                                    <div class="col-md-3 text-right">
                                        <span>Telepon</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="telepon" name="telepon" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row mb-1">
                                    <div class="col-md-3 text-right">
                                        <span>Alamat</span>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea id="alamat" name="alamat" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
    @endsection
    
    @section('js')
    <script>
    var save_method;
    var table;
        
    $(document).ready(function() {
        table = $('#tb').DataTable({
            "ajax": "{{ route('users.get') }}"
        });
    });
    
    function add(){
        save_method = 'add';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
        $('.modal-title').text('Add Users');
    }
    
    function reload(){
        table.ajax.reload(null, false);
    }

    $('#form').submit(function(){
        save();
    });
    
    function save(){
        var url = "";
        if(save_method === 'add'){
<<<<<<< HEAD
            url : "{{ route('users.post') }}";
        }else{
            url : "{{ route('users.edit') }}";
            alert($('#form').serialize());
=======
            url = "<?= url('/users/add') ?>";
        }else{
            url = "<?= url('/users/update') ?>";
>>>>>>> 55af8f5d5a04f6183965f1e60fa3e34a6f80be6f
        }
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(response) {
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
    
    function ganti(id){
        save_method = 'update';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
        $('.modal-title').text('Edit Users');
        
        $.ajax({
            url : "/users/detail/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                if(data.callback === "success"){
                    var data = data.data;
                    $('#id').val(data.id);
                    $('#username').val(data.username);
                    $('#nama').val(data.nama);
                    $('#telepon').val(data.no_hp); 
                    $('#alamat').val(data.alamat); 
                }else{
                    alertResponse('error', 'Failed!', 'Data tidak ditemukan');
                }
               
            },error: function (jqXHR, textStatus, errorThrown){
                console.log('Error get data');
            }
        });
    }
    </script>
    @endsection