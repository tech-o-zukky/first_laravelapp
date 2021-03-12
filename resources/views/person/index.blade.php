@extends('layouts.helloapp')

@section('title','Person.index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <table>
    <tr><th>Person</th><th>Board</th></tr>
    @foreach ($items as $item)
      <tr>
        <td>{{$item->getData()}}</td>
        <td>
        @if ($item->board !=null)
          {{$item->board->getData()}}
        @endif
        </td>
      </tr>
    @endforeach


    {{-- 6-36に伴い削除
    <tr><th>Data</th></tr>
    @foreach ($items as $item)
      <tr>
        <td>{{$item->getData()}}</td>
      </tr>
    @endforeach
    --}}

      {{-- 6-6
      @foreach ($items as $item)
      <table>
        <tr>
          <th>Name</th>
          <th>Mail</th>
          <th>Age</th>
      </tr>
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->age}}</td>
      </tr>
      @endforeach
      --}}

  </table>
@endsection

@section('footer')
copyright 2021 SampleLaravel.
@endsection