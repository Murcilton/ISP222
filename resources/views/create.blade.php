@extends('layouts.layout')

@section('title')
@parent - {{$title}}
@endsection

@section('content')

<div class="container">

    <!-- <div class="mt-5">
        <h1>Create Post</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div> -->

    <form action="{{ route('post.store') }}" class="mt-5" method="POST">
        @csrf
        <div class="mb-3 mt-5">

            @error('title')
            <div class="alert alert-danger"> {{ $message }}</div>
            @enderror

            <label for="Title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('content') is-invalid @enderror" id="title" placeholder="name@example.com"
            value="{{old('title')}}">
        
        </div>
        <div class="mb-3">

            @error('content')
            <div class="alert alert-danger"> {{ $message }}</div>
            @enderror
        
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3">{{old('content')}}</textarea>
        </div>

            @error('rubric_id')
            <div class="alert alert-danger"> {{ $message }}</div>
            @enderror

        <select class="form-select @error('content') is-invalid @enderror" id="rubric_id" name="rubric_id">
            <option selected>Выберите рубрику</option>

            @foreach ($rubrics as $key => $value)
            <option value="{{ $key }}" @if(old('rubric_id')==$key) selected @endif> {{ $value }} </option>
            @endforeach

        </select>

        <button type="submit" class="btn btn-danger mt-2">Отправить</button>
    </form>
</div>

@endsection