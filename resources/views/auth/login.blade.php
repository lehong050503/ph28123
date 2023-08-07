@extends('templates.app')
@section('content')


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1>LOGIN YOUR ACCOUNT</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success" style="margin-bottom: 20px;">
                            @isset($msg_success)
                                <h3 class="text-success">{{ $msg_success }}</h3>
                            @endisset
                            @isset($msg_fail)
                                <h3 class="text-danger">{{ $msg_fail }}</h3>
                            @endisset
                        </div>
                        <form action="{{ route('login') }}" method="POST" id="loginForm" >
                            @csrf

                            <div class="control-group">
                                <span>Email</span>
                                <input type="email" class="form-control p-4" name="email" id="email" placeholder="Your Email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <span>Password</span>
                                <input type="password" class="form-control p-4" name="password" id="password"  placeholder="Your Password" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit">SIGN IN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
@section('request')
    {!! JsValidator::formRequest('App\Http\Requests\UserRequest','#loginForm') !!}
@endsection