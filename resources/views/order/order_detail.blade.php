@extends('templates.app')
@section('content')

<div class="container-fluid booking mt-5 pb-5">
    <div class="container pb-5">

        <div class="row" style="margin-top: 100px;">
            <form action="{{ route('orderTicket',['id'=>$ticket->id_ticket]) }}" method="POST" class="col-12">
                @method('POST')
                @csrf
                <div class="col-12">
                    <div class="card-box">
                        <!-- Logo & title -->
                        <div class="clearfix">
                            <div class="float-left">
                                <img src="assets\images\logo-dark.png" alt="" height="20">
                            </div>
                            <div class="float-right">
                                <h4 class="m-0 d-print-none">View Detail</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <p><b>Hello, {{ $user->username }}</b></p>
                                    <p class="text-muted">Thank you for booking flight tickets on our website. We wish you the best trip. </p>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mt-3">
                            
                            <div class="col-sm-6">
                                {{-- <h4 style="text-align: center;">Passenger information</h4> --}}

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title">Passenger information</h4>
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom01">Full name</label>
                                                        <input type="text" class="form-control" id="validationCustom01" placeholder="Full name" value="{{ $user->full_name }}" required="">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom02">Date of Birth</label>
                                                        <input type="date" class="form-control" id="validationCustom02" value="{{ $user->date_of_birth }}"  required="">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom03">Address</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="{{ $user->address }}" required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom03">Phone</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="{{ $user->phone_number }}"  required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom03">Email</label>
                                                        <input type="email" name="email" class="form-control" id="validationCustom03" value="{{ $user->email }}" required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="validationCustom03">CCCD / Passport</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="{{ $user->cccd_passport }}" placeholder="City" required="">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid city.
                                                        </div>
                                                    </div>
                                                    
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                            </div> <!-- end col -->

                            <div class="col-sm-6">
                                <div class="col-lg-12">
                                    <div class="card">
                                        @foreach ($tickets as $item)
                                            
                                        
                                        <div class="card-body">
                                            <h4 class="header-title">Flight details</h4>
                                                <div class="form-group mb-3">
                                                    <label for="validationCustom01">From</label>
                                                    <span class="form-control">
                                                        @foreach ($flights as $fly)
                                                            @foreach ($airports as $air)
                                                                @if ($item->id_flight == $fly->id_flight)
                                                                    @if ($fly->id_form_airport  == $air->id_airport)
                                                                        {{ $air->city }}
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </span>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="validationCustom02">To</label>
                                                    <span class="form-control">
                                                        @foreach ($flights as $fly)
                                                            @foreach ($airports as $air)
                                                                @if ($item->id_flight == $fly->id_flight)
                                                                    @if ($fly->id_to_airport  == $air->id_airport)
                                                                        {{ $air->city }}
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </span>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group mb-3">
                                                    <label for="validationCustom03">Departure</label>
                                                    <span class="form-control">
                                                        @foreach ($flights as $fly)
                                                            {{ $item->id_flight == $fly->id_flight ? $fly->departure_time : '' }}
                                                        @endforeach
                                                    </span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="validationCustom03">Arrival</label>
                                                    <span class="form-control">
                                                        @foreach ($flights as $fly)
                                                            {{ $item->id_flight == $fly->id_flight ? $fly->arrival_time : '' }}
                                                        @endforeach
                                                    </span>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="validationCustom03">Class</label>
                                                    <span class="form-control">{{ $item->class }} </span>                                               
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="validationCustom03">Seat</label>
                                                    <span class="form-control">{{ $item->seat }}</span>
                                                    
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city.
                                                    </div>
                                                </div>
                                                
                                        </div> <!-- end card-body-->

                                        @endforeach
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div>

                        </div> 
                        <!-- end row -->

                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <br>
                                    <h4>Flight details</h4>
                                    <table class="table mt-4 table-centered">
                                        <thead>
                                            <tr>
                                                
                                                <th>From</th>
                                                <th style="width: 10%">To</th>
                                                <th>Departure</th>
                                                <th>Arrival</th>
                                                <th >Class</th>
                                                <th >Seat</th>
                                                <th>Status Ticket</th>
                                                <th class="text-right">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tickets as $item)
                                                <tr>
                                                    
                                                    <td>

                                                        @foreach ($flights as $fly)
                                                            @foreach ($airports as $air)
                                                                @if ($item->id_flight == $fly->id_flight)
                                                                    @if ($fly->id_form_airport  == $air->id_airport)
                                                                        {{ $air->city }}
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endforeach

                                                    </td>
                                                    <td>

                                                        @foreach ($flights as $fly)
                                                            @foreach ($airports as $air)
                                                                @if ($item->id_flight == $fly->id_flight)
                                                                    @if ($fly->id_to_airport  == $air->id_airport)
                                                                        {{ $air->city }}
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endforeach

                                                    </td>
                                                    <td>

                                                        @foreach ($flights as $fly)
                                                            {{ $item->id_flight == $fly->id_flight ? $fly->departure_time : '' }}
                                                        @endforeach

                                                    </td>
                                                    <td>

                                                        @foreach ($flights as $fly)
                                                            {{ $item->id_flight == $fly->id_flight ? $fly->arrival_time : '' }}
                                                        @endforeach

                                                    </td>
                                                    <td>{{ $item->class }}</td>
                                                    <td>{{ $item->seat }}</td>
                                                    <td>{{ $item->status_ticket }}</td>
                                                    <td class="text-right">$ {{ $item->price }}</td>
                                                </tr>
                                            @endforeach
                                            
                                    

                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row --> --}}

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-5">
                                    <p class="form-row">
                                        <h4 for="">Payment methods</h4>
                                        <div style="margin: 3%">
                                            {{-- <div class="row">
                                                <input type="radio" name="payment" id="input_payment" value="1">
                                                <label style="margin: 3%" for="input_payment">Payment on delivery</label>
                                            </div> --}}
                                            <div class="row">
                                                <input type="radio" name="payment_method" value="Online payment" checked>
                                                <label style="margin: 3%" >Payment via your bank account : <span style="font-weight: 900;">{{ $user->credit_card_no }}</span></label>
                                            </div>
                                        </div>
                                    </p>
                                    
                                </div>
                            </div> <!-- end col -->
                            <br><br>
                            <div class="col-sm-6" style="margin-top: 19px;">
                                <div class="float-right">

                                    <p><b>Quantity : </b> 
                                        <span class="float-right">
                                            <input type="number" class="form-control" name="quantity" style="width:90px;" >
                                        </span> 
                                    </p>
                                    <p><b>Taxes :</b> <span class="float-right">$500</span></p>
                                    {{-- <p><b>Discount (10%):</b> <span class="float-right"> &nbsp;&nbsp;&nbsp; $459.75</span></p> --}}
                                    <h3>$ {{ $ticket->price + $totalPrice }} .00</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="mt-4 mb-1">
                            <div class="text-right d-print-none">
                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                                <a href="{{ route('orderTicket',['id'=>$ticket->id_ticket]) }}" class="btn btn-success waves-effect waves-light">Đặt ngay</a>
                            </div>
                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </form>
        </div>

    </div>
</div>
@endsection