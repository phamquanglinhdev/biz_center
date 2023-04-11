<div class="container-fluid">
    <div id="two-column-menu">
    </div>
    <ul class="navbar-nav" id="navbar-nav">
        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
        <li class="nav-item">
            <a class="nav-link menu-link" href="#">
                <i class="las la-house-damage"></i> <span data-key="t-dashboard">Bảng điều khiển</span>
            </a>
        </li>
        {{--        Người dùng--}}
        <li class="nav-item">
            <a class="nav-link menu-link" href="#users" data-bs-toggle="collapse"
               role="button" aria-expanded="false" aria-controls="sidebarInvoiceManagement">
                <i class="ri-user-line"></i> <span data-key="t-users">Người dùng</span>
            </a>
            <div class="collapse menu-dropdown" id="users">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-user">Nhân viên</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("backend.students.index")}}" class="nav-link" data-key="t-user">Học sinh</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-user">Giáo viên</a>
                    </li>
                </ul>
            </div>
        </li>
        {{--        lớp học--}}
        <li class="nav-item">
            <a class="nav-link menu-link" href="#grade" data-bs-toggle="collapse"
               role="button" aria-expanded="false" aria-controls="sidebarInvoiceManagement">
                <i class="ri-slideshow-line"></i> <span data-key="t-grades">Lớp học</span>
            </a>
            <div class="collapse menu-dropdown" id="grade">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{route("backend.grades.index")}}" class="nav-link" data-key="t-grade">
                            Lớp đang học</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-grade">Lớp đã kết thúc</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-grade">Nhật ký buổi học</a>
                    </li>
                </ul>
            </div>
        </li>
        {{--        Tài chính--}}
        <li class="nav-item">
            <a class="nav-link menu-link" href="#finance" data-bs-toggle="collapse"
               role="button" aria-expanded="false" aria-controls="sidebarInvoiceManagement">
                <i class="ri-wallet-line"></i> <span data-key="t-finances">Tài chính</span>
            </a>
            <div class="collapse menu-dropdown" id="finance">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-finance">
                            Thu học phí</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-finance">Thu khác</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-finance">Chi lương giáo viên</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-finance">Chi khác</a>
                    </li>
                </ul>
            </div>
        </li>
        {{--        Tài liệu--}}
        <li class="nav-item">
            <a class="nav-link menu-link" href="#document" data-bs-toggle="collapse"
               role="button" aria-expanded="false" aria-controls="sidebarInvoiceManagement">
                <i class="ri-git-repository-line"></i> <span data-key="t-documents">Tài liệu</span>
            </a>
            <div class="collapse menu-dropdown" id="document">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-document">Danh mục tài liệu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-document">Tài liệu</a>
                    </li>
                </ul>
            </div>
        </li>
        {{--        Công việc--}}
        <li class="nav-item">
            <a class="nav-link menu-link" href="#">
                <i class="ri-creative-commons-nd-line"></i> <span data-key="t-tasks">Công việc</span>
            </a>
        </li>
    </ul>
</div>
