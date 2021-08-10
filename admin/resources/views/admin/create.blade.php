@extends('layout.app')

@section('content')
    <h1>Thêm nhân viên</h1>

    <form action="{{ route('admin.store') }}" method="post">
        @csrf
        <table border="1">
            <tr>
                <td>
                    Họ Tên
                </td>
                <td>
                    <input type="text" name="name" required>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="text" name="email" required>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="text" name="password" required>
                </td>
            </tr>
            <tr>
                <td>
                    Giới tính 
                </td>
                <td>
                    <input type="radio" name="gender" value="1" checked> Nam
                    <input type="radio" name="gender" value="0"> Nữ
                </td>
            </tr>
            <tr>
                <td>
                    Số điện thoại
                </td>
                <td>
                    <input type="text" name="phone" required>
                </td>
            </tr>
            <tr>
                <td>
                    Ngày sinh
                </td>
                <td>
                    <input type="date" name="date_birth" required>
                </td>
            </tr>
            <tr>
                <td>
                    Địa chỉ
                </td>
                <td>
                    <input type="text" name="address" required>
                </td>
            </tr>
            <tr>
                <td>
                    Vai trò
                </td>
                <td>
                    <input type="text" name="role" value="Nhân viên" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    Khu vực 
                </td>
                <td>
                    <select name="area_id">
                        @foreach ($listArea as $area)
                            <option value="{{ $area->id }}">
                                {{ $area->area_name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button>Thêm nhân viên</button>
                    <button>Hủy</button>
                </td>
            </tr>
        </table>
    </form>
@endsection