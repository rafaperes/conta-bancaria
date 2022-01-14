@include('layouts.partials.header')

<body class="bg-gradient-muted">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row bg-gradient-primary">
                            <div class="col-lg-6 d-none d-lg-block align-self-center text-center h-100">
                                <i class="fab fa-artstation fa-2x text-white"></i>
                                <h1 class="h4 text-white text-uppercase text-center mt-2">Larabank</h1>
                            </div>
                            <div class="col-lg-6 p-5 bg-white">
                                <h1 class="h4 text-gray-900 mb-4 text-center">Criar conta</h1>
                                <form class="user" method="POST" action="{{ route('store.account') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input id="name" type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Nome">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="cpf" type="text"
                                            class="form-control form-control-user cpf @error('cpf') is-invalid @enderror"
                                            name="cpf" value="{{ old('cpf') }}" placeholder="CPF">
                                        @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="email" type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password" placeholder="Senha" value="{{ old('pasword') }}">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password_confirmation" type="password"
                                            class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" placeholder="Confirmar senha" value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <input type="submit" class="btn btn-success btn-user btn-block" value="Criar conta">
                                </form>

                                <div class="text-center mt-3">
                                    <a href="{{ route('login') }}">Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    @endpush

    @include('layouts.partials.footer')