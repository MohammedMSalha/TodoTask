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
                    <h4>To view the tasks, please choose the category from the left side.</h4>

                        <div class="col-md-5 mt-3">
                        @if ($cat->count() > 0)
                            <ul class="list-group">
                                @foreach($cat as $data)
                                <li class="list-group-item <?php if( request()->id==$data->id){ echo 'active'; } ?>"><a class="btn  <?php if( request()->id==$data->id){ echo 'text-white'; } ?>" href="{{ route('dashboard-cat',$data->id) }}" >{{$data->title}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                        </div>
                        <div class="col-md-7 mt-3">
                        @if ($tasks->count()!=0)
                        <div id="accordion">
                            @foreach($tasks as $data)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn" data-toggle="collapse" data-target="#collapse{{ $data->id }}" aria-expanded="false" >
                                        {{ $data->title }}
                                    </button>
                                </h5>
                                </div>

                                <div id="collapse{{ $data->id }}" class="collapse" aria-labelledby="heading{{ $data->id }}" data-parent="#accordion">
                                <div class="card-body">
                                  
                                    <h6 class="mt-2 text-danger">Due Date : </h6><span>{{ $data->due_date }}</span>
                                    <h6 class="mt-2 text-danger">Description : </h6><span>{{ $data->due_date }}</span>
                                    <h6 class="mt-2 text-danger">Tags : </h6><span>{{ $data->tags }}</span>
                        
                                </div>
                                </div>
                            </div>
   
                            @endforeach
</div>
@else
<div class="col-md-7 mt-3">
    <h6>No Tasks Founded !</h6>
</div>
@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
