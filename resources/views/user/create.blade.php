@extends('layouts.layout')

@section('title')
    @parent - {{ $title }}
@endsection

@section('content')
    <div class="container">

{{-- <div class="mt-5">
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
</div> --}}
<h1 class="mt-5">Auth Account</h1>
        <form action="{{ route('user.store') }}" class="mt-5" method="POST">
            @csrf
            <div class="mb-3 mt-5">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="name" class="form-label">Имя</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Имя" value="{{old('title')}}">
                
            </div>
            <div class="mb-3 mt-2">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email" class="form-label">Почта</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Почта" value="{{old('title')}}">
                
            </div>
            <div class="mb-3 mt-2">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="password" class="form-label">Пороль</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Введите пароль" value="">
                
            </div>

            <div class="mb-3 mt-2">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="password_confirmation" class="form-label">Подтверждение пороля</label>
                <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" placeholder="Повторно введите пароль" value="">
                
            </div>
            
            

            <button type="submit" class="btn btn-primary mt-2">Отправить</button>
        </form>

    </div>
@endsection