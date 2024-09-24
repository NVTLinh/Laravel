@extends('layouts.app')
@section('title', 'HomePage')
@section('content')
    <h1 class="mb-3">Sửa sản phẩm</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{$item}}
            </div>
        @endforeach
    @endif
    <form action="{{route('products.update', $product->id)}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Ảnh</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <div class="mb-3">
            <label for="cate_name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="cate_name" name="name" placeholder="Tên sản phẩm" value="{{$product->name}}">
        </div>
        <div class="mb-3">
            <label for="cate_desc" class="form-label">Mô tả</label>
            <textarea class="form-control" id="cate_desc" name="description" style="height: 100px" placeholder="Mô tả sản phẩm">{{$product->description}}</textarea>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="brand_id">
                <option selected disabled>-- Chọn thương hiệu --</option>
                @foreach ($brands as $item)
                    <option value="{{$item['id']}}" {{$product->brand_id === $item['id'] ? 'selected' : ''}}>{{$item['name']}}</option>                    
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected disabled>-- Chọn danh mục --</option>
                @foreach ($categories as $item)
                    <option value="{{$item['id']}}" {{$product->category_id === $item['id'] ? 'selected' : ''}}>{{$item['name']}}</option>                    
                @endforeach
            </select>
        </div>
        <div class="d-flex align-items-center gap-3">
            <div class="input-group w-100">
                <input type="text" class="form-control" placeholder="Giá thông thường" name="price"
                value="{{$product->price}}">
                <span class="input-group-text">VND</span>
            </div>
            <div class="input-group w-100">
                <input type="number" class="form-control" placeholder="Giá sale" name="sale_price"
                value="{{$product->sale_price}}">
                <span class="input-group-text">VND</span>
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Cập nhật</button>
        </div>
    </form>
@endsection