@extends('backend-layouts.auth-master')

@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-7 mx-auto mt-5">
          <div class="card radius-10">
            <div class="card-body p-4">
              <div class="text-center">
                <h4>Sign Up</h4>
                <p>Creat New account</p>
              </div>
              <form class="form-body row g-3" method="post" action="{{ route('register.perform') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="col-12 col-lg-12">
                  <div class="d-grid gap-2">
                    <a href="javascript:;" class="btn border border-2 border-dark"><img src="https://flid.org/rd/assets/img/icon/google.png" width="20" alt="" /><span class="ms-3 fw-500">Sign in with Google</span></a>                    
                  </div>
                </div>
                <div class="col-12 col-lg-12">
                  <div class="position-relative border-bottom my-3">
                    <div class="position-absolute seperator-2 translate-middle-y">OR</div>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputName" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="inputName" placeholder="Your name" required="required">
                  @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="col-12">
                  <label for="inputEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail" placeholder="abc@example.com" required="required">
                  @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="col-12">
                  <label for="inputPassword"  class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="inputPassword" placeholder="Your password" required="required">
                  @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="col-12">
                    <label for="inputPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                  </div>
                <div class="col-12 col-lg-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required>
                    <label class="form-check-label" for="flexCheckChecked">
                      I agree the Terms and Conditions
                    </label>
                  </div>
                </div>
                <div class="col-12 col-lg-12">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Sign Up</button>
                  </div>
                </div>
                <div class="col-12 col-lg-12 text-center">
                  <p class="mb-0">Already have an account? <a href="{{ route('login.show') }}">Sign in</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
