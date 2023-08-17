@extends('admin.layout.LayoutMain')
@if(!empty($title))
    @section('title',$title)
@endif
@section('content-main-page')
    <form action="{{route('admin.attribute.store')}}"
          method="post">
        @csrf
        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger text-center">
                {{ session()->get('error') }}
            </div>
        @endif
        @error('attribute_size')
        <div class="alert alert-danger text-center">
            {{$message}}
        </div>
        @enderror
        @error('size_slug')
        <div class="alert alert-danger text-center">
            {{$message}}
        </div>
        @enderror
        @error('attribute_color_name')
        <div class="alert alert-danger text-center">
            {{$message}}
        </div>
        @enderror
        @error('color_slug')
        <div class="alert alert-danger text-center">
            {{$message}}
        </div>
        @enderror
        @error('attribute')
        <div class="alert alert-danger text-center">
            {{$message}}
        </div>
        @enderror
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bol pb-4">Thêm mới thuộc tính</h4>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Thuộc tính</label>
                            <div class="col-lg-10">
                                <select class="custom-select col-4" name="attribute" id="product_att">
                                    <option value="0" class="text-center">Chọn thuộc tính sản phẩm</option>
                                    <option value="color" class="text-center">Màu sắc</option>
                                    <option value="size" class="text-center">Size</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="select_value">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Giá trị</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="attribute_size"
                                                   placeholder="Điền size sản phẩm (S,M,L,....)"
                                                   id="attribute_size"
                                                   class="form-control col-4 my-2 d-none"
                                                   onkeyup="ChangeToSlug(attribute_size,size_slug)"
                                                   value="">


                                            <input type="hidden" name="size_slug" id="size_slug">
                                            <input type="color" class="col-md-4 form-control d-none"
                                                   name="attribute_color_value" id="attribute_color_value">
                                            <input type="text" onkeyup="ChangeToSlug(attribute_color_name,color_slug)"
                                                   class="col-md-4 form-control my-2 d-none"
                                                   name="attribute_color_name" id="attribute_color_name"
                                                   placeholder="Điền tên màu (Xanh, Đỏ, Trắng)">
                                            <input type="hidden" name="color_slug" id="color_slug">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <button class="btn btn-success waves-effect waves-light" type="submit">
                                    Submit
                                </button>
                            </div>
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
    <script>
        $('div.select_value').hide();
        $('#product_att').change(function () {
            if ($('#product_att option:checked').val() === 'color') {
                $('div.select_value').show();
                $('#attribute_color_name').removeClass('d-none');
                $('#attribute_color_value').removeClass('d-none');
                $('#attribute_size').addClass('d-none');

            } else if ($('#product_att option:checked').val() === 'size') {
                $('div.select_value').show();
                $('#attribute_size').removeClass('d-none');
                $('#attribute_color_name').addClass('d-none');
                $('#attribute_color_value').addClass('d-none');
            }else {
                $('div.select_value').hide();
            }
        })

        function ChangeToSlug(input_value, input_change) {
            let slug;

            //Lấy text từ thẻ input title
            slug = input_value.value;
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
            input_change.value = slug;
        }
    </script>
@endsection
