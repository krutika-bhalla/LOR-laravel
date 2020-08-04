@extends('layouts.fapp')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;800&display=swap" rel="stylesheet">
@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 style="text-align: center;  font-family: 'Playfair Display', serif; text-decoration-line: underline; text-decoration-style: solid; ">
                            Staff Register
                        </h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('faculty-credentials') }}"  style="font-family: 'Playfair Display', serif;">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            {{--                        <div class="form-group row">--}}
                            {{--                            <label for="select" class="col-md-4 col-form-label text-md-right">{{ __('Select') }}</label>--}}
                            {{--                            <div class="col-md-6">--}}

                            {{--                                <select id="select" type="select" class="form-control @error('select') is-invalid @enderror" name="user_type" required>--}}
                            {{--                                    <option selected>Select</option>--}}
                            {{--                                    <option value="Student">Student</option>--}}
                            {{--                                    <option value="Staff">Staff</option>--}}
                            {{--                                </select>--}}
                            {{--                                @error('select')--}}
                            {{--                                <span class="invalid-feedback" role="alert">--}}
                            {{--                                            <strong>{{ $message }}</strong>--}}
                            {{--                                        </span>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>
                                                    </div>--}}


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
