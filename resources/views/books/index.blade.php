@extends('layouts.master')
@section('title')
    danh sach book
@endsection
@section('content')
<table class="table">
    <a href="{{route('books.create')}}">ADD</a>
    <tr>
        <th>ID</th>
        <th>ten</th>
        <th>nha xuat ban</th>
        <th>tac gia</th>
        <th>anh</th>
        <th>so luong</th>
        <th>trang thai</th>
        <th>hanh dong</th>
    </tr>
    @foreach ($data as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->public_company}}</td>
        <td>{{$item->author->name}}</td>
        <td>
            <img src="{{Storage::url($item->image)}}" width="100px" height="100px">
        </td>
        <td>{{$item->quantity}}</td>
        <td>
            {!!$item->is_active ? '<span class="badge bg-success">Hoat dong</span>'
            : '<span class="badge bg-danger">khong hoat dong</span>'!!}
        </td>  
        <td style="display: flex">
           
            <a href="{{route('books.show',$item)}}" class="btn btn-info">Show</a>
            <a href="{{route('books.edit',$item)}}" class="btn btn-warning">Edit</a>
            <form action="{{route('books.destroy',$item)}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>  
    </tr>   
    @endforeach
        
</table>
@endsection