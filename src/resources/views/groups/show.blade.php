@extends('layouts.main')

@section('content')
    @section('title', $group->title)

    <x-main.group-card :target="$group">
        <x-slot name="forId">
            Group
        </x-slot>
        <p class="card-text">Group Style: {{ $group->style->title }}</p>

        @if ($albums->count())
            <h3 class="text-primary mt-3">Albums</h3>
        @endif

        @forelse ($albums as $album)
            <x-main.card :target="$album" :route="route('albums.show', $album)">
                <x-slot name="forId">
                    Album
                </x-slot>
                <p class="card-text">Album Date: {{ $album->date }}</p>
            </x-main.card>
            @empty
            <h2>No Albums</h2>
            @endforelse

            @can('group-update')
                <x-forms.form :action="route('groups.delete', $group)" method="DELETE">
                    <button type="submit" class="btn btn-danger">Delete Group</button>
                </x-forms.form>
            @endcan
    </x-main.group-card>

@endsection