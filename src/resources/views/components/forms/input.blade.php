<div class="mb-3">
    <label for="{{ $attributes["name"] }}" class="form-label">{{ $slot }}</label>
    <input name="{{ $attributes["name"] }}" type="{{ $attributes["type"] }}" value="{{ $attributes["value"] }}" class="form-control" id="{{ $attributes["name"] }}">
</div>