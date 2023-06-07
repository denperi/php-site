@extends('front.layout')

@section('content')

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">
                                        {{$event->title}}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('event', [$event->id]) }}" class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                                        </div>
                                        <small class="text-muted">{{$event->date}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>

@endsection
