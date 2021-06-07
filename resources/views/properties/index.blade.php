@extends('layouts/app')

@section('content')
    <a href="/pages/index" class="btn btn-info text-white">Go back</a>
    <br><br>
    <h1>{{ $heading }} ({{ count($properties) }})</h1><br>
    @if(count($properties) > 0)
        @foreach($properties as $property)
            <div class="card card-body border rounded shadow-sm">
                <img style="width:30%;" src="/storage/images/{{ $property->images }}"><hr>
                
                <!-- when clicked calls the PropertiesController@show -->
                <h3> <a href="/properties/{{ $property->id }}">{{ $property->title }}</a> </h3> 
                <p>PRICE EUR: {{ $property->price }}</p>
                <p>CITY: {{ $property->city }}</p>
                <p>AREA: {{ $property->area }}</p>
                <small>Published on {{ $property->published_date }}</small> <br>
                <p><a href="/properties/{{ $property->id }}" class="btn btn-primary text-white btn" role="button">View</a></p>
                
                <!-- Edit and Delete buttons -->
                <div>
                    @if(!Auth::guest()) <!-- if the user is not a guest i.e. is the admin -->
                        @if(Auth::user()->id == $property->user_id) <!-- if the user is the creator of the property, then show the btns -->
                            <!-- Edit btn -->
                            <a href="/properties/{{ $property->id }}/edit" class="btn btn-light">Edit</a> <!-- Look into PostsController@edit -->
                  
                            <!-- Delete btn -->
                            <!-- method is POST but pretending to be a DELETE -->
                            {!! Form::open(['action' => ['PropertiesController@destroy', $property->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!! Form::close() !!}
                        @endif    
                    @endif
                </div>
            </div>
            <br>
        @endforeach
    @else 
        <h5>No properties listed yet. Check back soon!</h5>
    @endif
@endsection