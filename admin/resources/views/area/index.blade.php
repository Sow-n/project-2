@extends('layout.app')

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

    <h1>Danh sách khu vực</h1>

    <a href="{{ route('area.create') }}" class="btn btn-success btn-sm">Thêm khu vực</a>

    <form action="" method="get">
        <input type="text" name="search" value="{{ $search }}"> <button>Search</button>
    </form>

    <table border="1">
        <tr>
            <th>Tên khu vực</th>
            <th>Ảnh</th>
            <th>Địa chỉ</th>
            <th>Sửa thông tin</th>
        </tr>
        @foreach ($listArea as $area)
            @if ($area->del_flag == 1)
            <tr>
                <td>
                    {{ $area->area_name }}
                </td>
                <td width="25%">
                    <img src="{{ asset('images/' . $area->image_path) }}"
                    class="img-thumbnail">
                </td>
                <td>
                    {{ $area->area_address }}
                </td>
                <td>
                    <a href="{{ route('area.edit', $area->id) }}">Sửa</a>
                </td>
            </tr>
            @endif
        @endforeach
    </table>

{{ $listArea->appends([
    'search' => $search
])->links() }}
@endsection