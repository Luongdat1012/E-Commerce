@extends('admin.layout.LayoutMain')
@if(!empty($title))
    @section('title',$title)
@endif
@section('content-main-page')

    <form action="{{isset($category) ? route('admin.category.update',$category->id) : route('admin.category.store')}}"
          method="post">
        @csrf
        @isset($category)
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
                        <h4 class="font-weight-bol pb-4">{{$title}}</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <input type="hidden" name="level" id="category_level" value="{{isset($category) ? $category->level : 0}}">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="name" id="category_name" onkeyup="ChangeToSlug()" class="form-control"
                                                   value="{{isset($category) ? $category->category_name : ''}}">
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
                                            <input type="text" name="slug" id="category_slug" class="form-control"
                                                   value="{{isset($category) ? $category->slug : ''}}">
                                            @error('slug')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Category</label>
                                        <div class="col-lg-10">
                                            <select class="custom-select" name="category_parent" id="category_option">
                                                <option value="0">--- Danh mục cha ---</option>
                                                @foreach($optionCategories as $key => $value)
                                                    <option
                                                        {{isset($category) && (in_array($value->id, $nonSelect) || $value->id == $category->id) ? "disabled" : ""  }}
                                                        {{isset($category) && $category->parent_id == $value->id ? "selected" : "" }} value="{{$value->id}}">
                                                        @php
                                                            echo str_repeat('|--', $value->level). '&nbsp;&nbsp;' .$value->category_name;
                                                        @endphp
                                                    </option>
                                                @endforeach
                                            </select>
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
        function ChangeToSlug()
        {
            let slug;
            //Lấy text từ thẻ input title
            slug = document.getElementById("category_name").value;
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
            document.getElementById('category_slug').value = slug;
        }

        let value = $('#category_option');
        $(value).change(function () {
            let number = $(this).find('option:selected').text().split("|--").length - 1
            $('#category_level').attr('value',number)
        })
    </script>

@endsection
