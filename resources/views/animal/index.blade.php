@extends('layouts.app')

{{-- @section('title', '| Permissions') --}}
@section('content')
<div>
<div class="wild"><a href="{{ URL::to('animals/create') }}" class="btn btn-success">Add Animal</a>
</div>
     @if(count($animals)> 0)

              <div class="row">
                @foreach ( $animals as $animal)
            <div class="col-md-4">
              <h1>
                <div class="image-container">
            <img src="/public/image/{{$animal->image}}" alt="Animal picture" class="centered-image"/>
            
                          </div>
                          <h5>
                  {{ $animal->name }}
            </h5>
            <hr>
            
                <p class="description">{{$animal->description}}</p>
                <hr><div class="edit"><button>edit</button> <button>delete</button></div>
          </div>  </h1> 
                      @endforeach
                    </div>

       {{$animals->links()}}
       @else
     <p>No Animal posted</p>
     @endif
  
@endsection
