
<div class="row mx-0">
    <div class="flex-w m-tb-10">
        <div
            class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-5 m-tb-4"
            id="js-filter-product">
            <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
            <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
            Filter
        </div>
    </div>
    <div class="flex-w m-tb-10">
        <div
            class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04  m-tb-4"
            id="js-sort-product">
            <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
            <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
            Sort
        </div>
    </div>
</div>
<div class="w-full p-b-30">
    <div class="dis-none panel-sort" id="panel-sort">
        <div class="wrap-filter">
            <div class="text-dark ">
                <ul>
                    <li class="p-t-10">
                        <input type="radio" checked="" id="rd-default" name="attr-sort"
                               class="attr-filter d-none">
                        <label class="pointer mx-auto" for="rd-default">Mặc định</label>
                    </li>
                    <li class="py-1">
                        <input type="radio" id="rd-low-to-high" name="attr-sort"
                               class="attr-filter d-none">
                        <label class="pointer mx-auto" for="rd-low-to-high">Giá cao</label>
                    </li>
                    <li class="py-1">
                        <input type="radio" id="rd-high-to-low" name="attr-sort"
                               class="attr-filter d-none">
                        <label class="pointer mx-auto" for="rd-high-to-low">Giá thấp</label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="dis-none panel-filter w-full p-b-30" id="panel-filter">
        <div class="wrap-filter bg6">
            <div class="row">
                <div class="p-tb-20 col-md-4 col-sm-6 col-xs-12">
                    <div class="mtext-115 cl2 m-b-15 boder-bottom-1">Price</div>
                    <ul>
                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="radio" id="attr-filter-price"
                                   name="attr-filter-price" checked value="">
                            <label for="attr-filter-price">Mặc định</label>
                        </li>
                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="radio" id="attr-filter-price_0-200"
                                   name="attr-filter-price" value="0-200000">
                            <label for="attr-filter-price_0-200">0 - 200.000 vnđ</label>
                        </li>

                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="radio"
                                   id="attr-filter-price_200-300"
                                   name="attr-filter-price" value="200000-300000">
                            <label for="attr-filter-price_200-300">200.000 - 300.000 vnđ</label>
                        </li>

                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="radio"
                                   id="attr-filter-price_300-500"
                                   name="attr-filter-price" value="300000-500000">
                            <label for="attr-filter-price_300-500">300.000 - 500.000 vnđ</label>
                        </li>

                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="radio" id="attr-filter-price_500"
                                   name="attr-filter-price" value="500000">
                            <label for="attr-filter-price_500"> trên 500.000 vnđ</label>
                        </li>

                        <li class="p-b-6">
                            <span>Tìm kiếm</span>
                        </li>
                        <li class="p-b-6">
                            <form class="d-flex align-items-center justify-content-around">
                                <div class="wrap-input1">
                                    <input class="input1 bg-none plh1 stext-107 cl7" type="text"
                                           name="priceStart" placeholder="Price Start">
                                    <div class="focus-input1 trans-04"></div>
                                </div>
                                <span class="m-lr-20">to</span>
                                <div class="wrap-input1">
                                    <input class="input1 bg-none plh1 stext-107 cl7" type="text"
                                           name="priceStart" placeholder="Price Start">
                                    <div class="focus-input1 trans-04"></div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="p-tb-20 col-md-4 col-sm-6 col-xs-12">
                    <div class="mtext-115 cl2 m-b-15 boder-bottom-1">Color</div>

                    <ul>
                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="checkbox" id="attr-color_black"
                                   value="">
                            <label for="attr-color_black">
                                            <span class="fs-15 lh-12 m-r-6" style="color: #222">
                                              <i class="fa-solid fa-circle-dot"></i>
                                            </span>
                                <span> Black </span>
                            </label>
                        </li>
                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="checkbox" id="attr-color_a"
                                   value="">
                            <label for="attr-color_a">
                                            <span class="fs-15 lh-12 m-r-6" style="color: #222">
                                              <i class="fa-solid fa-circle-dot"></i>
                                            </span>
                                <span> Black </span>
                            </label>
                        </li>
                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="checkbox" id="attr-color_b"
                                   value="">
                            <label for="attr-color_b">
                                            <span class="fs-15 lh-12 m-r-6" style="color: #222">
                                              <i class="fa-solid fa-circle-dot"></i>
                                            </span>
                                <span> Black </span>
                            </label>
                        </li>

                    </ul>
                </div>
                <div class="p-tb-20 col-md-4 col-sm-6 col-xs-12">
                    <div class="mtext-115 cl2 m-b-15 boder-bottom-1">Color</div>

                    <ul>
                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="checkbox" id="attr-size-S" value="">
                            <label for="attr-size-S">
                                <span> S </span>
                            </label>
                        </li>
                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="checkbox" id="attr-size-M" value="">
                            <label for="attr-size-M">
                                <span> M </span>
                            </label>
                        </li>
                        <li class="p-b-6">
                            <input class="attr-filter d-none" type="checkbox" id="attr-size-L" value="">
                            <label for="attr-size-L">
                                <span> L </span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <button class="btn-submit-filter m-b-11" type="button"> Xác nhận</button>
        </div>
    </div>
</div>
