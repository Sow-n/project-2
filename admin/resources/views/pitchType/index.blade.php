@extends('layout.app')

@section('content')
    <h1>Danh sách loại sân</h1>
    
    <a href="{{ route('pitchType.create') }}">Thêm loại sân</a>

    <form action="" method="post">
        <table border="1">
            <tr>
                <th>Thể loại</th>
                <th>Sửa thông tin</th>
            </tr>
            @foreach ($listPitchType as $type)
            <tr>
                <td>{{ $type->pitch_type_name }}</td>
                <td><a class="btn btn-warning" href="{{ route('pitchType.edit', $type->id) }}">Sửa</a></td>
            </tr>
            @endforeach
        </table>
    </form>
@endsection