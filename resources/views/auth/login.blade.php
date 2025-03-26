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
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>

                  <!--For Message-->
                  @include('auth.layouts.message')

                  <form class="row g-3 needs-validation" action="{{Route('login_check')}}" method="POST" novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" value="{{old('email')}}" class="form-control" id="email" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
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