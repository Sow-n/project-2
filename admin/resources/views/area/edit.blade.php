@extends('layout.app')

@section('content')
    <h1>Sửa thông tin khu vực</h1>

    <form action="{{ route('area.update', $area->id) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <table border="1">
            <tr>
                <td>
                    Tên khu vực
                </td>
                <td>
                    <input type="text" name="area_name" value="{{ $area->area_name }}">
                </td>
            </tr>
            <tr>
                <td>
                    Chọn ảnh
                </td>
                <td>
                    <img src="{{ asset('images/' . $area->image_path) }}"
                    class="img-thumbnail" width="300">
                    <input type="file" name="image">
                    <input type="hidden" name="hidden_image" value="{{ $area->image_path }}">
                </td>
            </tr>
            <tr>
                <td>
                    Địa chỉ
                </td>
                <td>
                    <input type="text" name="area_address" value="{{ $area->area_address }}">
                </td>
            </tr>
            <tr>
                <td>
                    Trạng thái hoạt động
                </td>
                <td>
                    <input type="radio" name="del_flag" value="1" @if ($area->del_flag == 1) checked @endif>Hoạt động
                    <input type="radio" name="del_flag" value="0" @if ($area->del_flag == 0) checked @endif>Dừng hoạt động
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button>Cập nhật</button>
                </td>
            </tr>
        </table>
    </form>
@endsection