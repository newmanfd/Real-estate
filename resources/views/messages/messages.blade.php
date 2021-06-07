<!-- Check the errors array that's created if validation fails -->
@if(count($errors) > 0)
    @foreach($errors->all() as $error) <!-- $errors is an object -->
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

<!-- Check for session values: session success and session error -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }} <!-- 'success' is the type -->
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }} <!-- 'error' is the type -->
    </div>
@endif