@extends('layout.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-success">
        <ul>
            @foreach ($errors->any() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
    <h1>Thêm thông tin sân</h1>

    <form action="{{ route('pitch.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <table border="1">
            <tr>
                <td>
                    Tên sân
                </td>
                <td>
                    <input type="text" name="pitch_name" required>
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
                <td>
                    Loại sân
                </td>
                <td>
                    <select name="pitch_type_id">
                        @foreach ($listPitchType as $pitch)
                            <option value="{{ $pitch->id }}">
                                {{ $pitch->pitch_type_name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Chọn ảnh
                </td>
                <td>
                    <input type="file" name="image" required>
                </td>
            </tr>
            <tr>
                <td>
                    Giá sân theo giờ (VND)
                </td>
                <td>
                    <input type="text" name="price" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button>Thêm sân</button>
                </td>
            </tr>
        </table>
    </form>
@endsection