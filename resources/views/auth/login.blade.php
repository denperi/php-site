@extends('front.layout')

@section('content')

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            <h1 class="h3 mb-3 font-weight-normal">Введите Email и пароль для входа</h1>
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                            <label for="password" class="sr-only">Пароль</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
                            <p class="mt-5 mb-3 text-muted"><a href="{{ route('register') }}">Зарегистрироваться</a></p>

                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
