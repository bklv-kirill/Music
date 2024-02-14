@extends('layouts.main')

@section('content')
    @section('title', "Create New Album")

    <x-forms.form :action="route('albums.store')" method="POST">
        <x-forms.input name="title" type="text" :value="old('title')">
            Album Title
            @if ($errors->has("title"))
                <div class="form-text text-danger">{{ $errors->first("title") }}</div>
            @endif
        </x-forms.input>

        <x-forms.select name="group_id" span="Group">
            @forelse ($groups as $group)
                <option value="{{ $group->id }}" {{ (int)old("group_id") === $group->id ? "selected" : "" }}>{{ $group->title }}</option>
            @empty
                <option value="0">No Group</option>
            @endforelse
        </x-forms.select>

        <x-forms.input name="date" type="date" :value="old('date')">
            Album Date
            @if ($errors->has("date"))
                <div class="form-text text-danger">{{ $errors->first("date") }}</div>
            @endif
        </x-forms.input>

        @if ($errors->has("create"))
            <p class="text-danger">{{ $errors->first("create") }}</p>
        @endif

        <button type="submit" class="btn btn-primary">Create</button>
    </x-forms.form>
@endsection