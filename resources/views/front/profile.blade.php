@extends('front.layout')

@section('content')

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-signin" method="POST" action="{{ route('profile_save') }}">
                            <h1 class="h3 mb-3 font-weight-normal">Редактирование профиля</h1>

                            <label for="email" class="sr-only">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}" disabled>

                            <label for="name" class="sr-only">ФИО</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="ФИО" value="{{$user->name}}" required>

                            <label for="password" class="sr-only">Пароль</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Пароль">

                            <button class="btn btn-lg btn-primary btn-block" type="submit">Сохранить</button>

                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
