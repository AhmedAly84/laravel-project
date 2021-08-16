@extends('admin.master')
@section('contant')

            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                         Edit About Data
                        </div>
                        <div class="card-body">
                            <form action="{{url('about/update/'.$about->id)}}" method="POST" >
                                @csrf

                                <div class="form-group">
                                    <label > Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$about->title}}"  >
                                    @error('title')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror

                                  </div>
                                  <div class="form-group">
                                    <label >Short Description</label>
                                    <textarea type="text" name="short_desc" class="form-control"  >{{$about->short_desc}}</textarea>
                                    @error('short_desc')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror

                                  </div>
                                  <div class="form-group">
                                    <label > Description</label>
                                    <textarea type="text" name="description" class="form-control"  >{{$about->description}}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror

                                  </div>



                                <button type="submit" class="btn btn-primary">Update Data</button>
                              </form>
                        </div>
                      </div>
                </div>

            </div>


    </div>
    @endsection
