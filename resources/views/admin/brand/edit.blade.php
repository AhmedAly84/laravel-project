@extends('admin.master')
@section('contant')
    <div class="p-12 my-3">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                         Edit Brand
                        </div>
                        <div class="card-body">
                            <form action="{{url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$brands->brand_image}}" >
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Brand Name</label>
                                  <input type="text" name="brand_name" value="{{$brands->brand_name}}" class="form-control" id="exampleInputEmail1" >
                                  @error('brand_name')
                                      <span class="text-danger">{{ $message}}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Brand Image</label>
                                  <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" value="{{$brands->brand_image}}" >

                                </div>
                                <div class="form-group ">
                                    <img src="{{asset($brands->brand_image)}}" style="height: 200px; wedith:100%; margine:10px auto" alt="{{$brands->brand_name}}">
                                </div>


                                <button type="submit" class="btn btn-primary">Update Brand</button>
                              </form>
                        </div>
                      </div>
                </div>

            </div>

        </div>
        </div>
    </div>
    @endsection
