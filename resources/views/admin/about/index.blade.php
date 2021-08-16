@extends('admin.master')
@section('contant')



            <div class="row mt-5">
                <div class="col-md-6">
                    <h3>About Data</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{route('about.new')}}" class="btn btn-info"> Add Data</a>
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
                        All About Data
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">S.N</th>
                                    <th scope="col"> Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col"> Description</th>
                                     <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php
                                      $i=1;
                                  @endphp
                              @foreach ($about as $data)
                              <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$data->title}} </td>
                                <td>{{$data->short_desc}} </td>
                                <td>{{$data->description}} </td>

                                <td><a href="{{url('about/edit/'.$data->id)}}" class="btn btn-info">Edit</a> </td>
                                <td><a href="{{url('about/delete/'.$data->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</a> </td>
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
