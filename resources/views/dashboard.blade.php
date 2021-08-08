<x-app-layout>
    <x-slot name="header">
       <div class="containrt">
           <div class="row">
               <div class="col-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                   Hi...<b> {{Auth::user()->name }}</b>
                </h2>
               </div>
               <div class="col-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
                    Total Number Of Users : <span class="badge badge-danger">  {{Auth::user()->count() }}</span>
                </h2>
               </div>
           </div>
       </div>
        
      
       
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$users->firstItem()+$loop->index}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffforHumans()}}</td>
                          </tr>
                        @endforeach
                  
                     
                    </tbody>
                
                  </table>
               
            </div>
            {{ $users->links() }}
        </div>
        </div>
    </div>
</x-app-layout>
