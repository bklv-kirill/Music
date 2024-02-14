@extends('layouts.main')

@section('content')
    @section('title', "Console")

    @if ($user = Auth::user())
        <h2 class="text-center">Admin Panel</h2>
        <div class="d-flex align-items-center justify-content-center mt-3">
            @can('group-update')
                <a href="{{ route("groups.create") }}" class="btn btn-primary m-1">Create New Group</a>
            @endcan
            @can('album-update')
                <a href="{{ route("albums.create") }}" class="btn btn-primary m-1">Create New Album</a>
            @endcan
            @can('track-update')
                <a href="{{ route("tracks.create")}}" class="btn btn-primary m-1">Create New Track</a>
            @endcan
            <a href="{{ route("admin.logout")}}" class="btn btn-danger m-1">Log Out</a>
        </div>
    @else
        <x-forms.form :action="route('admin.auth')" method="POST">
            <x-forms.input name="login" type="text" :value="old('login')">
                Login
                @if ($errors->has("login"))
                    <div class="form-text text-danger">{{ $errors->first("login") }}</div>
                @endif
            </x-forms.input>
            <x-forms.input name="password" type="password">
                Password
                @if ($errors->has("password"))
                    <div class="form-text text-danger">{{ $errors->first("password") }}</div>
                @endif
            </x-forms.input>
            @if ($errors->has("auth"))
                <p class="text-danger">{{ $errors->first("auth") }}</p>
            @endif
            <button type="submit" class="btn btn-primary">Sign In</button>
        </x-forms.form>
    @endif
@endsection