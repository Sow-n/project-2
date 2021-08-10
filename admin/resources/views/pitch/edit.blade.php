@extends('layout.app')

@section('content')
    <h1>Sửa thông tin sân</h1>

    <form action="{{ route('pitch.update', $pitch->id) }}" method="post">
        @method('PUT')
        @csrf
        <table border="1">
            <tr>
                <td>
                    Tên sân
                </td>
                <td>
                    <input type="text" name="pitch_name" value="{{ $pitch->pitch_name }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    Ảnh
                </td>
                <td>
                    <img src="{{ asset('images/' . $pitch->image_path) }}"
                    class="img-thumbnail" width="300">
                    <input type="file" name="image">
                    <input type="hidden" name="hidden_image" value="{{ $pitch->image_path }}">
                </td>
            </tr>
            <tr>
                <td>
                    Giá sân theo giờ (VND)
                </td>
                <td>
                    <input type="text" name="price" value="{{ $pitch->price }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    Khu vực
                </td>
                <td>
                    <select name="area_id">
                        @foreach ($listArea as $area)
                            <option value="{{ $area->id }}" @if ( $pitch->area_id == $area->id ) selected @endif>
                                {{ $area->area_name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Loại sân
                </td>
                <td>
                    <select name="pitch_type_id">
                        @foreach ($listPitchType as $pitchType)
                            <option value="{{ $pitchType->id }}" @if ( $pitch->pitch_type_id == $pitchType->id ) selected @endif>
                                {{ $pitchType->pitch_type_name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Trạng thái hoạt động
                </td>
                <td>
                    <input type="radio" name="del_flag" value="1" @if ($pitch->del_flag == 1) checked @endif>Hoạt động
                    <input type="radio" name="del_flag" value="0" @if ($pitch->del_flag == 0) checked @endif>Ngừng hoạt động
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