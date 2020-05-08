    @extends('layouts.main')

    @section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Login/Register</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="login.html">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Login Box Area =================-->
    <section class="login_box_area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="img/login.jpg" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                            <a class="main_btn" href='/register'>Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Log in to enter</h3>
                        <div class="row login_form" id="contactForm">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control inp_height" id="email" placeholder="Email">
                                <p id="err_login_email" class='show_error'></p>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control inp_height" id="password" placeholder="Password">
                                <p id="err_login_password" class='show_error'></p>
                            </div>
                            <div class="col-md-12 form-group">
                                <button id="login_submit_btn" class="btn submit_btn">Log In</button>
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" value="{{csrf_token()}}" id="token">
    <!--================End Login Box Area =================-->

    @endsection
    @section('script')
        <script src="{{asset('js/login/login.js')}}"></script>
    @endsection
