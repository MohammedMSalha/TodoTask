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
 
               <form method="post" action="{{ route('cat') }}"> 
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="exampleInputEmail1">Catagory Name*</label>
    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Enter catagory name" required>
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

@if(session('success'))
<div class="form-group mt-4">
    <div class="alert alert-success">
    {{session('success')}}
    </div>
    </div>
@endif
  </div>
  
  <div class="form-group mt-3">
  <button type="submit" class="btn btn-success">ADD</button>
  </div>
</form>
</div>
<div class="row mt-4 text-center" >
@if ($cat->count() > 0)
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">Title</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($cat as $sn) 

      <tr>
        <th scope="row">{{ $sn->title }}</th>
        
        <td><a href="{{ route('edit-cat', $sn->id) }}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{ route('delete-cat', $sn->id) }}" class="btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
          </div>
</div>

</div>
        
        </div>
    </div>
</x-app-layout>
