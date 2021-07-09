@extends ('layouts/main')

@section ('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Create Article Category</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form" action="{{ action('ArticleCategoriesController@store') }}" method="post">
                    <!-- input states -->
                    <div class="form-group">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <label class="col-form-label required" for="inputSuccess"><i class="fas fa-user-circle"></i> Name </label>
                        <input type="text" value= "{{old('name')}}" name="name" class="form-control {{ $errors->has('title') ? 'is-danger' : '' }}" placeholder="Enter ..."  autofocus>
                        @error('name')
                            <p class="alert alert-danger"> {{ $errors->first('name') }}</p>
                        @enderror
                        <input type="hidden" name="update_user_id" value="{{ Auth::user()->id }}">
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