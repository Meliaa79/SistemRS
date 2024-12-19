@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center mt-5">
                <h2>Login Aplikasi</h2>
                <p>Silahkan isi formulir berikut untuk registrasi aplikasi</p>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body text-start">
                                <form action="{{ route('login.submit') }}" method="post">
                                    @csrf
                                    <label>Alamat Email</label>
                                    <input type="text" name="email" class="form-control mb-2">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control mb-2">
                                    <button class="btn btn-primary">Submit Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
