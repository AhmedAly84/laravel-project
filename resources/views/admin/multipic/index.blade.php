<x-app-layout>
    <x-slot name="header">
       <div class="containrt">
           <div class="row">
               <div class="col-12">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Brands
                </h2>
               </div>
              
           </div>
       </div>
        
      
       
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
              
                <div class="col-md-8 ">
                    <div class="row row-cols-1 row-cols-md-3">
                    @foreach ($images as $img)  
                    <div class="col mb-4">

                        <div class="card "  >
                            <img src="{{asset($img->image)}}" class="card-img-top" >
                          
                          </div>
                  
                    </div>
                        
                    @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                         Muli Images
                        </div>
                        <div class="card-body">
                            <form action="{{route('image.add')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                            
                                <div class="form-group">
                                  <label for="exampleInputEmail1"> Images</label>
                                  <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" multiple >
                                  @error('image')
                                      <span class="text-danger">{{ $message}}</span>
                                  @enderror
                                </div>
                               
                              
                                <button type="submit" class="btn btn-primary">Add Images</button>
                              </form>
                        </div>
                      </div>
                </div>
               
            </div>
        
          
        </div>
        </div>
    </div>
</x-app-layout>
