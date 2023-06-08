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
                                    <div class="form-group">
                                        <label for="title">Заголовок</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{$item->title}}" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Категория</label>
                                        <select class="custom-select form-control-border" id="category_id" name="category_id">
                                            <option value="0" @if ($item->category_id == 0) selected @endif>Нет</option>
                                            @foreach(\App\Category::all() as $category)
                                                <option value="{{$category->id}}" @if ($item->category_id == $category->id) selected @endif>{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <textarea class="form-control" rows="3" name="description" id="description">{{$item->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Стоимость</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{$item->price}}" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Дата проведения</label>
                                        <input type="text" class="form-control date-input" id="date" name="date" value="{{$item->date}}" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Адрес проведения</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{$item->address}}" required />
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="image">Фото</label>
                                                <input type="file" class="form-control" id="image" name="image" />
                                            </div>
                                            <div class="col-2">
                                                @if ($item->image)
                                                    <img src="/upload{{$item->image}}" class="img-fluid" />
                                                @endif
                                            </div>
                                        </div>
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

    <script>
        CKEDITOR.replace('description',{
            'filebrowserBrowseUrl':'/kcfinder/browse.php?type=files',
            'filebrowserImageBrowseUrl':'/kcfinder/browse.php?type=images',
            'filebrowserFlashBrowseUrl':'/kcfinder/browse.php?type=flash',
            'filebrowserUploadUrl':'/kcfinder/upload.php?type=files',
            'filebrowserImageUploadUrl':'/kcfinder/upload.php?type=images',
            'filebrowserFlashUploadUrl':'/kcfinder/upload.php?type=flash',
            'language': 'ru',
        });
    </script>

@endsection
