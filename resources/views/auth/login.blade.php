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
                            <div class="col-lg-6 align-self-center text-center h-100">
                                <i class="fab fa-artstation fa-2x text-white"></i>
                                <h1 class="h4 text-white text-uppercase  mt-2">Larabank</h1>
                            </div>
                            <div class="col-lg-6 bg-white p-5">
                                <h1 class="h4 text-gray-900 mb-4 text-center">Bem vindo</h1>

                                @component('alerts/alert')

                                @endcomponent

                                <form class="user" method="POST" action="{{ route('authenticate') }}">
                                    @csrf

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
                                            name="password" placeholder="Senha">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <input type="submit" class="btn btn-success btn-user btn-block" value="Login">
                                </form>

                                <div class="text-center mt-3">
                                    <a href="{{ route('create.account') }}">Criar conta</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('layouts.partials.footer')