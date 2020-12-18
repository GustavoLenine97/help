@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.login.do') }}">
                        @csrf
                        <div>
                            Email
                            <input name="employee_id" value="{{ old('employee_id') }}">
                        </div>
                    
                        <div>
                            Password
                            <input type="password" name="employee_password">
                        </div>
                    
                        <div>
                            <input type="checkbox" name="remember"> Remember Me
                        </div>
                    
                        <div>
                            <button type="submit">Login</button>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
