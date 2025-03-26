@extends('auth.layouts.welcome')
@section('authsection')
<div class="d-flex justify-content-between px-3 py-2" style="background-color: #ffffff; border-bottom: 1px solid #b8b8b8">
  <div class="d-flex justify-content-center">
    <a href="{{Route('login')}}" class="logo d-flex align-items-center w-auto">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Task-Management-System</span>
    </a>
  </div>
  <div>
    <a href="{{Route('signup')}}" class="btn btn-sm btn-primary">Sign-up</a>
    <a href="{{Route('login')}}" class="btn btn-sm btn-primary">Login</a>
  </div>
</div>
<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Task-Management-System</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Signup New Account</h5>
                    <p class="text-center small">Enter your details to signup</p>
                  </div>

                  <!--For Message-->
                  @include('auth.layouts.message')

                  <form class="row g-3 needs-validation" action="{{Route('sign_up')}}" method="POST" novalidate>
                    @csrf

                    <div class="col-12 col-lg-6">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" required>
                      <div class="text-danger">{{$errors->first('name')}}</div>
                    </div>

                    <div class="col-12 col-lg-6">
                      <label for="yourUsername" class="form-label">Email</label>
                      <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" required>
                      <div class="text-danger">{{$errors->first('email')}}</div>
                    </div>

                    <div class="col-12 col-lg-6">
                      <label for="phone" class="form-label">phone</label>
                      <input type="number" name="phone" value="{{old('phone')}}" class="form-control" id="phone" required>
                      <div class="text-danger">{{$errors->first('phone')}}</div>
                    </div>

                    <div class="col-12 col-lg-6">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="text-danger">{{$errors->first('password')}}</div>
                    </div>

                    <div class="col-12 col-lg-6">
                      <label for="cpassword" class="form-label">Password</label>
                      <input type="password" name="cpassword" class="form-control" id="cPassword" required>
                      <div class="text-danger">{{$errors->first('cPassword')}}</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      {{-- <p class="small mb-0">Forgot Password? <a href="{{Route('forgot')}}">Forgot accoount</a></p> --}}
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a target="blank" href="https://www.facebook.com/shartho.kundu">Sonaton Kundu</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
@endsection