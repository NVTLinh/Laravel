@extends('layouts.app')
@section('title', 'HomePage')
@section('content')
    <h1 class="mb-3">Danh sách danh mục</h1>
    <a class="btn btn-primary ms-auto w-fit" href="/categories/create" role="button">Tạo mới</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Tên</th>
            <th scope="col">Mô tả</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['description']}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection