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
                        <li class="breadcrumb-item active">Users</li>
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
                            <a href=" {{ route('users.create') }}" class="btn btn-primary">Create User</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @csrf
                        <table id="userDataTable" class="table table-bordered table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}">
                                        {{ $user->first_name . ' ' . $user->last_name }}
                                        </a>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td> {{$user->email}} </td>
                                    <td> {{ $user->role == 0 ? 'User': 'Admin' }} </td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.show', $user) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <button data-id="{{ $user->id }}" class="btn btn-danger btn-sm delete-user-index" href="#">
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
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