@extends('admin.master')
@section('contant')
<div class="col-md-12 mt-md-5">
    <div class="card">
        <div class="card-header">
         Add Slider
        </div>
        <div class="card-body">
            <form action="{{route('slider.add')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Slider Title</label>
                  <input type="text" name="title" class="form-control" id="exampleInputEmail1" >
                  @error('title')
                      <span class="text-danger">{{ $message}}</span>
                  @enderror

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slider Description</label>
                  <textarea type="text" name="discription" class="form-control" id="exampleInputEmail1" ></textarea>
                  @error('discription')
                      <span class="text-danger">{{ $message}}</span>
                  @enderror

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slider Image</label>
                  <input type="file" name="image" class="form-control" id="exampleInputEmail1" >
                  @error('image')
                      <span class="text-danger">{{ $message}}</span>
                  @enderror
                </div>


                <button type="submit" class="btn btn-primary">Add Slider</button>
              </form>
        </div>
      </div>
</div>
@endsection
