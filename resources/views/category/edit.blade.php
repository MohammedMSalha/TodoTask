<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
            <div class="row mb-3 mt-3">
               <form method="post" action="{{ route('edit-cat',$cat->id) }}"> 
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="_method" value="PUT">

              
  <div class="form-group">
    <label for="exampleInputEmail1">Category title*</label>
    <input type="text" class="form-control" name="name" value="{{$cat->title}}" aria-describedby="name" placeholder="Enter Category Title !" required>
    @if ($errors->any())
    <div class="form-group mt-4">
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <h6>{{ $error }}</h6>
        @endforeach
    </ul>
</div>
</div>
@endif


  </div>
  
   
      
 
  <div class="form-group mt-3">
  <button type="submit" class="btn btn-success">Update</button>
  </div>
  @if(session('success'))
<div class="form-group mt-4">
    <div class="alert alert-success">
    {{session('success')}}
    </div>
    </div>
@endif
  
</form>
</div>
 
</div>

            </div>
            
        </div>

     
    </div>

 
 
</x-app-layout>
