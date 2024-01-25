@extends('layouts.layout')

@section('title')
  @parent - {{ $title }}
@endsection

@section('header')
@parent

@endsection

@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
</section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Почта</th>
                <th scope="col">Админ</th>
                <th scope="col">Почта подтверждена</th>
                <th scope="col">Пороль</th>
                <th scope="col">Remember_token</th>
                <th scope="col">Создан</th>
                <th scope="col">Обновлён</th>


              </tr>
            </thead>
    @foreach ($enter as $acc)
            <tbody>
              <tr>
                <th scope="row">{{ $acc->id }}</th>
                <td>{{ $acc->name }}</td>
                <td>{{ $acc->email }}</td>
                <td>{{ $acc->is_admin }}</td>

                <td>{{ $acc->email_verified_at }}</td>
                <td>{{ $acc->password }}</td>
                <td>{{ $acc->remember_token }}</td>
                <td>{{ $acc->created_at }}</td>
                <td>{{ $acc->update_at }}</td>                
              </tr>
              
    @endforeach
</table>


      </div>
    </div>
  </div>
@endsection