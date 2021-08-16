@extends('admin.master')
@section('contant')
<div class="col-md-12 mt-md-5">
    <div class="card">
        <div class="card-header">
         Add About Data
        </div>
        <div class="card-body">
            <form action="{{route('about.add')}}" method="POST" >
                @csrf
                <div class="form-group">
                  <label > Title</label>
                  <input type="text" name="title" class="form-control"  >
                  @error('title')
                      <span class="text-danger">{{ $message}}</span>
                  @enderror

                </div>
                <div class="form-group">
                  <label >Short Description</label>
                  <textarea type="text" name="short_desc" class="form-control"  ></textarea>
                  @error('short_disc')
                      <span class="text-danger">{{ $message}}</span>
                  @enderror

                </div>
                <div class="form-group">
                  <label > Description</label>
                  <textarea type="text" name="description" class="form-control"  ></textarea>
                  @error('description')
                      <span class="text-danger">{{ $message}}</span>
                  @enderror

                </div>


                <button type="submit" class="btn btn-primary">Add Data</button>
              </form>
        </div>
      </div>
</div>
@endsection
