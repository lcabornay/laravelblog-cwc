@extends ('layouts/main')
@section('nav-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Articles </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Articles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section ('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row fa-pull-right">
                            <a href=" {{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @csrf
                        <table id="articleDataTable" class="table table-bordered table-hover">
                            <thead>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th></th>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>
                                        <a href="{{ asset('uploads/images') . '/' . $article->image_path }}"><img src="{{ asset('storage/images') . '/' . $article->image_path }}" width="50px" height="50px">&nbsp;</a>
                                    </td>
                                    <td><a href="{{ route('articles.show', $article) }}">{{ $article->title }} </a></td>
                                    <td> {{$article->slug}} </td>
                                    <td> {{ $article->article_category->name }} </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('articles.show', $article) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('articles.edit', $article) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <button data-id="{{ $article->id }}" class="btn btn-danger btn-sm delete-article-btn" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th></th>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection