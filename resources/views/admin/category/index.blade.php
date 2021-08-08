<x-app-layout>
    <x-slot name="header">
       <div class="containrt">
           <div class="row">
               <div class="col-12">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Categories
                </h2>
               </div>
              
           </div>
       </div>
        
      
       
    </x-slot>

    <div class="py-12">
        <div class="container">
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
                        All Category
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">S.N</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                             
                              @foreach ($categories as $cat)
                              <tr>
                                <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                <td>{{$cat->category_name}} </td>
                                <td>{{$cat->user->name}}</td>
                                <td> {{$cat->created_at->diffforHumans()}}</td>
                                <td><a href="{{url('category/edit/'.$cat->id)}}" class="btn btn-info">Edit</a> </td>
                                <td><a href="{{url('category/softdelet/'.$cat->id)}}" class="btn btn-danger">Delete</a> </td>
                              </tr>
                              @endforeach
                                  
                                   
                              
                                 
                                </tbody>
                            
                              </table>
                        </div>
                    
                      </div>
                      {{$categories->links()}}
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                         Add Category
                        </div>
                        <div class="card-body">
                            <form action="{{route('category.add')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Category Name</label>
                                  <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" >
                                  @error('category_name')
                                      <span class="text-danger">{{ $message}}</span>
                                  @enderror
                                </div>
                               
                              
                                <button type="submit" class="btn btn-primary">Add Category</button>
                              </form>
                        </div>
                      </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                  
                        <div class="card-header">
                      Trash List
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">S.N</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                             
                              @foreach ($trachCat as $cat)
                              <tr>
                                <th scope="row">{{$trachCat->firstItem()+$loop->index}}</th>
                                <td>{{$cat->category_name}} </td>
                                <td>{{$cat->user->name}}</td>
                                <td> {{$cat->created_at->diffforHumans()}}</td>
                                <td><a href="{{url('category/restore/'.$cat->id)}}" class="btn btn-info">Restore</a> </td>
                                <td><a href="{{url('category/delet/'.$cat->id)}}" class="btn btn-danger">Delete</a> </td>
                              </tr>
                              @endforeach
                                  
                                   
                              
                                 
                                </tbody>
                            
                              </table>
                        </div>
                    
                      </div>
                      {{$trachCat->links()}}
                </div>
              
               
            </div>
          
        </div>
        </div>
    </div>
</x-app-layout>
