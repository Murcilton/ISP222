@extends('layouts.layout')

@section('title')
  @parent - {{ $title }}
@endsection

@section('content')

<html>
  <head>
      <title>Месяц</title>
  </head>
  <body>
    
    <form action="/task" method="POST" class="border mt-2 ">
      <p>Номер текущего месяца: {{ $currentMonth }}</p>
        @csrf
        <input type="text" name='newMonth' value="1">
        @if ($currentMonth == 1)
        <p>Зима</p>
        @elseif ($currentMonth == 2)
        <p>Зима</p>
        @elseif ($currentMonth == 12)
        <p>Зима</p>
        @elseif ($currentMonth == 3)
        <p>Весна</p>
        @elseif ($currentMonth == 4)
        <p>Весна</p>
        @elseif ($currentMonth == 5)
        <p>Весна</p>
        @elseif ($currentMonth == 6)
        <p>Лето</p>
        @elseif ($currentMonth == 7)
        <p>Лето</p>
        @elseif ($currentMonth == 8)
        <p>Лето</p>
        @elseif ($currentMonth == 9)
        <p>Осень</p>
        @elseif ($currentMonth == 10)
        <p>Осень</p>
        @elseif ($currentMonth == 11)
        <p>Осень</p>
        @elseif ($currentMonth > 12 || $currentMonth < 1)
        <p>ОШИБКАААА</p>
        @endif
        <button type="submit">Обновить</button>
    </form>

    <form action="/task" method="POST" class="border mt-2">
      <p>Возраст: {{ $currentAge }}</p>
        @csrf
        <input type="text" name='newAge' value="1">
        @unless ($currentAge >= 18)
        <p>Вы несовершеннолетний</p>
        @else
        <p>Вы совершеннолетний</p>
        @endunless
        <button type="submit">Обновить</button>
    </form>

    <form action="/task" method="POST" class="border mt-2">
      <p>Массив: </p>
      <ul>
        @foreach($currentArray as $item)
            {{ $item }}
        @endforeach
        
    </ul>
    <p>Сумма: {{ $sum = array_sum($currentArray) }} </p>
    @unless  ($sum != 0)
    Количество элементов равно нулю
    @endunless
    <input type="text" name='Array' value="1">
    @csrf
    <button type="submit">Обновить</button>
    </form>
    
    <form action="/task" method="POST" class="border mt-2">
      <p>Массив2: </p>
      <ul>
        @foreach($currentArray2 as $item)
          {{sqrt((float)$item)}}
        @endforeach
    </ul>
    
    <input type="text" name='Array2' value="1">
    @csrf
    <button type="submit">Обновить</button>
    </form>

    <form action="/task" method="POST" class="border mt-2">
      <p>Массив3: </p>
      <ul>
        @foreach($currentArray3 as $item2 => $value)
          <ul> {{ $value }} {{ $item2 }} </ul>
        @endforeach
    </ul>
    
    <input type="text" name='Array3' value="1">
    @csrf
    <button type="submit">Обновить</button>
    </form>

  </body>
  </html>

@endsection