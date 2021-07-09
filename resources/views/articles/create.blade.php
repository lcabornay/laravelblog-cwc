@extends ('layouts/main')

@section ('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Create Article</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form" action="{{ action('ArticlesController@store') }}" method="post" enctype="multipart/form-data">
                    <!-- input states -->
                    <div class="form-group">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <label class="col-form-label required" for="inputSuccess"><i class="fas fa-user-circle"></i> Title </label>
                        <input type="text" value= "{{old('title')}}" name="title" class="form-control {{ $errors->has('title') ? 'is-danger' : '' }}" placeholder="Enter ..."  autofocus>
                        @error('title')
                            <p class="alert alert-danger"> {{ $errors->first('title') }}</p>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label class="col-form-label required" for="inputSuccess"><i class="fas fa-user-circle"></i> Slug </label>
                        <input type="text" value= "{{old('slug')}}" name="slug" class="form-control required" placeholder="Enter ..." autofocus>
                        @error('slug')
                            <p class="alert alert-danger"> {{ $errors->first('slug') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label required" for="inputSuccess"><i class="fas fa-user-circle"></i> Content </label>
                        <textarea cols="80" id="editor1" name="contents" rows="10" data-sample-short>&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href=&quot;https://ckeditor.com/&quot;&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</textarea>
                        @error('contents')
                            <p class="alert alert-danger"> {{ $errors->first('contents') }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" name="image_path" id="editor1"/>
                        @error('image_path')
                            <p class="alert alert-danger"> {{ $errors->first('image_path') }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="article_category_id">
                            @foreach($articleCategories as $articleCategory)
                                <option value="{{ $articleCategory->id }}">{{ $articleCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 pull-right">
                                <input type="hidden" name="update_user_id" value="{{ Auth::user()->id }}">
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