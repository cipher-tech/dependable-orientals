@extends('layouts.app')

@section('title', 'Edit Jobs')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                @endif

                <img src="{{ asset('storage/'.$job->logo) }}" alt=" logo" height="150px" width="150px">
                   
                <div class="panel-heading"> <h2> Edit:</h2>  <h3> {{ $job->name}} </h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $job->name }}" minlength="3" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" rows="3" required autofocush>{{ $job->description }}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-4 control-label">salary</label>

                            <div class="col-md-6">
                                <input id="salary" type="text" class="form-control" name="salary" value="{{ $job->salary }}" required autofocus>
                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-4 control-label">Category</label>
    
                                <div class="col-md-6">
                                    <select name="category[]" id="category" class="form-control" multiple required>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if( in_array($category->id, $selectedCategories)) selected="selected"  @endif>
                                         {{ $category->name }}</option>
                                        @endforeach   
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                            <label for="rating" class="col-md-4 control-label">rating</label>

                            <div class="col-md-6">
                                <select name="rating" id="rating"  value="{{ $job->rating }}" class="form-control">
                                    <option value="1" @if($job->rating == 1) selected="selected" @endif > 1</option>
                                    <option value="2" @if($job->rating == 2) selected="selected" @endif > 2</option>
                                    <option value="3" @if($job->rating == 3) selected="selected" @endif > 3</option>
                                    <option value="4" @if($job->rating == 4) selected="selected" @endif > 4</option>
                                    <option value="5" @if($job->rating == 5) selected="selected" @endif > 5</option>
                                </select>
                                @if ($errors->has('rating'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                <label for="logo" class="col-md-4 control-label">Logo</label>
    
                                <div class="col-md-6">
                                    <input type="file" name="logo" placeholder="Select logo" id="logo" autofocus>
                                    @if ($errors->has('rating'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rating') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                           
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection