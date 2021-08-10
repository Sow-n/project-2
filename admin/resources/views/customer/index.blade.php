@extends('layout.app')

@section('content')
    <h1>Danh sách khách hàng</h1>

    <table border="1">
        <tr>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Số điện thoại</th>
        </tr>
        @foreach ($listCustomer as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->date_birth }}</td>
            <td>{{ $customer->GenderName }}</td>
            <td>{{ $customer->phone }}</td>
        </tr>
        @endforeach
    </table>

{{ $listCustomer->appends([
    'search' => $search
])->links() }}
@endsection