@extends('layout.app')

@section('content')
    <h1>Sửa tên thể loại sân</h1>

    <form action="{{ route('pitchType.update', $pitchType->id) }}" method="post">
        @method('PUT')
        @csrf
        <table border="1">
            <tr>
                <td>
                    Tên loại sân
                </td>
                <td>
                    <input type="text" name="type_name" value="{{ $pitchType->pitch_type_name }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    Trạng thái hoạt động
                </td>
                <td>
                    <input type="radio" name="del_flag" value="1" @if ($pitchType->del_flag == 1) checked @endif> Hoạt động
                    <input type="radio" name="del_flag" value="0" @if ($pitchType->del_flag == 0) checked @endif> Ngừng hoạt động
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