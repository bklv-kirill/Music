@extends('layouts.main')

@section('content')
    @section('title', "Albums")

    <x-forms.form :action="route('albums.index')" method="GET" class="mb-3">
        <x-forms.search name="title" :value="isset($filters['title']) ? $filters['title'] : ''"/>

        <x-forms.select name="group_id" span="Group">
            <x-slot name="first">
                No Group
            </x-slot>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}" {{ isset($filters['group_id']) && (int)$filters['group_id'] === $group->id ? "selected" : "" }}>{{ $group->title }}</option>
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

    @forelse ($albums as $album)
        <x-main.card :target="$album" :route="route('albums.show', $album)">
            <x-slot name="forId">
                Album
            </x-slot>
            <p class="card-text">Group: {{ $album->group->title }}</p>
            <p class="card-text">Album Date: {{ $album->date }}</p>
        </x-main.card>
    @empty
        <h2>No Albums</h2>
    @endforelse
    {{ $albums->withQueryString()->links()}}
@endsection