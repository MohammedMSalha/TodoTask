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
               <form method="post" action="{{ route('edit-task',$task->id) }}"> 
               @if(session('success'))
                <div class="form-group mt-4">
                    <div class="alert alert-success">
                    {{session('success')}}
                    </div>
                    </div>
                @endif
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
               <input type="hidden" name="_method" value="PUT">

               @if ($cat->count() > 0)
  <div class="form-group">
    <label for="exampleInputEmail1">Task title*</label>
    <input type="text" class="form-control" name="title" value="{{$task->title}}" aria-describedby="name" placeholder="Enter Task Title !" required>
   


  </div>
  <div class="form-group mt-3">
  <label for="desc">Task description*</label>
  <textarea class="form-control" name="desc" rows="3">{{$task->desc}}</textarea>
  </div>
  <div class="form-group mt-3">
  <label for="cat">Task category*</label>

  <select class="form-control" name="cat" id="cat"  data-parsley-required="true" required>
          <option value="" disabled>Choose</option>

          @foreach ($cat as $sn) 
            <option value="{{ $sn->id }}" <?php if ($sn->id == $task->cat_id)
{
    echo "selected";
} ?> >{{ $sn->title }}</option>
           
          @endforeach
        </select>
        </div>
      
        <div class="form-group mt-4">
        <label for="tags">Tags (Optional)</label>
        <input type="text" data-role="tagsinput" class="form-control" name="tags" value="{{ $task->tags }}">
        </div>
  <div class="form-group mt-3">
  <button type="submit" class="btn btn-success">Update</button>
  </div>
 
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
