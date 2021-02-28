@extends('layouts.helloapp')

@section('title','Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <p>必要なだけ記述できます。</p>

<table>
  <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
  @foreach ($items as $item)
    <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->mail}}</td>
      <td>{{$item->age}}</td>
    </tr>
    @endforeach
</table>

@component('components.message')
  @slot('msg_title')
  CAUTION!
  @endslot

  @slot('msg_content')
  これはメッセージの表示です。
  @endslot

@endcomponent

@include('components.message', ['msg_title'=>'OK', 'msg_content'=>'サブビューです。'])

{{-- //5-2
<ul>
  @each('components.item', $data_eachtest, 'item')
</ul>

<p>Controller value<br>'message' = {{$message}}</p>
<p>View value<br>'view_mesasge' = {{$view_message}}</p>
--}}

@endsection

@section('footer')
copyright 2021 SampleLaravel.
@endsection