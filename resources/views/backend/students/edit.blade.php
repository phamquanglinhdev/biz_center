@extends("layouts.backend")
@section("content")
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Chỉnh sửa học sinh</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Học sinh</a></li>
                <li class="breadcrumb-item active">Basic Elements</li>
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
                            <li class="breadcrumb-item"><a class="h6 text-primary" href="{{route("backend.students.index")}}">Học sinh</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin học sinh {{$old->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route("backend.students.update")}}" method="post">
                            @csrf
                            @method("PUT")
                            @include("layouts.inc.avatar",['name'=>'avatar','old'=>$old,'label'=>'Ảnh đại diện'])
                            <input hidden name="id" value="{{$old->id}}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="code" class="form-label">Mã học sinh</label>
                                    <input type="text" name="code" class="form-control" id="code"
                                           value="{{$old->code??null}}" required>
                                    @error('code')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Tên học sinh</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           value="{{$old->name??null}}" required>
                                    @error('name')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="birthday" class="form-label">Ngày sinh</label>
                                    <input type="date" name="birthday" class="form-control" id="birthday"
                                           value="{{$old->birthday??null}}" required>
                                    @error('birthday')
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
                                               value="{{$old->phone??null}}"
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
                                               id="email" value="{{$old->email??null}}" placeholder="example@gmail.com"
                                               required>
                                        <i class="ri-mail-unread-line"></i>
                                    </div>
                                    @error('email')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="iconInput" class="form-label">Địa chỉ</label>
                                    <div class="form-icon">
                                        <input name="address" value="{{$old->address??null}}" type="text"
                                               class="form-control form-control-icon"
                                               id="address" placeholder="Phường(Xã) - Quận(Huyện) - Thành Phố(Tỉnh)">
                                        <i class="ri-user-location-fill"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 mt-3">
                                    <label for="parent" class="form-label">Tên phụ huynh</label>
                                    <input type="text" name="parent" value="{{$old->parent??null}}" class="form-control"
                                           id="parent">
                                </div>
                                <div class="col-md-6 mb-3 mt-3">
                                    <label class="form-label">Số điện thoại phụ huynh</label>
                                    <div class="input-group" data-input-flag="">
                                        <button class="btn btn-light border" type="button"
                                                aria-expanded="false"><img
                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/2560px-Flag_of_Vietnam.svg.png"
                                                alt="flag img" height="20" class="country-flagimg rounded"><span
                                                class="ms-2 country-codeno">+ 84</span></button>
                                        <input name="parent_phone" type="text"
                                               class="form-control rounded-end flag-input"
                                               value="{{$old->parent_phone??null}}"
                                               placeholder="Nhập số điện thoại"
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    @error('password')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100 mt-lg-3 text-center">
                                <button  class="btn btn-primary btn-label">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-check-fill label-icon align-middle fs-16 me-2"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            Cập nhật thông tin học sinh
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
