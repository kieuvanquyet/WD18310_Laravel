@extends('layouts.master')
@section('title')
    UPDATE
@endsection
@section('content')
    <form action="{{route('books.update',$book)}}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mt-3">
            <label for="" class="form-label">Tac gia</label>
            <select name="author_id" id="" class="form-select">
                @foreach ($authors as $id => $name)
                    <option value="{{$id}}" @selected($id == $book->author_id)>{{$name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <label for="" class="form-label">Ten</label>
            <input type="text" class="form-control" name="name" value="{{$book->name}}">
        </div>

        <div class="mt-3">
            <label for="" class="form-label">nha xuat ban</label>
            <input type="text" class="form-control" name="public_company" value="{{$book->public_company}}">
        </div>

        <div class="mt-3">
            <label for="" class="form-label">image</label>
            <input type="file" class="form-control" name="image" >
            @if (! empty($book->image))
            <div class="" style="width: 100px">
                <img src="{{Storage::url($book->image)}}" style="width: 100px" alt="">
            </div>
            @endif
        </div>

        <div class="mt-3">
            <label for="" class="form-label">so luong</label>
            <input type="text" class="form-control" name="quantity" value="{{$book->quantity}}">
        </div>

        <div class="mt-3">
            <label for="" class="form-label">trang thai</label>
            <input type="checkbox" class="form-check-input" name="is_active"  @checked($book->is_active)>
        </div>

      

        <button class="btn btn-success mb-5">UPDATE</button>
    </form>
@endsection