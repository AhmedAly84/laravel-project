@extends('admin.master')
@section('contant')

            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                         Edit Slider
                        </div>
                        <div class="card-body">
                            <form action="{{url('slider/update/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$sliders->image}}" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$sliders->title}}" id="exampleInputEmail1" >
                                    @error('title')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror

                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Description</label>
                                    <textarea type="text" name="discription" class="form-control" value="{{$sliders->discription}}" id="exampleInputEmail1" >{{$sliders->discription}}</textarea>
                                    @error('discription')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror

                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Slider Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" >
                                    <div class="form-group ">
                                        <img src="{{asset($sliders->image)}}" style="height: 200px; wedith:100%; margine:10px auto" alt="{{$sliders->name}}">
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                  </div>


                                <button type="submit" class="btn btn-primary">Update Slider</button>
                              </form>
                        </div>
                      </div>
                </div>

            </div>


    </div>
    @endsection
