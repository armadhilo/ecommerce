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
                               <h3 class="content-header-title float-left mb-2">Change Password</h3>
                               <div class="breadcrumb-wrapper col-12">
                                   <ol class="breadcrumb">
                                       <li class="breadcrumb-item" style="font-size: 12px;"><a href="javascript:void(0)">Home</a>
                                       </li>
                                       <li class="breadcrumb-item" style="font-size: 12px;"><a href="javascript:void(0)">Change Password</a>
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div><hr>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" id="form" autocomplete="off">
                                        <input name="id" type="text" hidden id="id"/>
                                        <div class="form-body">
                                            <div class="row pr-1 pl-1">
                                                <div class="col-12">
                                                    <div class="form-group row mb-1">
                                                        <div class="col-md-2 text-right">
                                                            <span>Old Password</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" id="old_pass" name="old_pass" class="form-control my-required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row mb-1">
                                                        <div class="col-md-2 text-right">
                                                            <span>New Password</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" id="new_pass" name="new_pass" class="form-control my-required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row mb-1">
                                                        <div class="col-md-2 text-right">
                                                            <span>Retype Password</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" id="retype_pass" name="retype_pass" class="form-control my-required">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="save()">Change Password</button>
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

    @endsection
    
    @section('js')
    <script>
        function checkRequired(){
            var reqlength = $('.my-required').length;
            var value = $('.my-required').filter(function () {
                return this.value != '';
            });
            var empty = "";
            if (value.length >= 0 && (value.length !== reqlength)) {
                empty = "empty";
            }else{
                empty = "not_empty";
            }
            return empty;
        }
        
        function save(){

            var check_req = checkRequired();
            if(check_req === "empty"){
                alertResponse('info', 'Info!', 'Mohon isi field yang kosong');
            }else if($('#new_pass').val() != $('#retype_pass').val()){
                alertResponse('info', 'Info!', 'Password tidak sama');
            }else{
                $.ajax({
                    url : "/change_password/action",
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(response){
                        console.log(response);
                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        console.log("Error json " + errorThrown);
                    }
                });
            }
        }
    </script>
    @endsection