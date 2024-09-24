@extends('layouts.app')
@section('title', 'HomePage')
@section('content')
    <h1 class="mb-3">Thêm thương hiệu</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{$item}}
            </div>
        @endforeach
    @endif
    <form action="{{route('brands.create')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cate_name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="cate_name" name="name" placeholder="Tên thương hiệu">
          </div>
          <div class="mb-3">
            <label for="cate_desc" class="form-label">Mô tả</label>
            <textarea class="form-control" id="cate_desc" name="description" style="height: 100px" placeholder="Mô tả thương hiệu"></textarea>
          </div>
          <button class="btn btn-primary" type="submit">Button</button>
    </form>
@endsection