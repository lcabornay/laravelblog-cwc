@extends ('layouts/main')

@section ('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Update User</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form" action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- input states -->
                    <div class="form-group">
                        <label class="col-form-label required" for="inputSuccess" ><i class="fas fa-user-circle"></i> First Name </label>
                        <input type="text" value= "{{ $user->first_name }}" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-danger' : '' }}" placeholder="Enter ..."  autofocus>
                        @error('first_name')
                        <p class="alert alert-danger"> {{ $errors->first('first_name') }}</p>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label class="col-form-label required" for="inputSuccess"><i class="fas fa-user-circle"></i> Last Name </label>
                        <input type="text" value= "{{ $user->last_name }}" name="last_name" class="form-control required" placeholder="Enter ..." autofocus>
                        @error('last_name')
                        <p class="alert alert-danger"> {{ $errors->first('last_name') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-user-circle"></i> Email </label>
                        <input type="email" value= "{{ $user->email }}" name="email" class="form-control" placeholder="Enter ..." >
                        @if ($errors->has('email'))
                            <p class="alert alert-danger"> {{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-user-circle"></i> Username </label>
                        <input type="text" value= "{{ $user->username }}" name="username" class="form-control" placeholder="Enter ..." >
                        @if ($errors->has('user_name'))
                            <p class="alert alert-danger"> {{ $errors->first('user_name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-user-circle"></i> Password </label>
                        <input type="password" value= "" name="password" class="form-control" placeholder="Enter ..." >
                        @if ($errors->has('password'))
                            <p class="alert alert-danger"> {{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="0">
                            <label class="form-check-label">User</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="1" checked>
                            <label class="form-check-label">Admin</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 pull-right">
                                <button type="Submit" class="form-control btn btn-primary"> Submit </button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="form-control btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
@endsection