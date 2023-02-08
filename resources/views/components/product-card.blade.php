
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" >
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="{{ asset('storage/' . $product->main_image) }}" alt="IMG-PRODUCT">

            <button role="button" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"
                data-toggle="modal" data-target="#showProductModal{{ $product->id }}">
                {{__("front.Quick View")}}
            </button>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{ $product->title }}
                </a>

                <span class="stext-105 cl3">
                    L.E{{ $product->price }}

                </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                    <img class="icon-heart1 dis-block trans-04"
                        src="{{ asset('fronty') }}/images/icons/icon-heart-01.png" alt="ICON">
                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                        src="{{ asset('fronty') }}/images/icons/icon-heart-02.png" alt="ICON">
                </a>
            </div>
        </div>
    </div>
</div>




{{-- start bootstra modal --}}
<!-- Modal -->
<div class="modal fade" id="showProductModal{{ $product->id }}" tabindex="-1"
    aria-labelledby="showProductModal{{ $product->id }}" aria-hidden="true">
    <div style="min-width: 850px;margin-top:5rem;" class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">

            <div class="modal-body">
                <div class="container">
                    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                        <button class="how-pos3 hov3 trans-04 ">
                            <img src="{{ asset('fronty') }}/images/icons/icon-close.png" alt="CLOSE">
                        </button>

                        <div class="row">
                            <div class="col-md-6 col-lg-7 p-b-30">
                                <img style="width: 100%" src="{{ asset('storage/'.$product->main_image) }}">
                            </div>

                            <div class="col-md-6 col-lg-5 p-b-30">
                                <div class="p-r-50 p-t-5 p-lr-0-lg">
                                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                        {{$product->title}}
                                    </h4>

                                    <span class="mtext-106 cl2">
                                        L.E{{$product->price}}

                                    </span>

                                    <p class="stext-102 cl3 p-t-23">
                                        {{$product->description}}
                                    </p>

                                    <!--  -->

                                    <div class="p-t-33">
                                        @if ($product->sizes()->count())
                                        <div class="flex-w flex-r-m p-b-10">
                                            <div class="size-203 flex-c-m respon6">
                                                Size
                                            </div>

                                            <div class="size-204 respon6-next">
                                                <div class="rs1-select2 bor8 bg0">
                                                    <select class="js-select2" name="time">
                                                        <option>{{__("front.Choose Size")}}</option>
                                                        @foreach ($product->sizes as $size)
                                                        <option value="{{$size->value}}">{{$size->value}}</option>
                                                        @endforeach

                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($product->colors()->count())

                                        <div class="flex-w flex-r-m p-b-10">
                                            <div class="size-203 flex-c-m respon6">
                                                Color
                                            </div>

                                            <div class="size-204 respon6-next">
                                                <div class="rs1-select2 bor8 bg0">
                                                    <select class="js-select2" name="time">
                                                        <option>{{__("front.Choose Color")}}</option>
                                                        @foreach ($product->colors as $color)
                                                        <option value="{{$color->color}}">{{$color->color}}</option>
                                                        @endforeach                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="flex-w flex-r-m p-b-10">
                                            <div class="size-204 flex-w flex-m respon6-next">
                                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                        name="num-product" value="1">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>

                                                <button
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                    {{__("front.ADD TO CART")}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--  -->
                                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                        <div class="flex-m bor9 p-r-10 m-r-11">
                                            <a href="#"
                                                class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                                data-tooltip="Add to Wishlist">
                                                <i class="zmdi zmdi-favorite"></i>
                                            </a>
                                        </div>

                                        <a href="#"
                                            class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                            data-tooltip="Facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>

                                        <a href="#"
                                            class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                            data-tooltip="Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>

                                        <a href="#"
                                            class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                            data-tooltip="Google Plus">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- end bootstrap --}}



    {{-- Start modal --}}

</div>

{{-- end modal --}}
