@extends('layout.app')

@section('content')
    <h1>Danh sách thời gian</h1>

    <a href="{{ route('time.create') }}">Thêm thời gian</a>

    <table border="1">
        <tr>
            <th>Thời gian bắt đầu</th>
            <th>Thời gian kết thúc</th>
            <th>Sửa</th>
        </tr>
        @foreach ($time as $time)
        <tr>
            <td>{{ $time->time_start }}</td>
            <td>{{ $time->time_end }}</td>
            <td><a href="{{ route('time.edit', $time->id) }}">Sửa</a></td>
        </tr>
        @endforeach
    </table>
@endsection