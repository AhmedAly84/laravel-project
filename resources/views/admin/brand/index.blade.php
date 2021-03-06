@extends('admin.master')
@section('contant')

            <div class="row">
                <div class="col-md-8">
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
                        All Brands
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">S.N</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>

                              @foreach ($Brands as $brand)
                              <tr>
                                <th scope="row">{{$Brands->firstItem()+$loop->index}}</th>
                                <td>{{$brand->brand_name}} </td>
                                <td><img src="{{asset($brand->brand_image)}}" style="height: 40px; wedith:60px" alt="{{$brand->brand_name}}"></td>
                                <td> {{$brand->created_at->diffforHumans()}}</td>
                                <td><a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a> </td>
                                <td><a href="{{url('brand/delete/'.$brand->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a> </td>
                              </tr>
                              @endforeach




                                </tbody>

                              </table>

                        </div>
                        {{$Brands->links('pagination::bootstrap-4')}}
                      </div>

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                         Add Brand
                        </div>
                        <div class="card-body">
                            <form action="{{route('brand.add')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Brand Name</label>
                                  <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" >
                                  @error('brand_name')
                                      <span class="text-danger">{{ $message}}</span>
                                  @enderror

                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Brand Image</label>
                                  <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" >
                                  @error('brand_image')
                                      <span class="text-danger">{{ $message}}</span>
                                  @enderror
                                </div>


                                <button type="submit" class="btn btn-primary">Add Brand</button>
                              </form>
                        </div>
                      </div>
                </div>

            </div>


        </div>

    @endsection
