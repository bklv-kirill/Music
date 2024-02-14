<div class="form-check">
    <input class="form-check-input" type="radio" name="{{ $attributes["name"] }}" value="{{ $attributes["value"] }}" id="{{ $attributes["for"] }}" {{ $attributes["checked"] ? "checked" : "" }}>
    <label class="form-check-label" for="{{ $attributes["for"] }}">
        {{ $slot }}
    </label>
</div>