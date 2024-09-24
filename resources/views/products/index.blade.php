@extends('layouts.app')
@section('title', 'HomePage')
@section('content')
    <h1 class="mb-3">Danh sách danh mục</h1>
    <a class="btn btn-primary ms-auto w-fit" href="/products/create" role="button">Tạo mới</a>

    <div class="list-product mt-3">
      <div class="row">
        @foreach ($products as $item)
            <div class="col-3">
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$item['name']}}</h5>
                  <p class="mb-1 fs-6 fw-bold">Thương hiệu: {{ $item->brand->name }}</p>
                  <p class="mb-1 fs-6 fw-bold">Danh mục: {{ $item->category->name }}</p>
                  <p class="card-text">{{$item['description']}}</p>
                  <p class="mb-1 fs-6 fw-bold">Giá: {{$item['price']}}VNĐ</p>
                  @if ($item['sale_price'])
                      <p class="mb-1 fs-6 fw-bold">Sale: {{$item['sale_price']}}VNĐ</p>
                  @endif
                  <div class="d-flex align-items-center gap-3">
                    <a href='{{"/products/update/$item->id"}}' class="btn btn-info">Sửa</a>
                    <form action="{{route('products.delete', $item->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Xóa</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
      </div>
    </div>
@endsection