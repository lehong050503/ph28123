@extends('templates.appAdmin')
@section('css')
    <!-- third party css -->
    <link href="{{ asset('libs\datatables\dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\datatables\responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\datatables\buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\datatables\select.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endsection
@section('content')


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Green</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Flights</a></li>
                                <li class="breadcrumb-item active">Flights</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Datatables Flights</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div style="display: flex; justify-content:space-around;">
                                <div>
                                   <h4 class="header-title">Database Flights</h4>
                                    <p class="text-muted font-13 mb-4">
                                        The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
                                        that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                    </p>  
                                </div>
                                <a href="{{ route('addFlight') }}" class="btn btn-success  px-3 mb-0 h-50" style="background: #1ABC9C;" >Add</a>
                                  
                            </div>
                            

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Airline</th>
                                        <th>From Airport</th>
                                        <th>To Airport</th>
                                        <th>Departure Time</th>
                                        <th>Arrival Time</th>
                                        <th>Status Flight</th>
                                        <th>Action</th>
                                        <th>Seat</th>
                                        
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($flights as $fly)
                                        
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>
                                            {{-- {{ $fly->airlines->id_airline == $airlines->id_airline ? $fly->airlines->name : '' }} --}}
                                            @foreach ($airlines as $air)
                                                {{ $fly->id_airline == $air->id_airline ? $air->name : '' }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($airport as $air)
                                                {{ $fly->id_form_airport == $air->id_airport ? $air->name : '' }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($airport as $air)
                                                {{ $fly->id_to_airport == $air->id_airport ? $air->name : '' }}
                                            @endforeach
                                        </td>
                                        <td>{{ $fly->departure_time }}</td>
                                        <td>{{ $fly->arrival_time }}</td>
                                        <td>{{ $fly->status_flight }}</td>
                                        <td>
                                            <a href="{{ route('deleteFlight',['id'=>$fly->id_flight]) }}" onclick="return confirm('Are you sure ?');" class="btn btn-danger">Delete</a>
                                            <a href="{{ route('editFlight',['id'=>$fly->id_flight]) }}" class="btn btn-info">Edit</a>
                                        </td>
                                        <td>{{ $fly->seat }}</td>
                                    </tr>
                                    @php
                                        $stt++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        
@endsection

@section('js')

    <!-- third party js -->
    <script src="{{ asset('libs\datatables\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\buttons.html5.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\buttons.flash.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\buttons.print.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.select.min.js') }}"></script>
    <script src="{{ asset('libs\pdfmake\pdfmake.min.js') }}"></script>
    <script src="{{ asset('libs\pdfmake\vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('js\pages\datatables.init.js') }}"></script>

@endsection