@extends('layouts/app')

@section('content')
    <h1>Add a property</h1><br>
    <div class="card card-body border rounded">
        {!! Form::open(['action' => 'PropertiesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <!-- property title -->
            <div class="form-group">
                <!-- label title with actual text Title -->
                {{ Form::label('title', 'Title') }}
                <!-- empty string for empty textfield; -->
                {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title of the property...']) }}
            </div>
            <!-- property reference no. -->
            <div class="form-group">
                {{ Form::label('reference_no', 'Reference #') }}
                {{ Form::text('reference_no', '', ['class' => 'form-control', 'placeholder' => 'Reference of the property...']) }}
            </div>
            <!-- published date -->
            <div class="form-group">
                {{ Form::label('published_date', 'Published date') }}<br>
                {{ Form::date('published_date', \Carbon\Carbon::now()) }}
            </div>
            <!-- price -->
            <div class="form-group">
                {{ Form::label('price', 'Price') }}
                {{ Form::text('price', '', ['class' => 'form-control', 'placeholder' => '']) }}
            </div>
            <!-- property type -->
            <div class="form-group">
                {{ Form::label('property_type', 'Property type') }}
                {{ Form::text('property_type', '', ['class' => 'form-control', 'placeholder' => '']) }}
            </div>
            <!-- area -->
            <div class="form-group">
                {{ Form::label('area', 'Area') }}
                <!-- Form::select('size', ['L' => 'Large', 'S' => 'Small']) -->
                {{ Form::text('area', '', ['class' => 'form-control', 'placeholder' => '']) }}
            </div>
            <!-- city -->
            <div class="form-group">
                {{ Form::label('city', 'City') }}<br>
                {{ Form::select('city', ['Nicosia' => 'Nicosia', 'Larnaca' => 'Larnaca' , 'Ammochostos' => 'Ammochostos', 'Limassol' => 'Limassol', 'Pafos' => 'Pafos']) }}
            </div>
            <!-- property description -->
            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description of the property...']) }}
            </div>
            <!-- File upload btn -->
            <div class="form-group">
                {{ Form::label('images', 'Upload an image') }}<br>
                {{ Form::file('images') }}<br><br><br>
            </div>
            {{ Form::submit('Publish', ['class' => 'btn btn-primary']) }} 
        {!! Form::close() !!}
    </div>
@endsection

