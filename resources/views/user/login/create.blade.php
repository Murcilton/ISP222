@extends('layouts.layout')

@section('title')
@parent - {{$title}}
@endsection

@section('content')

<div class="container">
    <h2 class="mt-5">Авторизация пользователя</h2>

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

    <form action="{{ route('login.store') }}" class="mt-5" method="POST">
        @csrf
        <div class="mb-3 mt-5">

            @error('email')
            <div class="alert alert-danger"> {{ $message }}</div>
            @enderror

            <label for="email" class="form-label">Title</label>
            <input type="text" name="email" class="form-control @error('content') is-invalid @enderror" id="email" placeholder="name@example.com"
            value="{{old('title')}}">
        </div>

        <div class="mb-3 mt-5">

            @error('title')
            <div class="alert alert-danger"> {{ $message }}</div>
            @enderror

            <label for="password" class="form-label">Title</label>
            <input type="password" name="password" class="form-control @error('content') is-invalid @enderror" id="password" placeholder="Password"
            value="{{old('title')}}">
        
        </div>

        <button type="submit" class="btn btn-danger mt-2">Отправить</button>
    </form>
</div>

@endsection