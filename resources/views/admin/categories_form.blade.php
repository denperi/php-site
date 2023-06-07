@extends('admin.layout')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$controller_title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route($controller_name.'.index')}}">{{$controller_title}}</a></li>
                            <li class="breadcrumb-item active">
                                @if ($type == 'add')
                                    Создание
                                @else
                                    Редактирование
                                @endif
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    @if ($type == 'add')
                                        Создание
                                    @else
                                        Редактирование
                                    @endif
                                </h3>
                            </div>
                            <form method="post" @if ($type == 'add') action="{{ route($controller_name.'.store') }}" @else action="{{ route($controller_name.'.update', $item->id) }}" @endif enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Заголовок</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{$item->title}}" required />
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                </div>

                                @if ($type == 'edit')
                                    {{ method_field('PUT') }}
                                @endif
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
