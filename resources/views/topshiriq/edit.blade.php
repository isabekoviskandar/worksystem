<!-- resources/views/topshiriq/edit.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>

        <form action="{{ route('topshiriq.update', $topshiriq->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $topshiriq->title) }}" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $topshiriq->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ijrochi">Ijrochi</label>
                <input type="text" name="ijrochi" id="ijrochi" class="form-control" value="{{ old('ijrochi', $topshiriq->ijrochi) }}" required>
            </div>

            <div class="form-group">
                <label for="muddat">Muddat</label>
                <input type="text" name="muddat" id="muddat" class="form-control" value="{{ old('muddat', $topshiriq->muddat) }}" required>
            </div>

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="file" id="file" class="form-control">
                @if($topshiriq->file)
                    <p>Current file: <a href="{{ asset('storage/' . $topshiriq->file) }}" target="_blank">{{ $topshiriq->file }}</a></p>
                @endif
            </div>

            <div class="form-group">
                <label for="hudud_id">Hududs</label>
                <select name="hudud_id[]" id="hudud_id" class="form-control" multiple>
                    @foreach($hududs as $hudud)
                        <option value="{{ $hudud->id }}" {{ in_array($hudud->id, $topshiriq->hududs->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $hudud->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning mt-3">Update Task</button>
        </form>
    </div>
@endsection