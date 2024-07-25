@extends('layouts.master')
@section('title')
    ADD
@endsection
@section('content')
    <form action="{{route('books.store')}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-3">
            <label for="" class="form-label">Tac gia</label>
            <select name="author_id" id="" class="form-select">
                @foreach ($authors as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">
            <label for="" class="form-label">Ten</label>
            <input type="text" class="form-control" name="name" >
        </div>

        <div class="mt-3">
            <label for="" class="form-label">nha xuat ban</label>
            <input type="text" class="form-control" name="public_company" >
        </div>

        <div class="mt-3">
            <label for="" class="form-label">image</label>
            <input type="file" class="form-control" name="image" >
            
        </div>

        <div class="mt-3">
            <label for="" class="form-label">so luong</label>
            <input type="text" class="form-control" name="quantity" >
        </div>

        <div class="mt-3">
            <label for="" class="form-label">trang thai</label>
            <input type="checkbox" class="form-check-input" name="is_active"  checked>
        </div>

      

        <button class="btn btn-success mb-5">ADD</button>
    </form>
@endsection