@extends('layout.app')

@section('content')
    <h1>Đặt sân</h1>
<form action="" method="get">
    <input type="date" name="search" value="{{ $search }}">
    <button>chon ngay</button>
</form>
    <table border="1" width="50%">
        <tr>
            <th>
                Sân
            </th>
            @foreach ($listTime as $time)
            <th>{{$time->time_start}}-{{$time->time_end}}</th>
            @endforeach
            <th>
                Đặt sân
            </th>
        </tr>
        
        @foreach($listPitch as $pitch)
        <tr>
            <th>
                {{$pitch->pitch_name}}
            </th>
            @foreach ($listTime as $time)
            <th>
            @foreach($listBill as $ListBill)
            @if($ListBill->pitch_id == $pitch->id && $ListBill->time_start == $time->time_start)
                ok
            @endif
            @endforeach
            </th>
            @endforeach
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    +
                </button>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Đặt sân</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
          <form action="{{ route('bill.store') }}" method="post">
            @csrf
              <table>
                  <tr>
                      <td>
                          Tên khách hàng
                      </td>
                      <td>
                          <select name="customer_id">
                            @foreach ($listCustomer as $customer)
                                <option value="{{ $customer->id }}">
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                          </select>
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
                        Sân
                    </td>
                    <td>
                        <select name="pitch_id">
                          @foreach ($listPitch as $pitch)
                              <option value="{{ $pitch->id }}">
                                  {{ $pitch->pitch_name }}
                              </option>
                          @endforeach
                        </select>
                    </td>
                </tr>
                  <tr>
                      <td>
                          Ngày
                      </td>
                      <td>
                          <input type="date" name="day">
                      </td>
                  </tr>
                  <tr>
                      <td>
                          Time start 
                          <select name="time_start">
                              @foreach ($listTime as $time)
                              <option value={{$time->time_start}}>{{$time->time_start}}</option>
                              @endforeach
                          </select>
                          <br>
                          Time end
                          <select name="time_end">
                            @foreach ($listTime as $time)
                              <option value={{$time->time_end}}>{{$time->time_end}}</option>
                              @endforeach
                          </select>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          Đặt cọc
                          <input type="text" name="deposit"> VND
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button class="btn btn-primary">Đặt</button>
                      </td>
                  </tr>
              </table>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection