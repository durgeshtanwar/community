@extends('layouts.app')

@section('content')
<div class="wrapper" style="background:#DEF3FD">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="register-box 4">
                <div class="register-logo">
                        <a href="#"><b>Shakdwipiya</b> Pariwar</a>
                      </div>
            <div class="card elevation-4">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Full Name"autocomplete="name" autofocus >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> --}}

                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> --}}

                            <div class="col-md-12">
                                <input id="family_cast" type="text" class="form-control @error('family_cast') is-invalid @enderror" name="family_cast" value="{{ old('family_cast') }}" required autocomplete="family_cast" placeholder="family_cast">

                                @error('family_cast')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="gotra" class="col-md-4 col-form-label text-md-right">{{ __('Gotra') }}</label> --}}

                            <div class="col-md-12">
                                <input id="gotra" type="text" class="form-control @error("gotra") is-invalid @enderror" name="gotra" value="{{ old("gotra") }}" required autocomplete="gotra" placeholder="Gotra">

                                @error("gotra")
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

   
                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group row">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
    
                                <div class="col-md-12">
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" autocomplete="code" placeholder="Invitation Code">
    
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <p>Already a Member Click <a href="/login">Here</a> to login</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

   
  </div>
</div>
@endsection
