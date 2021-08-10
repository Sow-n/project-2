@extends('layout.app')

@section('content')
    <h1>Danh sách nhân viên</h1>

    <a href="{{ route('admin.create') }}">Thêm nhân viên</a>

    <form action="" method="get">
        <input type="text" name="search" value="{{ $search }}"> <button>Search</button>
    </form>

    <table border="1">
        <tr>           
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Quản lý khu vực</th>
            <th>Sửa thông tin</th>
        </tr>
        @foreach ($listAdmin as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->date_birth }}</td>
                <td>{{ $admin->GenderName }}</td>
                <td>{{ $admin->phone }}</td>
                <td>{{ $admin->address }}</td>
                <td>{{ $admin->area_name }}</td>
                <td><a href="{{ route('admin.edit', $admin->id) }}">Sửa</a></td>
            </tr>
        @endforeach
    </table>

{{ $listAdmin->appends([
    'search' => $search
])->links() }}
@endsection