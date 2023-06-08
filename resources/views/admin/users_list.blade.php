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
                            <li class="breadcrumb-item active">{{$controller_title}}</li>
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
                                <h3 class="card-title">{{$controller_title}}</h3>
                                <div class="card-tools">
                                    <a href="{{ route($controller_name.'.create') }}" class="btn btn-block btn-success btn-xs">
                                        <i class="fas fa-plus"></i> Добавить
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="data_table" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>Имя</th>
                                        <th>Роль</th>
                                        <th>Дата регистрации</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                @if ($item->role == 1)
                                                    Пользователь
                                                @elseif ($item->role == 90)
                                                    Менеджер
                                                @else
                                                    Администратор
                                                @endif
                                            </td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a title="Редактировать" class="btn btn-primary" href="{{ route($controller_name.'.edit', $item->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a title="Удалить" class="btn btn-danger" onclick="if (confirm('Вы точно хотите удалить элемент?')) { $('#delete_form_{{$item->id}}').submit(); }" href="#">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                                <form id="delete_form_{{$item->id}}" method="post" action="{{ route($controller_name.'.destroy', $item->id) }}">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
