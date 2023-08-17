@extends('admin.layout.LayoutMain')
@section('title','Coupon')
@section('content-main-page')
    <form action="{{isset($coupon) ? route('admin.coupon.update',$coupon->id) : route('admin.coupon.store')}}"
          method="post">
        @csrf
        @isset($coupon)
            @method('PUT')
        @endisset
        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger text-center">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bol pb-4">{{isset($coupon) ? 'Sửa mã giảm giá' : 'Thêm mã giảm giá'}}</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="name"
                                                   onkeyup="ChangeToSlug()"
                                                   class="form-control"
                                                   id="coupon_name"
                                                   value="{{old('name', $coupon->name ?? null)}}">
                                            @error('name')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Slug</label>
                                        <div class="col-lg-10">
                                            <input type="text"
                                                   name="slug"
                                                   class="form-control"
                                                   id="coupon_slug"
                                                   value="{{old('slug',$coupon->slug ?? null)}}">
                                            @error('slug')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Code</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="code" class="form-control"
                                                   value="{{old('code', $coupon->code ?? null)}}">
                                            @error('code')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Type</label>
                                        <div class="col-lg-10">
                                            <select class="custom-select" name="type">
                                                <option value="0">---- Chọn loại mã giảm giá ----</option>
                                                <option value="fixed"
                                                        @if(isset($coupon) && $coupon->type == 'fixed') selected @endif>
                                                    ---- Giảm giá trực tiếp ----
                                                </option>
                                                <option value="percent"
                                                        @if(isset($coupon) && $coupon->type == 'percent') selected @endif>
                                                    ---- Giảm theo phần trăm ----
                                                </option>
                                            </select>
                                            @error('type')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">value</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="value" class="form-control"
                                                   value="{{old('value',$coupon->value ?? null)}}">
                                            @error('value')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">cart_value</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="cart_value" class="form-control"
                                                   value="{{old("cart_value",$coupon->cart_value ?? null)}}">
                                            @error('cart_value')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Expiry Date</label>
                                        <div class="col-lg-10">
                                            <input type="date" name="expiry_date" class="form-control"
                                                   value="{{old("expiry_date",$coupon->expiry_date ?? null)}}" wire:model="expiryDate">
                                            @error('expiry_date')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <button class="btn btn-success waves-effect width-md waves-light" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </form>
@endsection
@section('scrip-custom')
    <script type="text/javascript">
        function ChangeToSlug() {
            let slug;
            //Lấy text từ thẻ input title
            slug = document.getElementById("coupon_name").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('coupon_slug').value = slug;
        }
    </script>

@endsection

