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
               <form method="post" action="{{ route('delete-task',$task->id)  }}"> 
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
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="_method" value="DELETE">
<h4>Are you sure to delete the task?</h4>
               @if ($cat->count() > 0)
  <div class="form-group">
    <label for="exampleInputEmail1">Task title*</label>
    <input type="text" class="form-control" name="title" value="{{$task->title}}" aria-describedby="name"  disabled>
   


  </div>
  
  
 
  <div class="form-group mt-3">
  <button type="submit" class="btn btn-danger">Delete</button>
  </div>
  @if(session('success'))
<div class="form-group mt-4">
    <div class="alert alert-success">
    {{session('success')}}
    </div>
    </div>
@endif
  @else 
  <div class="form-group mt-4">
<div class="alert alert-danger">
    <h6>Please, add at least one category ^^</h6>
</div>
        @endif
</form>
</div>
 
</div>

            </div>
            
        </div>

     
    </div>

</x-app-layout>
