@extends('front.layout')

@section('content')

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{$event->title}}</h1>

                        <p>Дата: {{$event->date}}</p>
                        <p>Адрес: {{$event->address}}</p>
                        <p>Стоимость: {{$event->price}}</p>

                        {!! $event->description !!}
                    </div>
                    <div class="col-md-6">
                        <form class="form-signin" method="POST" action="{{ route('event_registration', [$event->id]) }}">
                            <h2 class="h3 mb-3 font-weight-normal">Записаться на мероприятие</h2>
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" @if (Auth::check()) value="{{Auth::user()->email}}" @endif required autofocus>
                            <label for="name" class="sr-only">Имя</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Имя" @if (Auth::check()) value="{{Auth::user()->name}}" @endif required>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Записаться</button>

                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
