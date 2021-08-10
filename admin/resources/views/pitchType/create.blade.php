@extends('layout.app')

@section('content')
    <h1>Thêm loại sân</h1>

    <form action="{{ route('pitchType.store') }}" method="post">
        @csrf
        <table border="1">
            <tr>
                <td>
                    Tên loại sân
                </td>
                <td>
                    <input type="text" name="type_name">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button>Thêm</button>
                </td>
            </tr>
        </table>
    </form>
@endsection