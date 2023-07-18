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
                            <form action="{{ url('/') }}" method="POST" name="sentMessage" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>User Name</span>
                                        <input type="text" class="form-control p-4" name="username" id="username" placeholder="User Name"
                                            required="required" data-validation-required-message="Please enter User name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>Full Name</span>
                                        <input type="text" class="form-control p-4" name="full_name" id="full_name" placeholder="Full Name"
                                            required="required" data-validation-required-message="Please enter Full name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>Email</span>
                                        <input type="email" class="form-control p-4" name="email" id="email" placeholder="Email"
                                            required="required" data-validation-required-message="Please enter Email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>Credit Card No</span>
                                        <input type="text" class="form-control p-4" name="credit_card_no" id="credit_card_no" placeholder="Credit Card No"
                                            required="required" data-validation-required-message="Please enter Credit card no" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>Nationality</span>
                                        <input type="text" class="form-control p-4" name="nationality" id="nationality" placeholder="Nationality"
                                            required="required" data-validation-required-message="Please enter Nationality" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>CCCD / Passport</span>
                                        <input type="text" class="form-control p-4" name="cccd_passport" id="cccd_passport" placeholder="CCCD / Passport"
                                            required="required" data-validation-required-message="Please enter Cccd / Passport" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>Password</span>
                                        <input type="password" class="form-control p-4" name="password" id="password" placeholder="Password"
                                            required="required" data-validation-required-message="Please enter Password" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>Repeat Password</span>
                                        <input type="password" class="form-control p-4" name="repeat_password" id="repeat_password" placeholder="Repeat Password"
                                            required="required" data-validation-required-message="Please enter Repeat Password" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <span>Date Of Birth</span>
                                        <input type="date" class="form-control p-4" name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth"
                                            required="required" data-validation-required-message="Please enter Date of birth" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <span>Phone Number</span>
                                        <input type="text" class="form-control p-4" name="phone_number" id="phone_number" placeholder="Phone Number"
                                            required="required" data-validation-required-message="PPlease enter Phone number" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <span>Address</span>
                                    <input type="text" class="form-control p-4" name="address" id="address" placeholder="Address"
                                        required="required" data-validation-required-message="Please enter Address" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                {{-- <div class="control-group">
                                    <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message"
                                        required="required"
                                        data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div> --}}
                                <div class="text-center">
                                    <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">SIGN UP</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
@endsection