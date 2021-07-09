@extends ('layouts/main')

@section ('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Create User</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form" action="{{ action('UsersController@store') }}" method="post">
                    <!-- input states -->
                    <div class="form-group">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <label class="col-form-label required" for="inputSuccess"><i class="fas fa-user-circle"></i> First Name </label>
                        <input type="text" value= "{{old('first_name')}}" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-danger' : '' }}" placeholder="Enter ..."  autofocus>
                        @error('first_name')
                            <p class="alert alert-danger"> {{ $errors->first('first_name') }}</p>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label class="col-form-label required" for="inputSuccess"><i class="fas fa-user-circle"></i> Last Name </label>
                        <input type="text" value= "{{old('last_name')}}" name="last_name" class="form-control required" placeholder="Enter ..." autofocus>
                        @error('last_name')
                            <p class="alert alert-danger"> {{ $errors->first('last_name') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-user-circle"></i> Email </label>
                        <input type="email" value= "{{old('email')}}" name="email" class="form-control" placeholder="Enter ..." >
                        @if ($errors->has('email'))
                            <p class="alert alert-danger"> {{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-user-circle"></i> Username </label>
                        <input type="text" value= "{{old('username')}}" name="username" class="form-control" placeholder="Enter ..." >
                        @if ($errors->has('username'))
                            <p class="alert alert-danger"> {{ $errors->first('username') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess"><i class="fas fa-user-circle"></i> Password </label>
                        <input type="password" value= "{{old('password')}}" name="password" class="form-control" placeholder="Enter ..." >
                        @if ($errors->has('password'))
                            <p class="alert alert-danger"> {{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Select Role</label>
                        <select class="form-control" name="role">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 pull-right">
                                <button type="Submit" class="form-control btn btn-primary"> Submit </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
@endsection