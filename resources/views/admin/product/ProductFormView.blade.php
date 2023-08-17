@extends('admin.layout.LayoutMain')
@if(!empty($title))
    @section('title',$title)
@endif
@section('content-main-page')
    <form action="{{isset($product) ? route('admin.product.update',$product->id) : route('admin.product.store')}}"
          method="post">
        @csrf
        @isset($product)
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
                        <h4 class="font-weight-bol pb-4">Thêm mới sản phẩm</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" onkeyup="ChangeToSlug();" name="product_name"
                                                   id="product_name" class="form-control"
                                                   @if(!empty($product))
                                                   value="{{$product->name}}"
                                                @endif
                                            >
                                            @error('product_name')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Slug</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="product_slug" id="product_slug"
                                                   class="form-control"
                                                   @if(!empty($product))
                                                   value="{{$product->slug}}"
                                                @endif
                                            >
                                            @error('product_slug')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Giá</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="product_price" id="product_price"
                                                   class="form-control"
                                                   value="{{!empty($product) ? $product->price : 0}}"
                                            >
                                            @error('product_price')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Phần trăm giảm</label>
                                        <div class="col-lg-10">
                                            <input type="number" name="discount_number" id="discount_number"
                                                   class="form-control"
                                                   value="{{!empty($product) ? $product->discount_number : 0}}"
                                            >
                                            @error('discount_number')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">SKU</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="product_sku" id="product_sku"
                                                   class="form-control"
                                                   @if(!empty($product))
                                                   value="{{$product->sku}}"
                                                @endif
                                            >
                                            @error('product_sku')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Danh mục</label>
                                        <div class="col-lg-10">
                                            <select class="custom-select" id="abc" name="product_category">
                                                @foreach($optionCategories as $key => $value)
                                                    <option value="{{$value->id}}"
                                                        {{isset($product) && $value->id == $product->category_id ? 'selected' : ''}}
                                                    >
                                                        @php
                                                            echo str_repeat('|--', $value->level). '&nbsp;&nbsp;' .$value->category_name;
                                                        @endphp
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Thuộc tính sản phẩm</label>
                                        <div class="col-lg-10">
                                            <div class="toggle-button-demo">
                                                <input type="checkbox"
                                                       class="slideon slideon-auto slideon-success d-block"
                                                       name="product_att_status"
                                                       id="product_active_att"
                                                       @if(!empty($product) && $product->product_att_status == 1)
                                                       value="1" checked
                                                       @else
                                                       value="0"
                                                    @endif
                                                >
                                            </div>
                                            <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-success my-2"
                                                    id="btn_att_add"
                                                    data-toggle="modal" data-target="#modal_add_products_att">
                                                Thêm thuộc tính
                                            </button>
                                            {{--Start Model thêm thuộc tính--}}
                                            <div class="modal" id="modal_add_products_att">
                                                <div class="modal-dialog" style="max-width: 1024px">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Thuộc tính sản phẩm</h4>
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="box-product_att mb-2 rounded">
                                                                <div class="row mx-0">
                                                                    <h5 class="mx-2 col-md-9">
                                                                        Size</h5>
                                                                    <a href="javascript:void(0);"
                                                                       class="add_button_size px-4"
                                                                       title="Add field">
                                                                                <span
                                                                                    class="btn btn-success waves-effect width-xs waves-light">
                                                                                    Thêm
                                                                                </span>
                                                                    </a>
                                                                </div>

                                                                <div class="field_wrapper_size">
                                                                    @if(Illuminate\Support\Facades\Route::getCurrentRoute()->getActionMethod() == 'edit')
                                                                        @foreach(array_unique($product->productDetails->pluck('size_id')->toArray()) as $values)
                                                                            <div class="row py-2 mx-0">
                                                                                <select
                                                                                    class="custom-select col-md-9 mx-2 select-size"
                                                                                    onfocus="checkSelect(2)"
                                                                                    name="category">
                                                                                    @foreach($size as $value)
                                                                                        <option
                                                                                            @if($values == $value->id) selected
                                                                                            @endif
                                                                                            value="{{$value->id}}">{{$value->name}}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <a href="javascript:void(0);"
                                                                                   class="remove_button px-4">
                                                                            <span
                                                                                class="btn btn-danger waves-effect width-xs waves-light">
            <i class="mdi mdi-trash-can"></i>
            </span>
                                                                                </a>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <div class="row py-2 mx-0">
                                                                            <select
                                                                                class="custom-select col-md-9 mx-2 select-size"
                                                                                onfocus="checkSelect(2)"
                                                                                name="category">
                                                                                <option value="0">--- Chọn size sản phẩm
                                                                                    ---
                                                                                </option>
                                                                                @foreach($size as $value)
                                                                                    <option
                                                                                        value="{{$value->id}}">{{$value->name}}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <a href="javascript:void(0);"
                                                                               class="remove_button px-4">
                                                                            <span
                                                                                class="btn btn-danger waves-effect width-xs waves-light">
            <i class="mdi mdi-trash-can"></i>
            </span>
                                                                            </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="box-product_att mb-2 rounded">
                                                                <div class="row mx-0">
                                                                    <h5 class="mx-2 col-md-9">Màu sản phẩm</h5>
                                                                    <a href="javascript:void(0);"
                                                                       class="add_button_color px-4"
                                                                       title="Add field">
                                                                            <span
                                                                                class="btn btn-success waves-effect width-xs waves-light">
                                                                                Thêm
                                                                            </span>
                                                                    </a>
                                                                </div>
                                                                <div class="field_wrapper_color text-center">
                                                                    @if(Illuminate\Support\Facades\Route::getCurrentRoute()->getActionMethod() == 'edit')
                                                                        @foreach(array_unique($product->productDetails->pluck('color_id')->toArray()) as $values)
                                                                            <div class="row py-2 mx-0">
                                                                                <select
                                                                                    class="custom-select col-md-9 mx-2 select-color"
                                                                                    onfocus="checkSelect(1)"
                                                                                    name="">
                                                                                    @foreach($color as $value)
                                                                                        <option
                                                                                            {{$values == $value->id ? 'selected' : null}}
                                                                                            value="{{$value->id}}">{{$value->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <a href="javascript:void(0);"
                                                                                   class="remove_button px-4">
                                                                            <span
                                                                                class="btn btn-danger waves-effect width-xs waves-light">
            <i class="mdi mdi-trash-can"></i>
            </span>
                                                                                </a>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <div class="row py-2 mx-0">
                                                                            <select
                                                                                class="custom-select col-md-9 mx-2 select-color"
                                                                                onfocus="checkSelect(1)"
                                                                                name="">
                                                                                @foreach($color as $value)
                                                                                    <option
                                                                                        value="{{$value->id}}">{{$value->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <a href="javascript:void(0);"
                                                                               class="add_button_color px-4"
                                                                               title="Add field">
                                                                            <span
                                                                                class="btn btn-success waves-effect width-xs waves-light">
                                                                                <i class="mdi mdi-file-document-box-plus-outline"></i>
                                                                            </span>
                                                                            </a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info"
                                                                    data-dismiss="modal" onclick="confirmAtt()">Xác
                                                                nhận
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--End thêm thuộc tính--}}

                                            <div class="box-product_att mb-2 rounded" id="product_box_variant">
                                                <h5 class="mx-2">Biên thể sản phẩm</h5>
                                                <div class="field_wrapper_variant">
                                                    @if(Illuminate\Support\Facades\Route::getCurrentRoute()->getActionMethod() == 'edit')
                                                        @foreach($product->productDetails as $value)
                                                            <div class="row py-2 mx-0 border-top align-items-center">
                                                                <div class="col-md-2 text-center rounded border">
                                                                    <h5>{{$productService->getColor($value->color_id)}}
                                                                        | {{$productService->getSize($value->size_id)}}</h5>
                                                                </div>
                                                                <input type="hidden" class="product_color"
                                                                       name="product_color[]"
                                                                       value="{{$value->color_id}}">
                                                                <input type="hidden" class="product_size"
                                                                       name="product_size[]"
                                                                       value="{{$value->size_id}}">
                                                                <input type="number" placeholder="Giá sản phẩm"
                                                                       class="form-control col-md-3 mx-2 products_price_value"
                                                                       name="products_price_value[]"
                                                                       value="{{$value->price}}">
                                                                <input type="text" placeholder="SKU"
                                                                       class="form-control col-md-3 mx-2 size_value products_sku_value"
                                                                       name="products_sku_value[]" id=""
                                                                       value="{{$value->sku}}">
                                                                <input type="number" placeholder="Số lượng"
                                                                       class="form-control col-md-3 mx-2 size_value"
                                                                       name="products_qty_value[]" id=""
                                                                       value="{{$value->quantity}}">
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Description</label>
                                        <div class="col-lg-10">
                                                <textarea name="product_description" id="product_description">
                                                    {{!empty($product->description) ? $product->description : ''}}
                                                </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Content</label>
                                        <div class="col-lg-10">
                                            <textarea name="product_content" id="product_content">
                                                {{!empty($product->content) ? $product->content : ''}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Hiển thị sản phẩm</label>
                                        <div class="col-lg-10">
                                            <div class="toggle-button-demo">
                                                <input type="checkbox" name="product_active"
                                                       class="slideon slideon-auto slideon-success"
                                                       id="product_active"
                                                       @if(!empty($product) && $product->active == 1)
                                                       value="1" checked
                                                       @else
                                                       value="0"
                                                    @endif>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Thumbnail</label>
                                        <div class="col-lg-10">
                                            <input class="d-block" type="hidden" name="product_image"
                                                   id="product_image"
                                                   value="{{!empty($product->photo) ? $product->photo : ''}}">
                                            <img class="d-block pb-2 img-fluid img-thumbnail mb-2"
                                                 id="show_product_img"
                                                 width="100px" height="auto"
                                                 src="{{!empty($product->photo) ? asset('uploads') . '/' . $product->photo : ''}}">
                                            <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-success"
                                                    data-toggle="modal"
                                                    data-target="#modal_product-images">
                                                Chọn ảnh
                                            </button>
                                        </div>
                                        <div class="modal" id="modal_product-images">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Quản lý file</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <iframe
                                                            src="{{asset('assets/libs/file-manager')}}/dialog.php?akey=dGhpcyBpcyBrZXkK&field_id=product_image"
                                                            frameborder="0"
                                                            width="100%" height="500px"
                                                            style="overflow-y: scroll"></iframe>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Hình ảnh sản phẩm</label>
                                        <div class="col-lg-10">
                                            <input class="d-block" type="hidden" name="product_images"
                                                   id="product_images"
                                                   value="{{!empty($product) ? implode(',',$product->find($product->id)->gallery->pluck('name')->toArray()) : ''}}">
                                            <div class="box-image mb-2 rounded">
                                                @if(!empty($product->gallery))
                                                    @foreach($product->gallery as $value)
                                                        <img class="img-fluid img-thumbnail"
                                                             src="{{asset('uploads') . '/' . $value->name}}"
                                                             width="100px" alt="">
                                                    @endforeach
                                                @endif
                                            </div>
                                            <button type="button"
                                                    class="btn btn-icon waves-effect waves-light btn-success"
                                                    data-toggle="modal"
                                                    data-target="#modal_sub-product-images">
                                                Chọn ảnh
                                            </button>
                                        </div>
                                        <div class="modal" id="modal_sub-product-images">
                                            <div class="modal-dialog" style="max-width: 1024px">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Quản lý file</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <iframe
                                                            src="{{asset('assets/libs/file-manager')}}/dialog.php?akey=dGhpcyBpcyBrZXkK&field_id=product_images"
                                                            frameborder="0"
                                                            width="100%" height="500px"
                                                            style="overflow-y: scroll"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <button class="btn btn-success waves-effect width-md waves-light float-right" type="submit">
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
    <script>

        $(document).ready(function () {
            let maxField = 10; //Input fields increment limitation
            let addButton = $('.add_button_size'); //Add button selector
            let wrapper = $('.field_wrapper_size'); //Input field wrapper
            let i = 0;
            let x = 1; //Initial field counter is 1
            //Once add button is clicked
            $(addButton).click(function () {
                ++i;
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{route('admin.ajaxSelectSizes')}}",
                        type: "post",
                        success: function (data) {
                            $(wrapper).append(data);
                        },
                    })
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });

        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>

    <script>

        $(document).ready(function () {
            let maxField = 10; //Input fields increment limitation
            let addButton = $('.add_button_color'); //Add button selector
            let wrapper = $('.field_wrapper_color'); //Input field wrapper
            let i = 0;
            let x = 1; //Initial field counter is 1
            //Once add button is clicked
            $(addButton).click(function () {
                ++i;
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{route('admin.ajaxSelectColors')}}",
                        type: "post",
                        success: function (data) {
                            $(wrapper).append(data);
                        },
                    })
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });

        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>

    <script src="{{asset('assets\libs\tinymce\tinymce.min.js')}}"></script>
    <script src="{{asset('assets\libs\tinymce\config.js')}}"></script>

    <script>

        $('#modal_product-images').on('hidden.bs.modal', function () {
            let img_product = $('#product_image').val();
            $("img#show_product_img").attr('src', img_product);
        })

        $('#modal_sub-product-images').on('hidden.bs.modal', replaceImagesName)

        function replaceImagesName() {
            let image = $('input#product_images');
            let _imgs = image.val();
            let img_list = '';
            let _html = '';
            if (_imgs.indexOf('[') === 0) {
                img_list = $.parseJSON(_imgs);
                for (let i = 0; i < img_list.length; i++) {
                    _html += '<img class="img-fluid img-thumbnail" src="' + img_list[i] + '" width="100px" alt="">';
                }
            } else {
                img_list = _imgs;
                _html += '<img class="img-fluid img-thumbnail" src="' + img_list + '" width="100px" alt="">';
            }
            $('.box-image').html(_html);
            image.attr('value', img_list)
        }

        let ArrColors = [];

        function putColorValue(i) {
            let selectValue = $('#products_color_' + i + ':selected').val();
            let input = $('#ip_products_color_' + i);
            input.attr('value', selectValue);
            if (!ArrColors.includes(input)) {
                ArrColors.push(selectValue);
            }
        }

        function putSizeValue(i) {
            let selectValue = $('#products_size_' + i).val();
            let input = $('#ip_products_size_' + i);
            input.attr('value', selectValue);
        }

        $('#product_active_att').on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('checked', true);
                $(this).attr('value', 1);
                $('#product_box_variant').show()
                $('#btn_att_add').show()
            } else {
                $(this).attr('checked', false);
                $(this).attr('value', 0);
                $('#product_box_variant').hide()
                $('#btn_att_add').hide()
            }
        })

        $('#product_active').on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('checked', true);
                $(this).attr('value', 1);
            } else {
                $(this).attr('checked', false);
                $(this).attr('value', 0);
            }
        })

        if ($('#product_active_att').val() == 0) {
            $('#product_box_variant').hide()
            $('#btn_att_add').hide()
        } else {
            $('#product_box_variant').show()
            $('#btn_att_add').show()
        }

        function confirmAtt() {
            let wrapper = $('.field_wrapper_variant'); //Input field wrapper
            let colorArr = [];
            let sizeArr = [];
            let price = $('#discount_number').val() === 0 ? $('#product_price').val() : $('#product_price').val() - ($('#discount_number').val() * $('#product_price').val()) / 100;

            $('.select-color').each(function () {
                colorArr.push({
                    name: $(this).find('option:selected').text(),
                    value: $(this).find('option:selected').val()
                });
            })
            $('.select-size').each(function () {
                sizeArr.push({
                    name: $(this).find('option:selected').text(),
                    value: $(this).find('option:selected').val()
                });
            })
            let sku = $('#product_sku').val()
            if (!wrapper.length) {
                $.each(colorArr, function (index, value) {
                    $.each(sizeArr, function (k, v) {
                        if (value.value != 0 && v.value != 0) {
                            let sub_sku = sku + '-' + v.name + '-' + value.name;
                            $(wrapper).append(
                                '<div class="row py-2 mx-0 border-top align-items-center">' +
                                '<div class="col-md-2 text-center rounded border">' +
                                '<h5> ' + value.name + ' | ' + v.name + '</h5>' +
                                '</div>' +
                                '<input type="hidden" class="product_color" name="product_color[]" value="' + value.value + '" id="">' +
                                '<input type="hidden" class="product_size" name="product_size[]" value="' + v.value + '" id="">' +
                                '<input type="number" placeholder="Giá sản phẩm" class="form-control col-md-3 mx-2 products_price_value" name="products_price_value[]" id="" value="' + price + '">' +
                                '<input type="text" placeholder="SKU" class="form-control col-md-3 mx-2 size_value products_sku_value" name="products_sku_value[]" id="" value="' + sub_sku.replace(/\s/g, '') + '">' +
                                '<input type="number" placeholder="Số lượng" class="form-control col-md-3 mx-2 size_value" name="products_qty_value[]" id="" value="1">' +
                                '</div>'
                            );
                        } else {
                            $(wrapper).append(
                                '<h3 class="text-center" ">' +
                                'Vui lòng chọn lại' +
                                '</h3>'
                            );
                        }
                    })
                })
            } else {
                $(".field_wrapper_variant").empty()
                $.each(colorArr, function (index, value) {
                    $.each(sizeArr, function (k, v) {
                        let sub_sku = sku + '-' + v.name + '-' + value.name;
                        sub_sku.replace(/\s/g, '');
                        if (value.value != 0 && v.value != 0) {
                            let sub_sku = sku + '-' + v.name + '-' + value.name;
                            $(wrapper).append(
                                '<div class="row py-2 mx-0 border-top align-items-center">' +
                                '<div class="col-md-2 text-center rounded border">' +
                                '<h5> ' + value.name + ' | ' + v.name + '</h5>' +
                                '</div>' +
                                '<input type="hidden" class="product_color" name="product_color[]" value="' + value.value + '" id="">' +
                                '<input type="hidden" class="product_size" name="product_size[]" value="' + v.value + '" id="">' +
                                '<input type="number" placeholder="Giá sản phẩm" class="form-control col-md-3 mx-2 products_price_value" name="products_price_value[]" id="" value="' + price + '">' +
                                '<input type="text" placeholder="SKU" class="form-control col-md-3 mx-2 size_value products_sku_value" name="products_sku_value[]" id="" value="' + sub_sku.replace(/\s/g, '') + '">' +
                                '<input type="number" placeholder="Số lượng" class="form-control col-md-3 mx-2 size_value" name="products_qty_value[]" id="" value="1">' +
                                '</div>'
                            );
                        } else {
                            $(wrapper).append(
                                '<h3 class="text-center" ">' +
                                'Vui lòng chọn lại' +
                                '</h3>'
                            );
                        }
                    })
                })
            }
        }

        function checkSelect(flag) {
            let arr = [];
            arr.splice(0, arr.length);
            if (flag === 1) {
                $(".select-color").find("option:checked").each(function () {
                    if ($(this).val() != 0) {
                        arr.push($(this).val());
                    }
                })
                $('.select-color option').each(function () {
                    if (arr.includes($(this).val())) {
                        $(this).attr('disabled', true)
                    } else {
                        $(this).attr('disabled', false)
                    }
                })
            } else {
                $(".select-size").find("option:checked").each(function () {
                    if ($(this).val() != 0) {
                        arr.push($(this).val());
                    }
                })
                $('.select-size option').each(function () {
                    if (arr.includes($(this).val())) {
                        $(this).attr('disabled', true)
                    } else {
                        $(this).attr('disabled', false)
                    }
                })
            }
        }
    </script>
@endsection


