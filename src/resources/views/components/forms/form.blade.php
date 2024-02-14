<form action="{{ $action }}" method="{{ in_array($method, ["GET", "POST"]) ? $method : "POST" }}" class="{{ $attributes["class"] }}">
    @if ($method !== "GET")
        @csrf
    @endif
    @method($method)

    {{ $slot }}
</form>