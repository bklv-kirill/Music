@extends('layouts.main')

@section('content')
    @section('title', $album->title)

    <x-main.group-card :target="$album">
        <x-slot name="forId">
            Album
        </x-slot>
        <p class="card-text">Group: {{ $album->group->title }}</p>

        @if ($tracks->count())
            <h3 class="text-primary">Tracks</h3>
        @endif

        @forelse ($tracks as $track)
            <x-main.card :target="$track" woBtn>
                <x-slot name="forId">
                    Track
                </x-slot>
                <p class="card-text">Track Date: {{ $track->date }}</p>
            </x-main.card>
        @empty
            <h2>No Tracks</h2>
        @endforelse
        
        @can('album-update')
            <x-forms.form :action="route('albums.delete', $album)" method="DELETE">
                <button type="submit" class="btn btn-danger">Delete Album</button>
            </x-forms.form>
        @endcan
    </x-main.group-card>
@endsection