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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lights</a></li>
                    <li class="breadcrumb-item active">Lights</li>
                </ol>
            </div>
            <h4 class="page-title">Datatables Lights</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title">Add New Lights</h4>
            <p class="sub-header">
                Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
            </p>

            <form class="parsley-form" id="postEditFlight" action="{{ route('editFlight',['id'=>$flights->id_flight])}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Airline</label>
                    <div>
                    
                        <select name="id_airline" class="selectpicker form-control" data-style="btn-light">
                            <option value="0">Choose which one</option>
                            @foreach ($airlines as $airline)
                                <option value="{{ $airline->id_airline }}" @selected($flights->id_airline == $airline->id_airline) >{{ $airline->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label>From Airport</label>
                    <div>
                        <select id="select1" onchange="disableSelectedOption1()" name="id_form_airport" class="selectpicker form-control" data-style="btn-light">
                            <option value="0">Choose which one</option>
                            @foreach ($airport as $air)
                                <option value="{{ $air->id_airport }}" {{ $flights->id_form_airport == $air->id_airport ? 'selected' : '' }} >{{ $air->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label>To Airport</label>
                    <div>
                        <select id="select2" onchange="disableSelectedOption2()" name="id_to_airport" class="selectpicker form-control" data-style="btn-light">
                            <option value="0">Choose which one</option>
                            @foreach ($airport as $air)
                                <option value="{{ $air->id_airport }}" {{ $flights->id_to_airport == $air->id_airport ? 'selected' : '' }} >{{ $air->name }}</option>
                            @endforeach
                            
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label>Departure Time</label>
                    <input type="text" class="form-control" value="{{ $flights->departure_time }}" name="departure_time" data-toggle="input-mask" data-mask-format="00/00/0000 00:00:00">
                    <br><span class="font-13 text-muted">e.g "DD/MM/YYYY HH:MM:SS"</span> 
                </div>
                <div class="form-group">
                    <label>Arrival Time</label>
                    <input type="text" class="form-control" value="{{ $flights->arrival_time }}" name="arrival_time" data-toggle="input-mask" data-mask-format="00/00/0000 00:00:00">
                    <br><span class="font-13 text-muted">e.g "DD/MM/YYYY HH:MM:SS"</span>
                </div>
                <div class="form-group">
                    <label>Seat</label>
                    <input type="text" value="{{ $flights->seat }}" name="seat" class="form-control" placeholder="Type something">
                    
                </div>
                <div class="form-group">
                    <label>Status Flight</label>
                    <textarea name="status_flight" class="form-control" cols="10" placeholder="Type something">{{ $flights->status_flight }}</textarea>
                    
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

    {!! JsValidator::formRequest('App\Http\Requests\FlightRequest','#postEditFlight') !!}

    <script>
        
        function disableSelectedOption1() {
            // Lấy phần tử select
            var selectElement = document.getElementById("select1");
            // Lấy tùy chọn đã được chọn
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            // Kiểm tra xem tùy chọn đã được chọn có giá trị không
            if (selectedOption.value !== "") {
                // Vô hiệu hóa tùy chọn đã chọn
                selectedOption.disabled = true;
            }
        }
        function disableSelectedOption2() {
            // Lấy phần tử select
            var selectElement = document.getElementById("select2");
            // Lấy tùy chọn đã được chọn
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            // Kiểm tra xem tùy chọn đã được chọn có giá trị không
            if (selectedOption.value !== "") {
                // Vô hiệu hóa tùy chọn đã chọn
                selectedOption.disabled = true;
            }
        }

    </script>
@endsection