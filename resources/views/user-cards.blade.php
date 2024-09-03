@foreach ($users as $user)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $user->designation->name }}</h6>
                <p class="card-text">
                    <strong>Department:</strong> {{ $user->department->name }}<br>
                </p>
            </div>
        </div>
    </div>
@endforeach