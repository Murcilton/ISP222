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
<h1 class="mt-5">Create Account</h1>
        <form action="{{ route('enter.store2') }}" class="mt-5" method="POST">
            @csrf
            <div class="mb-3 mt-5">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="name" class="form-label">Имя</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Имя" value="{{old('title')}}">
                
            </div>
            <div class="mb-3 mt-2">
                @error('mail')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="name" class="form-label">Имя</label>
                <input type="text" name="mail" class="form-control @error('mail') is-invalid @enderror" id="mail" placeholder="Почта" value="{{old('title')}}">
                
            </div>
            <div class="mb-3 mt-2">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="name" class="form-label">Номер телефона</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Номер телефона" value="{{old('title')}}">
                
            </div>
            
            

            <button type="submit" class="btn btn-primary mt-2">Отправить</button>
        </form>

    </div>
@endsection