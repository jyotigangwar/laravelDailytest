@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <div class="mt-2">
        @include('layouts.partials')
        </div> 
        <div class="row">
            <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Categories</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        </button>
                    </div>
                </div>
                <form action="{{ route('category.update', $category->id) }}" method="Post">
                {{ csrf_field() }}
               {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input value="{{ old('name',$category->name) }}" 
                            type="text" 
                            class="form-control" 
                            name="name" 
                            oninvalid="this.setCustomValidity('Please Enter valid name')"
                            oninput="setCustomValidity('')"
                            placeholder="Category Name" required>                        
                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <textarea id="description" name="description"
                         class="form-control" rows="4"
                        oninvalid="this.setCustomValidity('Please Enter valid description')"
                        oninput="setCustomValidity('')"                        
                        placeholder="Category Description" required>{{ old('description',$category->description) }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                        @endif                        
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>

        </div>
</div>            
    
@endsection
