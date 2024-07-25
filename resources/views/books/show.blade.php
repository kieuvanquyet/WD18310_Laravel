@extends('layouts.master')
@section('title')
    Show nhạc sĩ
@endsection
@section('content')
    <ul>
        <li>tên: {{$book->name}}</li>
        <li>nha xuat ban: {{$book->public_company}}</li>
        <li>anh:
            @if (! empty($book->image))
            <div class="" style="width: 100px">
                <img src="{{Storage::url($book->image)}}" style="width: 100px" alt="">
            </div>
            @endif
        </li>
        <li>tac gia: {{$book->author->name}}</li>
        <li>soluong: {{$book->quantity}}</li>
        <li>trangthai: 
            <input type="checkbox" class="form-check-input" @checked($book->is_active)>
        </li>
    </ul>
@endsection