@extends("layouts.backend")
@section("content")
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Thêm nhân viên</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Nhân viên</a></li>
                <li class="breadcrumb-item active">Thêm nhân viên</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="card">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-3 py-2 mb-0">
                            <li class="breadcrumb-item"><a href="#"><i class="ri-home-5-fill"></i></a></li>
                            <li class="breadcrumb-item"><a class="h6 text-primary"
                                                           href="{{route("backend.staffs.index")}}">Nhân viên</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm nhân viên mới</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route("backend.staffs.store")}}" method="post" >
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="code" class="form-label">Mã nhân viên</label>
                                    <input type="text" name="code" class="form-control" id="code" required>
                                    @error('code')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Tên nhân viên</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                    @error('name')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="birthday" class="form-label">Ngày sinh</label>
                                    <input type="date" name="birthday" class="form-control" id="birthday" required>
                                    @error('birthday')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="job" class="form-label">Chức vụ</label>
                                    <input type="text" name="job" class="form-control" id="job" required>
                                    @error('job')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <div class="input-group" data-input-flag="">
                                        <button class="btn btn-light border" type="button"
                                                aria-expanded="false"><img
                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/2560px-Flag_of_Vietnam.svg.png"
                                                alt="flag img" height="20" class="country-flagimg rounded"><span
                                                class="ms-2 country-codeno">+ 84</span></button>
                                        <input name="phone" type="text" class="form-control rounded-end flag-input"
                                               value=""
                                               required
                                               placeholder="Nhập số điện thoại"
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    @error('phone')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="iconInput" class="form-label">Email</label>
                                    <div class="form-icon">
                                        <input name="email" type="email" class="form-control form-control-icon"
                                               id="email" placeholder="example@gmail.com" required>
                                        <i class="ri-mail-unread-line"></i>
                                    </div>
                                    @error('email')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    @error('password')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100 mt-lg-3 text-center">
                                <button class="btn btn-primary btn-label">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-check-fill label-icon align-middle fs-16 me-2"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            Thêm mới nhân viên
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
