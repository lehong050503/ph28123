@extends('templates.app')
@section('content')
        <!-- Contact Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mb-3 pb-3">
                    <h1>REGISER NOW</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-form bg-white" style="padding: 30px;">
                            <div id="success"></div>
                            <form action="{{ route('register') }}" method="POST" id="registerForm" >
                                @csrf

                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>User Name</span>
                                        <input type="text" class="form-control p-4" name="username" id="username" placeholder="User Name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>Full Name</span>
                                        <input type="text" class="form-control p-4" name="full_name" id="full_name" placeholder="Full Name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>Email</span>
                                        <input type="email" class="form-control p-4" name="email" id="email" placeholder="Email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>Credit Card No</span>
                                        <input type="text" class="form-control p-4" name="credit_card_no" id="credit_card_no" placeholder="Credit Card No" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>Nationality</span>
                                        <input type="text" class="form-control p-4" name="nationality" id="nationality" placeholder="Nationality" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>CCCD / Passport</span>
                                        <input type="text" class="form-control p-4" name="cccd_passport" id="cccd_passport" placeholder="CCCD / Passport" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>Password</span>
                                        <input type="password" class="form-control p-4" name="password" id="password" placeholder="Password" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>Repeat Password</span>
                                        <input type="password" class="form-control p-4" name="repeat_password" id="repeat_password" placeholder="Repeat Password" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>Date Of Birth</span>
                                        <input type="date" class="form-control p-4" name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>Phone Number</span>
                                        <input type="text" class="form-control p-4" name="phone_number" id="phone_number" placeholder="Phone Number" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <span>Address</span>
                                    <input type="text" class="form-control p-4" name="address" id="address" placeholder="Address" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                {{-- <div class="control-group">
                                    <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message"
                                        required="required"
                                        data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div> --}}
                                <div class="text-center">
                                    <button class="btn btn-primary py-3 px-4" type="submit">SIGN UP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
@endsection