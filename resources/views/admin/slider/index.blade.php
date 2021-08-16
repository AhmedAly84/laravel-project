@extends('admin.master')
@section('contant')



            <div class="row">
                <div class="col-md-6">
                    <h3>Home Sliders</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('slider.new')}}" class="btn btn-info"> Add Slider</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      @if (session('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                        <div class="card-header">
                        All Slider
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    {{-- <th scope="col">S.N</th> --}}
                                    <th scope="col">Slider Title</th>
                                    <th scope="col">Slider Description</th>
                                    <th scope="col">Slider Image</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>

                              @foreach ($sliders as $slider)
                              <tr>
                                {{-- <th scope="row">{{$sliders->firstItem()+$loop->index}}</th> --}}
                                <td>{{$slider->title}} </td>
                                <td>{{$slider->discription}} </td>
                                <td><img src="{{asset($slider->image)}}" style="height: 40px; wedith:60px" alt="{{$slider->title}}"></td>

                                <td><a href="{{url('slider/edit/'.$slider->id)}}" class="btn btn-info">Edit</a> </td>
                                <td><a href="{{url('slider/delete/'.$slider->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a> </td>
                              </tr>
                              @endforeach




                                </tbody>

                              </table>

                        </div>

                      </div>

                </div>


            </div>



        </div>

    @endsection
