@extends('front.layout')

@section('content')

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-signin" method="POST" action="{{ route('register') }}">
                            <h1 class="h3 mb-3 font-weight-normal">Заполните данные для регистрации</h1>

                            <label for="email" class="sr-only">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="name" class="sr-only">ФИО</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="ФИО" required>

                            <label for="password" class="sr-only">Пароль</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="password_confirmation" class="sr-only">Подтвердите пароль</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Подтвердите пароль" required>

                            <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>

                            <p class="mt-5 mb-3 text-muted"><a href="{{ route('login') }}">Войти</a></p>

                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
