<div class="card text-center  mb-3">
    <div class="card-header">
        {{ $forId }} ID: №{{ $target->id }}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $target->title }}</h5>

        {{ $slot }}
    </div>
    <div class="card-footer text-body-secondary">
        {{ $forId }} Date: {{ $target->date }}
    </div>
</div>