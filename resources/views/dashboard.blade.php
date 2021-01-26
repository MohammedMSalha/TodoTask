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
                        @if ($cat->count() > 0)
                        <h4>To view the tasks, please choose the category from the left side.</h4>
                        <div class="col-md-5 mt-3">
                        
                            <ul class="list-group">
                                @foreach($cat as $data)
                                <li class="list-group-item <?php if( request()->id==$data->id){ echo 'active'; } ?>"><a class="btn  <?php if( request()->id==$data->id){ echo 'text-white'; } ?>" href="{{ route('dashboard-cat',$data->id) }}" >{{$data->title}}</a></li>
                                @endforeach
                            </ul>
                        
                        </div>
                        @else
                        <h4>Please add category and tasks to start.</h4>
                        @endif
                        @if ($cat->count() > 0)
                        <div class="col-md-7 mt-3">
                            <h6>Select category first &_&</h6>
                        </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
