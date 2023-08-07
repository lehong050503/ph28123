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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tickets</a></li>
                    <li class="breadcrumb-item active">Tickets</li>
                </ol>
            </div>
            <h4 class="page-title">Datatables Tickets</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title">Eidt Tickets</h4>
            <p class="sub-header">
                Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
            </p>

            <form class="parsley-form" id="postEditTicket" action="{{ route('editTicket',['id'=>$tickets->id_ticket])}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Flights</label>
                    <div>
                    
                        <select name="id_flight" class="selectpicker form-control" data-style="btn-light">
                            <option value="">Choose which one</option>
                            @foreach ($flights as $fly)
                                <option value="{{ $fly->id_flight }}" {{ $tickets->id_flight == $fly->id_flight ? 'selected' : '' }}>{{ $fly->status_flight }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <!-- Nhúng đoạn này vào view add hoặc edit -->
                <div class="form-group">
                    <label>Image</label>
                    
                    <div class="col-md-9 col-sm-8">
                        <div class="row">
                            <div class="col-xs-6">
                                <img id="mat_truoc_preview" src="{{ $tickets->image?''.Storage::url($tickets->image):'' }}"
                                    style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                <input type="file" name="image" accept="image/*"
                                    class="form-control-file @error('logo_url') is-invalid @enderror" id="cmt_truoc">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Class</label>
                    <div>
                    
                        <select name="class" class="selectpicker form-control" data-style="btn-light">
                            <option value="Economy class" @if ( $tickets->class == 'Economy class' ) selected @endif>Economy class</option>
                            <option value="Business class" @if ( $tickets->class == 'Business class' ) selected @endif>Business class</option>
                            <option value="Firt class" @if ( $tickets->class == 'Firt class' ) selected @endif>Firt class</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="{{ $tickets->price }}" placeholder="Type something">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Seat</label>
                    <input type="text" class="form-control" name="seat" value="{{ $tickets->seat }}" placeholder="Type something">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Status Ticket</label>
                    <input type="text" class="form-control" name="status_ticket" value="{{ $tickets->status_ticket }}" placeholder="Type something">
                    <p class="help-block text-danger"></p>
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

    <script>
        $(function(){
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_truoc").change(function () { // id của input file
                readURL(this, '#mat_truoc_preview'); // id của anh
            });

        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\TicketRequest','#postEditTicket') !!}
    
@endsection