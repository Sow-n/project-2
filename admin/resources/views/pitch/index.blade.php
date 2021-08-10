@extends('layout.app')

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
    <h1>Danh sách các sân</h1>

    <a href="{{ route('pitch.create') }}">Thêm sân</a>

    <form action="" method="get">
        <input type="text" name="search" value="{{ $search }}"> <button>Search</button>
    </form>
    <table border="1">
        <tr>
            <th>Tên sân</th>
            <th>Khu vực</th>
            <th>Loại sân</th>
            <th>Ảnh</th>
            <th>Giá sân theo giờ</th>
            <th>Sửa thông tin sân</th>
        </tr>
        
        @foreach ($listPitch as $pitch)
        @if ($pitch->del_flag == 1)
        <tr>
            <td>{{ $pitch->pitch_name }}</td>
            <td>{{ $pitch->area_name }}</td>
            <td>{{ $pitch->pitch_type_name }}</td>
            <td width="25%">
                <img src="{{ asset('images/' . $pitch->image_path) }}"
                class="img-thumbnail">
            </td>
            <td>{{ $pitch->price }}</td>
            <td><a href="{{ route('pitch.edit', $pitch->id) }}" class="btn btn-warning">Sửa</a></td>
        </tr>
        @endif
        @endforeach

    </table>
    
{{ $listPitch->appends([
    'search' => $search
])->links() }}
@endsection