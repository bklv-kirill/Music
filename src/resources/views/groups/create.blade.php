@extends('layouts.main')

@section('content')
    @section('title', "Create New Group")

    <x-forms.form :action="route('groups.store')" method="POST">
        <x-forms.input name="title" type="text" :value="old('title')">
            Group Title
            @if ($errors->has("title"))
                <div class="form-text text-danger">{{ $errors->first("title") }}</div>
            @endif
        </x-forms.input>
        <x-forms.input name="date" type="date" :value="old('date')">
            Group Date
            @if ($errors->has("date"))
                <div class="form-text text-danger">{{ $errors->first("date") }}</div>
            @endif
        </x-forms.input>
        
        <x-forms.select name="style_id" span="Style">
            @foreach ($styles as $style)
                <option value="{{ $style->id }}" {{ (int)old("style_id") === $style->id ? "selected" : "" }}>{{ $style->title }}</option>
            @endforeach
        </x-forms.select>

        @if ($errors->has("create"))
            <p class="text-danger">{{ $errors->first("create") }}</p>
        @endif

        <button type="submit" class="btn btn-primary">Create</button>
    </x-forms.form>
@endsection