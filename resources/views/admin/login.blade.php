@include('admin.inc.header')
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                @include('admin.message')
                <div class="brand-logo">
                  <img src="{{asset('admin-assets/images/logo.svg')}}">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="POST" action="{{route('admin.auth')}}">
                  @csrf
                  <div class="form-group">
                    <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control form-control-lg @error('email')
                        is-invalid
                    @enderror" id="InputEmail1" placeholder="Username">
                    @error('email')
                    <p class="invlaid-feedback">
                     {{$message}}
                    </p>
                @enderror
                    
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control form-control-lg @error('password')
                        is-invalid
                    @enderror" id="InputPassword1" placeholder="Password">
                    @error('password')
                    <p class="invlaid-feedback">
                     {{$message}}
                    </p>
                @enderror
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      
    </div>
    
    @include('admin.inc.footer')