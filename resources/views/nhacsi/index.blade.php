@extends('layouts.master')
@section('title')
    Danh sách nhạc sĩ
@endsection
@section('content')
    <a href="{{route('nhacsi.create')}}">
        <button class="btn btn-success">Thêm mới</button>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>ten</th>
                <th>anh</th>
                <th>ngay sinh</th>
                <th>que quan</th>
                <th>ngay tao</th>
                <th>ngay cap nhat</th>
                <th>hanh dong</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten}}</td>
                <td>
                    <img src="{{Storage::url($item->anh)}}" width="100px" height="100px">
                </td>
                <td>{{$item->ngaysinh}}</td>
                <td>{{$item->quequan}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td style="display: flex;">
                    <a href="{{route('nhacsi.show',$item->id)}}" class="btn btn-info">Show</a>
                    <a href="{{route('nhacsi.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('nhacsi.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method ('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('ok xóa không')" type="submit">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
@endsection