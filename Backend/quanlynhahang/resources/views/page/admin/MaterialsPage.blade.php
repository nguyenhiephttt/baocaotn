@extends('layout.AdminPageLayout')
@section('master-admin')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Nguyên Liệu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="trangquanly">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản Lý Nhân Viên</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="timkiemNL" method="GET" class="form-inline">
                        <input class="form-control mr-sm-2" name='search' type="search" placeholder="Search"
                            aria-label="Search">
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã nguyên liệu</th>
                                <th>Tên nguyên liệu</th>
                                <th>Giá nguyên liệu</th>
                                <th>Ngày thêm</th>
                                <th>Loại nguyên liệu</th>
                                <th>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalAddMaterials">
                                        <i class="fas fa-plus-circle"></i> Thêm mới
                                    </button>
                                </th>
                                <!-- Modal add employee-->
                                <div class="modal fade" id="modalAddMaterials" tabindex="-1" role="dialog"
                                    aria-labelledby="modalAddMaterialsCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalAddMaterialsTitle">Thêm thông tin
                                                    nguyên liệu
                                                    viên</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="themDSNL" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="card card-default">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Thông tin nguyên liệu</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="collapse"><i
                                                                        class="fas fa-minus"></i></button>
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="remove"><i
                                                                        class="fas fa-remove"></i></button>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Tên nguyên liệu:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Thịt heo đùi"
                                                                            name='material_name' required>
                                                                        @if(Session::has('err'))

                                                                        <p class="alert alert-danger">
                                                                            {{Session::get('err')}}</p>

                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Danh mục:</label>
                                                                        <select
                                                                            class="form-control select2 select2-danger"
                                                                            data-dropdown-css-class="select2-danger"
                                                                            style="width: 100%;" name="material_id"
                                                                            required>
                                                                            @foreach ($categorymaterials as $item)
                                                                            <option
                                                                                value="{{$item->CATEGORYMATERIAL_ID}}">
                                                                                {{$item->CATEGORYMATERIAL_NAME}}
                                                                            </option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Giá mua vào:</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="20000" name="material_price"
                                                                            required>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>
                                                    </div>

                                                    <div class="card card-default">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Hình ảnh</h3>

                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="collapse"><i
                                                                        class="fas fa-minus"></i></button>
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="remove"><i
                                                                        class="fas fa-remove"></i></button>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <img src="https://via.placeholder.com/150x200"
                                                                        alt="..." class="img-thumbnail">
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Thêm
                                                                            ảnh</label>
                                                                        <input type="file" class="form-control-file"
                                                                            name="image" required>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $materials as $item )
                            <?php
                            $modalEditMaterials= "modal-Edit-Material".$item->MATERIALS_ID;

                            $modalDetailMaterials= "modal-Detail-Material".$item->MATERIALS_ID;
                            $modalDeleteMaterials= "modal-Delete-Material".$item->MATERIALS_ID;
                            ?>

                            <tr>
                                <td></td>
                                <td>{{$item->MATERIALS_NO}}</td>
                                <td>{{$item->MATERIALS_NAME}}</td>
                                <td>{{$item->MATERIALS_PRICE}}</td>
                                <td>{{$item->MATERIALS_DATE}}</td>
                                <td>{{$item->categorymaterials->CATEGORYMATERIAL_NAME}}</td>
                                <td>
                                    <i class="fas fa-info-circle text-secondary mr-3" data-toggle="modal"
                                        data-target="#{{$modalDetailMaterials}}"></i>
                                    <i class="fas fa-edit text-success mr-3" data-toggle="modal"
                                        data-target="#{{$modalEditMaterials}}"></i>
                                    <!-- Button trigger modal -->
                                    <i class="fas fa-trash-alt text-danger" data-toggle="modal"
                                        data-target="#{{$modalDeleteMaterials}}">
                                    </i>
                                </td>
                            </tr>
                            <!-- Modal xóa -->
                            <div class="modal fade" id="{{$modalDeleteMaterials}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Nhân Viên nghỉ việc</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('xoaNL',['materials_id' => $item->MATERIALS_ID])}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                Bạn có chắc chắn xác nhận xóa <b>{{$item->MATERIALS_NAME}}</b> ?

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary "
                                                    data-dismiss="modal">Trở lại</button>
                                                <button type="submit" class="btn btn-secondary">Lưu lại</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="{{$modalEditMaterials}}" tabindex="-1" role="dialog"
                                aria-labelledby="modalEditMaterialsCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditMaterialsTitle">Cập nhật thông tin nhân
                                                viên</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('suaDSNL',['materials_id' => $item->MATERIALS_ID])}}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Thông tin nguyên liệu</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse"><i
                                                                    class="fas fa-minus"></i></button>
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove"><i
                                                                    class="fas fa-remove"></i></button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Tên nguyên liệu:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Thịt heo đùi" name='material_name'
                                                                        value="{{$item->MATERIALS_NAME}}" required>
                                                                    {{-- @if(Session::has('err'))

                                                                        <p class="alert alert-danger">
                                                                            {{Session::get('err')}}</p>

                                                                    @endif --}}
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Danh mục:</label>
                                                                    <select class="form-control select2 select2-danger"
                                                                        data-dropdown-css-class="select2-danger"
                                                                        style="width: 100%;" name="category_id"
                                                                        required>
                                                                        <option selected='selected'
                                                                            value="{{$item->categorymaterials->CATEGORYMATERIAL_ID}}">
                                                                            {{$item->categorymaterials->CATEGORYMATERIAL_NAME}}
                                                                        </option>
                                                                        @foreach ($categorymaterials as $catematerial)
                                                                        <option
                                                                            value="{{$catematerial->CATEGORYMATERIAL_ID}}">
                                                                            {{$catematerial->CATEGORYMATERIAL_NAME}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Giá mua vào:</label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="20000" value='{{$item->MATERIALS_PRICE}}' name="material_price"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>

                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Hình ảnh</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse"><i
                                                                    class="fas fa-minus"></i></button>
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove"><i
                                                                    class="fas fa-remove"></i></button>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                            <img src="uploads/{{$item->MATERIALS_IMG}}" alt="..."
                                                                    class="img-thumbnail">
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Thêm
                                                                        ảnh</label>
                                                                    <input type="file" class="form-control-file"
                                                                        name="image" >
                                                                </div>
                                                                <!-- /.form-group -->
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="{{$modalDetailMaterials}}" tabindex="-1" role="dialog"
                                aria-labelledby="modalEditMaterialsCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditMaterialsTitle">Chi tiết thông tin nhân
                                                viên</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">Thông tin cá nhân</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse"><i
                                                                class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="remove"><i
                                                                class="fas fa-remove"></i></button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Mã nguyên liệu:</label>
                                                                <p>{{$item->MATERIALS_NO}}</p>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tên nguyên liệu:</label>
                                                                <p>{{$item->MATERIALS_NAME}}</p>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Danh mục:</label>
                                                            <p>{{$item->categorymaterials->CATEGORYMATERIAL_NAME}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Giá mua vào:</label>
                                                            <p>{{$item->MATERIALS_PRICE}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>

                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">Hình ảnh</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse"><i
                                                                class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="remove"><i
                                                                class="fas fa-remove"></i></button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="uploads/{{$item->MATERIALS_IMG}}" alt="..."
                                                                class="img-thumbnail">
                                                            <!-- /.form-group -->
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Chức vụ</th>
                                <th>Điện thoại</th>
                                <th>Loại nguyên liệu</th>
                                <th></th>
                            </tr>
                        </tfoot>

                    </table>

                    <div class="d-flex justify-content-end mt-4">
                        {{$materials->links()}}
                        <?php //Hiển thị thông báo thành công?>

                    </div>
                </div>
                @if ( session('success') )
                <div class="alert alert-success alert-dismissible m-2" role="alert" id="success-alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif

                <?php //Hiển thị thông báo lỗi?>
                @if ( session('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
@endsection
