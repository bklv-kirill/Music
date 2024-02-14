@extends('layouts.main')

@section('content')
    @section('title', "Groups")

    <x-forms.form :action="route('groups.index')" method="GET" class="mb-3">
        <x-forms.search name="title" :value="isset($filters['title']) ? $filters['title'] : ''"/>

        <x-forms.select name="style_id" span="Style">
            <x-slot name="first">
                No Style
            </x-slot>
            @foreach ($styles as $style)
                <option value="{{ $style->id }}" {{ isset($filters['style_id']) && (int)$filters['style_id'] === $style->id ? "selected" : "" }}>{{ $style->title }}</option>
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

    @forelse ($groups as $group)
        <x-main.card :target="$group" :route="route('groups.show', $group)">
            <x-slot name="forId">
                Group
            </x-slot>
            <p class="card-text">Group Style: {{ $group->style->title }}</p>
            <p class="card-text">Group Date: {{ $group->date }}</p>
        </x-main.card>
    @empty
        <h2>No Groups</h2>
    @endforelse
    {{ $groups->withQueryString()->links() }}
@endsection