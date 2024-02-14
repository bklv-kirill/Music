<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Main</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link {{ Route::is("groups*") ? "active" : "text-muted" }}" href="{{ route("groups.index") }}">Groups</a>
                <a class="nav-link {{ Route::is("albums*") ? "active" : "text-muted" }}" href="{{ route("albums.index") }}">Albums</a>
                <a class="nav-link {{ Route::is("tracks*") ? "active" : "text-muted" }}" href="{{ route("tracks.index") }}">Tracks</a>
                <a class="nav-link {{ Route::is("admin*") ? "active" : "text-muted" }}" href="{{ route("admin.index") }}">Console</a>

                @if ($user = Auth::user())
                    <span class="nav-link">{{ $user->role->discription }}</span>
                @endif
            </div>
        </div>
    </div>
</nav>