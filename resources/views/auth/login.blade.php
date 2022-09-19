@extends('auth.template.index')

@section('content')
    <div class="card">
        @if(session('message'))
        <div class="alert alert-danger my-3 mx-3">
            <h5>Atenção ao error</h5>
            {{ session('message') }}
        </div>
        @endif
        <div class="card-body login-card-body">
            <p class="login-box-msg">Faça login para iniciar sua sessão</p>

            <form action="{{ route('login') }}" method="post" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input 
                        type="text" 
                        name="username"
                        value="{{ old('username') }}"
                        class="form-control @error('username') is-invalid @enderror" 
                        placeholder="Nome de usuário"
                        autofocus
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('username')
                <small class="text-danger">{{ $message }}</small>                    
                @enderror
                <div class="input-group mt-3">
                    <input 
                        type="password" 
                        name="password" 
                        class="form-control @error('username') is-invalid @enderror" 
                        placeholder="Senha" 
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <small class="text-danger">{{ $message }}</small>                    
                @enderror
                <div class="row">
                    <div class="col-8 mt-3">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Lembre me
                            </label>
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
