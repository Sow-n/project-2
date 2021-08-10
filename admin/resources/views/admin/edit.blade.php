@extends('layout.app')

@section('content')
    <h1>Sửa thông tin nhân viên</h1>

    <form action="{{ route('admin.update', $admin->id) }}" method="post">
        @method('PUT')
        @csrf
        <table border="1">
            <tr>
                <td>
                    Họ Tên
                </td>
                <td><input type="text" name="name" value="{{ $admin->name }}" required></td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td><input type="text" name="email" value="{{ $admin->email }}" required></td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td><input type="text" name="password" value="{{ $admin->password }}" required></td>
            </tr>
            <tr>
                <td>
                    Ngày sinh
                </td>
                <td><input type="date" name="date_birth" value="{{ $admin->date_birth }}" required></td>
            </tr>
            <tr>
                <td>
                    Giới tính
                </td>
                <td>
                    <input type="radio" name="gender" value="1" @if ($admin->gender == 1) checked @endif>Nam
                    <input type="radio" name="gender" value="0" @if ($admin->gender == 0) checked @endif>Nữ
                </td>
            </tr>
            <tr>
                <td>
                    Số điện thoại
                </td>
                <td><input type="text" name="phone" value="{{ $admin->phone }}" required></td>
            </tr>
            <tr>
                <td>
                    Địa chỉ
                </td>
                <td><input type="text" name="address" value="{{ $admin->address }}" required></td>
            </tr>
            <tr>
                <td>
                    Quản lý khu vực
                </td>
                <td>
                    <select name="area_id">
                        @foreach ($listArea as $area)
                            <option value="{{ $area->id }}" @if ($admin->area_id == $area->id) selected @endif>
                                {{ $area->area_name }}
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
                    <input type="radio" name="del_flag" value="1" @if ( $admin->del_flag == 1 ) checked @endif > Hoạt động
                    <input type="radio" name="del_flag" value="0" @if ( $admin->del_flag == 0 ) checked @endif > Nghỉ việc
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