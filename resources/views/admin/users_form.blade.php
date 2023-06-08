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
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
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
                                    @if ($type == 'add')
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{$item->email}}" required />
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{$item->email}}" disabled />
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="role">Роль</label>
                                        <select class="custom-select form-control-border" id="role" name="role">
                                            <option value="1" @if ($item->role == 1) selected @endif>Пользователь</option>
                                            <option value="90" @if ($item->role == 90) selected @endif>Менеджер</option>
                                            <option value="100" @if ($item->role == 100) selected @endif>Администратор</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Имя</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Пароль</label>
                                        <input type="password" class="form-control" id="password" name="password" @if ($type == 'add') required @endif>
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
