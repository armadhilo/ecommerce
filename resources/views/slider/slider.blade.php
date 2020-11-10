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
                               <h3 class="content-header-title float-left mb-0">Slider</h3>
                               <div class="breadcrumb-wrapper col-12">
                                   <ol class="breadcrumb">
                                       <li class="breadcrumb-item" style="font-size: 12px;"><a href="javascript:void(0)">Home</a>
                                       </li>
                                       <li class="breadcrumb-item" style="font-size: 12px;"><a href="javascript:void(0)">Slider</a>
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
                                <h4 class="card-title">List Slider</h4>
                            </div><hr>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0" id="tb">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Slider</th>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form" autocomplete="off">
                    <input name="id" type="text" id="id"/>
                    <div class="form-body">
                        <div class="row pr-1 pl-1">
                            <div class="col-12">
                                <div class="form-group row mb-1">
                                    <div class="col-md-3 text-right">
                                        <span>Slider</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" id="slider" name="slider" class="form-control">
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>
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
            "ajax": "{{ route('slider.get') }}"
        });
    });
    
    function add(){
        save_method = 'add';
        $('#form')[0].reset();
        $('#modal_form').modal('show');
        $('.modal-title').text('Add Slider');
    }
    
    function reload(){
        table.ajax.reload(null, false);
    }

    // $('#form').submit(function(){
    //     save();
    // });
    
    function save(){
        var url = "";
        if(save_method === 'add'){
            url = "<?= url('/slider/add') ?>";
        }else{
            url = "<?= url('/slider/update') ?>";
        }

        var slider = $('#slider').prop('files')[0];
        var form_data = new FormData();
        form_data.append('id', id);
        form_data.append('slider', slider);

        $.ajax({
            url: url,
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function(response) {
                console.log(response.status);
                if(response.status === "Data tersimpan" || response.status === "Data terupdate"){
                    alertResponse('success', 'Success!', response.status);
                    $('#modal_form').modal('hide');
                    reload();
                }else{
                    alertResponse('error', 'Failed!', response.status);
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
        $('.modal-title').text('Edit Slider');
        
        $.ajax({
            url : "/slider/detail/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(response){
                $('#id').val(response.data.id);
               
            },error: function (jqXHR, textStatus, errorThrown){
                console.log('Error get data');
            }
        });
    }

    function hapus(id){
        $.ajax({
            url : "/slider/delete/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.callback === "success"){
                    alert('success');
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