@extends('templates.appAdmin')
@section('css')
    <!-- Plugins css-->
    <link href="assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.css" rel="stylesheet">
    <link href="assets\libs\switchery\switchery.min.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\multiselect\multi-select.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\select2\select2.min.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\bootstrap-select\bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css" rel="stylesheet">
@endsection
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Green</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
            <h4 class="page-title">Datatables Users</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title">Edit Account</h4>
            <p class="sub-header">
                Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
            </p>

            <form class="parsley-form" id="postEditUser" action="{{ route('editUser',['id'=>$user->id])}}" method="post">
                @csrf

                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Type something">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="full_name" value="{{ $user->full_name }}" placeholder="Type something">
                    
                </div>
                <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}" placeholder="Type something">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" parsley-type="email" placeholder="Enter a valid e-mail">
                    </div>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <div>
                        <input type="text" class="form-control" name="address" value="{{ $user->address }}" placeholder="Type something">
                    </div>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <div>
                        <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" placeholder="Enter only digits">
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div>
                        <input type="password" name="password"  class="form-control" placeholder="Password">
                    </div>
                    <div class="mt-2">
                        <input type="password" name="new_password"  class="form-control"  placeholder="New Password">
                    </div>
                </div>
                <div class="form-group">
                    <label>Credit Card No</label>
                    <div>
                        <input type="text" class="form-control" name="credit_card_no" value="{{ $user->credit_card_no }}" placeholder="Enter only numbers">
                    </div>
                </div>
                <div class="form-group">
                    <label>Nationality</label>
                    <div>
                        <input type="text" class="form-control" name="nationality" value="{{ $user->nationality }}" placeholder="Enter alphanumeric value">
                    </div>
                </div>
                <div class="form-group">
                    <label>CCCD / Passport</label>
                    <div>
                        <input type="text" class="form-control" name="cccd_passport" value="{{ $user->cccd_passport }}" placeholder="Enter alphanumeric value">
                    </div>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <div>
                        <select name="role" class="selectpicker form-control" data-style="btn-light">
                            <option value="0" @if ( $user->role == 0 ) selected @endif >User</option>
                            <option value="1" @if ( $user->role == 1 ) selected @endif>Admin</option>
                            {{-- <option value="1">Staff</option> --}}
                        </select>

                    </div>
                </div>
                <div class="form-group mb-0">
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light">
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    

</div>
<!-- end row -->
@endsection
@section('js')
    <!-- Validation js (Parsleyjs) -->
    <script src="assets\libs\parsleyjs\parsley.min.js"></script>

    <!-- validation init -->
    <script src="assets\js\pages\form-validation.init.js"></script> 
    
    <!-- Plugins Js -->
    <script src="assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.min.js"></script>
    <script src="assets\libs\switchery\switchery.min.js"></script>
    <script src="assets\libs\multiselect\jquery.multi-select.js"></script>
    <script src="assets\libs\jquery-quicksearch\jquery.quicksearch.min.js"></script>
    <script src="assets\libs\select2\select2.min.js"></script>
    <script src="assets\libs\bootstrap-select\bootstrap-select.min.js"></script>
    <script src="assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js"></script>
    <script src="assets\libs\jquery-mask-plugin\jquery.mask.min.js"></script>
    
@endsection