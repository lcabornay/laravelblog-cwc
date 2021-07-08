@extends ('layouts/main')
@section('nav-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users List</h1>
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
                        <h3 class="card-title">Category</h3>
                        <div class="row fa-pull-right">
                            <a href=" {{ route('article_categories.create') }}" class="btn btn-primary">Create Article Category</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="articleDataTable" class="table table-bordered table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Created By</th>
                            </thead>
                            <tbody>
                            @foreach($articleCategories as $articleCategory)
                                <tr>
                                    <td>{{ $articleCategory->name }}</td>
                                    <td> {{$articleCategory->user->username}} </td>
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