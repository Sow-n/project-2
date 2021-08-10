<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                  <a class="navbar-brand" href="{{ route('admin.index') }}">Quản lý nhân viên</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('area.index') }}">Quản lý khu vực</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pitch.index') }}">Quản lý sân</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pitchType.index') }}">Quản lý thể loại sân</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.index') }}">Quản lý khách hàng</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('time.index') }}">Quản lý thời gian</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('bill.index') }}">Đặt sân</a>
                      </li>
                    </ul>
                  </div>
              </nav>
        </div>
    </div>
</div>