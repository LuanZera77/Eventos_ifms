@if ($errors->any())
    <div class="alert alert-danger border-0 shadow-sm mb-4">
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li class="fw-semibold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success border-0 shadow-sm mb-4 fw-semibold">
        {{ session('success') }}
    </div>
@endif
