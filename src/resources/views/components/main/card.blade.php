<div class="card mb-3">
    <div class="card-header">
        {{ $forId }} ID: №{{ $target->id }}
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $target->title }}</h5>
        {{ $slot }}
        @if (!$attributes["woBtn"])
            <a href="{{ $attributes["route"] }}" class="btn btn-primary">Show More</a>
        @endif
    </div>
</div>