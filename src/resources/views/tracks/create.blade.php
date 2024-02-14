@extends('layouts.main')

@section('content')
    @section('title', "Create New Track")

    <x-forms.form :action="route('tracks.store')" method="POST">
        <x-forms.input name="title" type="text" :value="old('title')">
            Group Title
            @if ($errors->has("title"))
                <div class="form-text text-danger">{{ $errors->first("title") }}</div>
            @endif
        </x-forms.input>

        <x-forms.select name="album_id" span="Album">
            @forelse ($albums as $album)
                <option value="{{ $album->id }}" {{ (int)old("date") === $album->id ? "selected" : "" }}>{{ $album->title }}</option>
            @empty
                <option value="0">No Albums</option>
            @endforelse
        </x-forms.select>


        <x-forms.input name="date" type="date" :value="old('date')">
            Track Date
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