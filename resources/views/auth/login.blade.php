@extends('auth.template.index')

@section('content')
    <div class="register-box" style="transform: translateY(-90px)">
        <div class="register-logo">
            <a href="#"><b>Área </b>Administrativa</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body rounded-lg">
                <p class="login-box-msg">Faça login para iniciar sua sessão</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Conectar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{ route('register') }}" class="text-center btn btn-danger btn-block">Ainda não tenho conta</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection
