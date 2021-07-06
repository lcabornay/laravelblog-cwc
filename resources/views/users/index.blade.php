@extends ('layouts/main')

@section ('content')
    <h2>List of Users</h2>
    <section class="content">
        <div class="card ml-2 mr-3">
            <div class="card-body">
                <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create User</a>
                <table id="employeesTable" class="table table-bordered table-hover">
                    <thead class="bg-dark">
                        <th style="width: 5%">
                            Name
                        </th>
                        <th style="width: 20%">
                            Username
                        </th>
                        <th style="width: 20%">
                            Email
                        </th>
                        <th style="width: 20%">
                            Role
                        </th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}">
                                    {{ $user->first_name . ' ' . $user->last_name }}
                                </a>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <p>{{ $user->username }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <p>{{$user->email}}</p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="row">
                                    <div class="col-6">
                                        <p>{{ $user->role == 0 ? 'User': 'Admin' }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection