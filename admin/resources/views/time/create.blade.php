@extends('layout.app')

@section('content')
    <h1>Thêm khung thời gian</h1>

    <form action="{{ route('time.store') }}" method="post">
        @csrf
    <table border="1">
        <tr>
            <th>Thời gian bắt đầu</th>
            <td>
                <input type="time" name="time_start" required>
            </td>
        </tr>
        <tr>
            <th>Thời gian kết thúc</th>
            <td>
                <input type="time" name="time_end" required>
            </td>
        </tr>
        <tr>
            <td>
                <button>Thêm</button>
            </td>
        </tr>
    </table>
    </form>
@endsection