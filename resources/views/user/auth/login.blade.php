@extends('layouts.user.app')
@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="flex items-center justify-end mt-4">
                    <a class="btn" href="{{ url('user/auth/facebook') }}"
                        style="background: #3B5499; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                        Login with Facebook
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
