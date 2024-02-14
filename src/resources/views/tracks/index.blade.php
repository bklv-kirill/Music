@extends('layouts.main')

@section('content')
    @section('title', "Tracks")

    <x-forms.form :action="route('tracks.index')" method="GET" class="mb-3">
        <x-forms.search name="title" :value="isset($filters['title']) ? $filters['title'] : ''"/>

        <x-forms.select name="group_id" span="Group">
            <x-slot name="first">
                No Group
            </x-slot>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}" {{ isset($filters['group_id']) && (int)$filters['group_id'] === $group->id ? "selected" : "" }}>{{ $group->title }}</option>
            @endforeach
        </x-forms.select>

        <x-forms.select name="album_id" span="Album">
            <x-slot name="first">
                No Album
            </x-slot>
            @foreach ($albums as $album)
                <option value="{{ $album->id }}" {{ isset($filters['album_id']) && (int)$filters['album_id'] === $album->id ? "selected" : "" }}>{{ $album->title }}</option>
            @endforeach
        </x-forms.select>

        <fieldset class="mb-3">
            <x-forms.check name="date" value="new" for="new" :checked="$filters['date'] === 'new'">
                New
            </x-forms.check>
            <x-forms.check name="date" value="old" for="old" :checked="$filters['date'] === 'old'">
                Old
            </x-forms.check>
        </fieldset>

        <button type="submit" class="btn btn-primary">Search</button>
    </x-forms.form>

    @forelse ($tracks as $track)
        <x-main.card :target="$track" woBtn>
            <x-slot name="forId">
                Track
            </x-slot>
            <p class="card-text">Group: {{ $track->group->title }}</p>
            <p class="card-text">Album: {{ $track->album->title }}</p>
            <p class="card-text">Track Date: {{ $track->date }}</p>

            @can('track-update')
                <x-forms.form :action="route('tracks.delete', $track)" method="DELETE">
                    <button type="submit" class="btn btn-danger">Delete Track</button>
                </x-forms.form>
            @endcan
        </x-main.card>
    @empty
        <h2>No Tracks</h2>
    @endforelse
    {{ $tracks->withQueryString()->links() }}
@endsection