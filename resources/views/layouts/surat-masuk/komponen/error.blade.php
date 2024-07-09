@if (Session::has('success'))
    <div class="pt3">
        <div class="alert alert-succes">
            {{ Session::get('success') }}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif