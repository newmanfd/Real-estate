@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN PANEL</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p style="color:green;"><b>You are logged in!</b></p>
                        <p><a href="/properties/create">Add new property</a></p>
                        <p><a href="/properties/index">View all property listings</a></p>
                        <p><a href="/pages/index">Go to Landing Page</a></p>
                        <hr>
                        <p><b>Quick Access</b></p>
                        <p><a href="/properties/cities/nicosia">View property listings in Nicosia</a></p>
                        <p><a href="/properties/cities/larnaca">View property listings in Larnaca</a></p>
                        <p><a href="/properties/cities/ammochostos">View property listings in Ammochostos</a></p>
                        <p><a href="/properties/cities/limassol">View property listings in Limassol</a></p>
                        <p><a href="/properties/cities/pafos">View property listings in Pafos</a></p>
                    </div><hr>

                    <div class="card-body">
                        <p><b>Newly Added</b></p>
                            @if(count($newlyAddedProperties) > 0)
                                @foreach($newlyAddedProperties as $newlyAddedProperty)
                                    <h6><a href="/properties/{{ $newlyAddedProperty->id }}" class="btn btn-link"> {{ $newlyAddedProperty->title }} </a> <small>created {{ $newlyAddedProperty->created_at }}</small> </h6> 
                                @endforeach
                                @else
                                    <h5>You haven't added properties yet...</h5><br>
                            @endif  
                    </div><hr>

                    <div class="card-body">
                        <p><b>Newly Published</b></p>
                            @if(count($newlyPublishedProperties) > 0)
                                @foreach($newlyPublishedProperties as $newlyPublishedProperty)
                                    <h6><a href="/properties/{{ $newlyPublishedProperty->id }}" class="btn btn-link"> {{ $newlyPublishedProperty->title }} </a> <small>published {{ $newlyPublishedProperty->published_date }}</small> </h6> 
                                @endforeach
                                @else
                                    <h5>You haven't added properties yet...</h5><br>
                            @endif  
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
