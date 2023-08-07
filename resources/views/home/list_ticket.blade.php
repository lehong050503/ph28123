@extends('templates.app')
@section('content')
<div class="container-fluid booking mt-5 pb-5">
    <div class="container pb-5">
    
        @foreach ($tickets as $item)

        <div class="ticket">
            <div class="ticket-header">
                <h1>
                    @foreach ($flights as $fly)
                        @foreach ($arilines as $air)
                            @if ($item->id_flight == $fly->id_flight)
                                @if ($fly->id_airline  == $air->id_airline)
                                    {{ $air->name }}
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </h1>
            </div>
            <div class="ticket-body">
                <div class="left">
                    <div class="row">
                        <div class="col ">
                            <span>From</span>
                            <br>
                            <span class="item-value">
                                
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
                        </div>
                        <div class="col ">
                            <span>To</span>
                            <br>
                            <span class="item-value">
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
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <span>Departure</span>
                            <br>
                            <span class="item-value">
                                @foreach ($flights as $fly)
                                    {{ $item->id_flight == $fly->id_flight ? $fly->departure_time : '' }}
                                @endforeach
                            </span>
                        </div>
                        <div class="col">
                            <span>Arrival</span>
                            <br>
                            <span class="item-value">
                                @foreach ($flights as $fly)
                                    {{ $item->id_flight == $fly->id_flight ? $fly->arrival_time : '' }}
                                @endforeach
                            </span>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col">
                            <span>Flight</span>
                            <span class="ticket-body-item-value">AA1234</span>
                        </div>
                        <div class="col">
                            <span>Class</span>
                            <span class="ticket-body-item-value">Business</span>
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="col">
                            <span>Class</span>
                            <br>
                            <span class="item-value">{{ $item->class }}</span>
                        </div>
                        {{-- <div class="col">
                            <span>Passenger</span>
                            <br>
                            <span class="ticket-body-item-value">John Doe</span>
                        </div> --}}
                        <div class="col">
                            <span>Seat</span>
                            <br>
                            <span class="item-value">{{ $item->seat }}</span>
                        </div>
                        {{-- <div class="col">
                            <span>Baggage</span>
                            <span class="ticket-body-item-value">2 pieces</span>
                        </div> --}}
                    </div>
                </div>
                <div class="right">
                    <div class="col">
                        <span>Price</span>
                        <span class="item-value">$ {{ $item->price }} </span>
                    </div>
                    <div class="col">
                        <a href="{{ route('getOrderTicket',['id'=>$item->id_ticket])}}" class="btn btn-primary dat">Chọn</a>
                    </div>
                </div>
            </div>
            <div class="ticket-footer">
                <p>Please arrive at the airport at least 2 hours prior to departure</p>
            </div>
        </div>

        @endforeach

    </div>
</div>

@endsection