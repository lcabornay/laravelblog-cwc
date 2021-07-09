@extends ('layouts/main')
@section('nav-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Article Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Article Category</li>
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
                            <a href=" {{ route('article_categories.create') }}" class="btn btn-primary">Create Article Category</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @csrf
                        <table id="articleDataTable" class="table table-bordered table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Created By</th>
                                <th></th>
                            </thead>
                            <tbody>
                            @foreach($articleCategories as $articleCategory)
                                <tr>
                                    <td>{{ $articleCategory->name }}</td>
                                    <td> {{$articleCategory->user->username}} </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-sm" href="{{ route('article_categories.edit', $articleCategory) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <button data-id="{{ $articleCategory->id }}" class="btn btn-danger btn-sm delete-article-category" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <th>Name</th>
                                <th>Created By</th>
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