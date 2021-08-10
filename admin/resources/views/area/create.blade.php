@extends('layout.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-success">
        <ul>
            @foreach ($errors->any() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Thêm khu vực</h1>
<form action="{{ route('area.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <table border="1">
        <tr>
            <td>
                Tên khu vực
            </td>
            <td>
                <input type="text" name="area_name" required>
            </td>
        </tr>
        <tr>
            <td>
                Chọn ảnh
            </td>
            <td>
                <input type="file" name="image" required>
            </td>
        </tr>
        <tr>
            <td>
                Địa chỉ
            </td>
            <td>
                <input type="text" name="area_address" required>
            </td>
        </tr>
        <tr>
            <td>
                <button>Thêm khu vực</button>
                <button>Hủy</button>
            </td>
        </tr>
    </table>
</form>
@endsection