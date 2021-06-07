@extends('layouts/app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-info text-white">Go back</a>
    <br><br>
    <!-- Property box -->
    <div class="card card-body border rounded shadow-sm">
        <h1>{{ $property->title }}</h1>
        <img style="width:100%" src="/storage/images/{{ $property->images }}"><br>
        <small>Published on {{ $property->published_date }}</small> <!-- looks into property model's user() -->
        <hr><br>
        <p>DESCRIPTION: {{ $property->description }}</p>
        <p>PRICE EUR: {{ $property->price }}</p>
        <p>AREA: {{ $property->area }}</p>
        <p>CITY: {{ $property->city }}</p>
        <p>REFERENCE #: {{ $property->reference_no }}</p>
        <p>PROPERTY TYPE: {{ $property->property_type }}</p>
        <br><br>
        
        <!-- Buttons -->
        <div>
            @if(!Auth::guest()) <!-- if the user is not a guest i.e. is the admin -->
                @if(Auth::user()->id == $property->user_id) <!-- if the user is the creator of the property, then show the btns -->
                    <!-- Edit btn -->
                    <a href="/properties/{{ $property->id }}/edit" class="btn btn-light">Edit</a> <!-- Look into PropertiesController@edit -->
                    
                    <!--<a href="{{ url('properties/'.$property->id.'/edit') }}"
                        class="btn btn-light">{{ trans('Edit') }}</a>-->

                    <!--
                    {!! Form::open(['method' => 'Get', 'route' => ['properties.edit', $property->id]]) !!}
                        {!! Form::submit(trans('properties.edit')) !!}
                    {!! Form::close() !!}
                    -->

                   
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
@endsection

