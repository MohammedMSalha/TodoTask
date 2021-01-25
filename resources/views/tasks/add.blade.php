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
            <div class="col-md-4 ">
               <form method="post" action="{{ route('tasks') }}"> 
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               @if ($cat->count() > 0)
  <div class="form-group">
    <label for="exampleInputEmail1">Task title*</label>

    <input type="text" class="form-control" name="title" aria-describedby="name" placeholder="Enter Task Title !" required>
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
  <label for="desc">Task Description*</label>
  <textarea class="form-control" name="desc" rows="3"></textarea>
  </div>
  <div class="form-group mt-3">
  <label for="desc">Category*</label>
  <select class="form-control" name="cat" id="cat" data-parsley-required="true" required>
          <option value="" disabled selected>Choose</option>
          @foreach ($cat as $sn) 
            <option value="{{ $sn->id }}">{{ $sn->title }}</option>
          @endforeach
        </select>
        </div>
        <div class="form-group mt-3">
          <label for="tags">Due Date*</label>
          <input class="form-control" type="date" name="due" id="example-date-input" required>
        </div>
        <div class="form-group mt-3">
          <label for="tags">Tags (Optional)</label>
          <input type="text" data-role="tagsinput" class="form-control" name="tags">
        </div>
 
  <div class="form-group mt-3">
  <button type="submit" class="btn btn-success">ADD</button>
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
<div class="col-md-8 mt-4 text-center">
@if ($tasks->count() > 0)
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Due Date</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($tasks as $sn) 

      <tr>
        <th scope="row">{{ $sn->title }}</th>
        <td>
        @foreach($cat as $c)
            @if ($c->id==$sn->cat_id)
                {{$c->title}}
            @endif
        @endforeach
        </td> 
        <td>{{$sn->due_date}}</td>
        <td><a href="{{ route('edit-task', $sn->id) }}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{ route('delete-task', $sn->id) }}" class="btn btn-danger">Delete</a></td>
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
            
       

     
    </div>
 
</x-app-layout>
