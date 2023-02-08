@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.products.index') }}">عرض كل المنتجات</a>

    <div class="container-fluid ">
        <div class="row  my-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="m-3" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.products.update', $item->id) }}" role="form">
                    @csrf
                    @method('PUT')

                    <div class="row mt-2">

                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">اسم المنتج عربي</label>
                            @error('title_ar')
                                <div class="right badge badge-danger ">{{ $message = 'يجب ادخال الحقل' }}</div>
                            @enderror
                            <input name="title_ar" value="{{ old('title_ar', $item->title_ar) }}" type="text"
                                class="form-control @error('title_ar') is-invalid @enderror" id="exampleInputEmail1">
                        </div>

                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">اسم المنتج انجليزي</label>
                            @error('title_en')
                                <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                            @enderror
                            <input name="title_en" value="{{ old('title_en', $item->title_en) }}" type="text"
                                class="form-control @error('title_en') is-invalid @enderror" id="exampleInputEmail1">
                        </div>
                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">القسم - category</label>
                            @error('quantity')
                                <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                            @enderror
                            <select class="form-control" name="category_id" id="">
                                @foreach (\App\Models\Category::all() as $cat)
                                    <option {{ old('category_id', $item->category_id) == $cat->id ? 'selected' : '' }}
                                        value="{{ $cat->id }}">{{ $cat->title_ar }} - {{ $cat->title_en }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">العلامات - Tags</label>
                            @error('quantity')
                                <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                            @enderror

                            @foreach (\App\Models\Tag::all() as $tag)
                                <div class="form-check">
                                    <input {{ $item->tags->contains($tag) ? 'checked' : '' }} name="tags[]"
                                        class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                        id="">
                                    <label class="form-check-label" for="">
                                        {{ $tag->title_ar }} - {{ $tag->title_en }}
                                    </label>
                                </div>
                            @endforeach
                        </div>


                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">المقاسات - Sizes</label>

                                @foreach (\App\Models\CategorySize::query()->where('category_id',$item->category_id)->get() as $size)
                                <div class="form-check">
                                    <input {{ $item->sizes->contains($size) ? 'checked' : '' }} name="sizes[]"
                                        class="form-check-input" type="checkbox" value="{{ $size->id }}"
                                        id="">
                                    <label class="form-check-label" for="">
                                        {{ $size->value }}
                                    </label>
                                </div>
                                @endforeach
                        </div>





                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">السعر</label>
                            @error('price')
                                <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                            @enderror
                            <input name="price" value="{{ old('price', $item->price) }}" type="text"
                                class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1">
                        </div>
                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">وصف المنتج عربي</label>
                            @error('description_ar')
                                <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                            @enderror
                            <textarea name="description_ar" type="text" class="form-control @error('description_ar') is-invalid @enderror"
                                id="exampleInputEmail1"> {{ old('description_ar', $item->description_ar) }}</textarea>
                        </div>

                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">وصف المنتج انجليزي</label>
                            @error('description_en')
                                <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                            @enderror
                            <textarea name="description_en" type="text" class="form-control @error('description_en') is-invalid @enderror"
                                id="exampleInputEmail1">{{ old('description_en', $item->description_en) }}</textarea>
                        </div>


                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">الصورة الاساسية</label>
                            @if ($item->main_image)
                                <img class="mb-2" height="60" src="{{ asset('storage/' . $item->main_image) }}"
                                    alt="">
                            @else
                                بدون صورة
                            @endif
                            <input name="main_image" type="file" class="form-control" id="exampleInputEmail1">
                        </div>



                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="bg-danger p-2">خاصية جديدة</h5>
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputEmail1">عنوان عربي</label>
                                    <input name="key_ar" type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputEmail1">قيمة عربي</label>
                                    <input name="value_ar" type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputEmail1">عنوان انجليزي</label>
                                    <input name="key_en" type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputEmail1">قيمة انجليزي</label>
                                    <input name="value_en" type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>

                            {{-- colors strat --}}
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="bg-warning p-2">لون  جديد</h5>
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1">اللون عربي</label>
                                    <input name="color_ar" type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group col-4">
                                    <label for="exampleInputEmail1">اللون انجليزي</label>
                                    <input name="color_en" type="text" class="form-control" id="exampleInputEmail1">
                                </div>

                            </div>
                            {{-- color end --}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary col-12 ">حفظ جميع التعديلات <i
                                class="fa fa-save"></i> </button>
                    </div>
                </form>

                <div class="row">
                    <div class="col-12">
                        <h5 class="bg-dark p-2">جميع خصائص المنتج </h5>
                    </div>
                    @forelse ($item->props as $prop)
                        <form class="col-8" id="updateprop{{ $prop->id }}"
                            action="{{ route('admin.products_props.update', $prop->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="exampleInputEmail1">عنوان عربي</label>
                                    <input value="{{ $prop->key_ar }}" name="key_ar" type="text"
                                        class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputEmail1">قيمة عربي</label>
                                    <input value="{{ $prop->value_ar }}" name="value_ar" type="text"
                                        class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputEmail1">عنوان انجليزي</label>
                                    <input value="{{ $prop->key_en }}" name="key_en" type="text"
                                        class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputEmail1">قيمة انجليزي</label>
                                    <input value="{{ $prop->value_en }}" name="value_en" type="text"
                                        class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                        </form>
                        <div class="form-group col-4">
                            <label for="exampleInputEmail1">إدارة</label>
                            <br>
                            <button form="updateprop{{ $prop->id }}" class="btn btn-success btn-sm "><i
                                    class="fa fa-check"></i></button>
                            <button form="deleteprop{{ $prop->id }}" class="btn btn-danger btn-sm "><i
                                    class="fa fa-trash"></i></button>
                            <form id="deleteprop{{ $prop->id }}" method="POST"
                                action="{{ route('admin.products_props.destroy', $prop->id) }}"> @csrf @method('delete')
                            </form>
                        </div>
                    @empty
                        <p class="mx-auto">لا توجد أي خاصية</p>
                    @endforelse

                </div>

                {{-- all colour setting --}}
                <div class="row">
                    <div class="col-12">
                        <h5 class="bg-dark p-2">الوان المنتج </h5>
                    </div>
                    @forelse ($item->colors as $color)
                        <form class="col-8" id="updatecolor{{ $color->id }}"
                            action="{{ route('admin.products_colors.update', $color->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-4">
                                <label for="exampleInputEmail1">اللون عربي</label>
                                <input value="{{$color->color_ar}}" name="color_ar" type="text" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputEmail1">اللون انجليزي</label>
                                <input value="{{$color->color_en}}" name="color_en" type="text" class="form-control" id="exampleInputEmail1">
                            </div>
                        </form>
                        <div class="form-group col-4">
                            <label for="exampleInputEmail1">إدارة</label>
                            <br>
                            <button form="updatecolor{{ $color->id }}" class="btn btn-success btn-sm "><i
                                    class="fa fa-check"></i></button>
                            <button form="deletecolor{{ $color->id }}" class="btn btn-danger btn-sm "><i
                                    class="fa fa-trash"></i></button>
                            <form id="deletecolor{{ $color->id }}" method="POST"
                                action="{{ route('admin.products_colors.destroy', $color->id) }}"> @csrf @method('delete')
                            </form>
                        </div>
                    @empty
                        <p class="mx-auto">لا توجد الوان لهذا المنتج</p>
                    @endforelse

                </div>
                {{-- end all colour setting --}}
                <div class="row">
                    <div class="col-12">
                        <h5 class="bg-dark p-2">صور المنتج </h5>
                    </div>
                    <div class="col-6">
                        <form enctype="multipart/form-data" method="post"
                            action="{{ route("admin.productimage.store") }}">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input class="form-control " name="image" type="file">
                            <button style="float: right" class="btn btn-success mt-2" type="submit">حفظ واضافة الصورة <i
                                    class="fa fa-save"></i></button>
                        </form>
                    </div>
                    @forelse ($item->images as $image)
                        <img height="50" src="{{ asset('storage/' . $image->path) }}" alt="">



                        <div class="form-group col-1">
                            {{-- <label for="exampleInputEmail1">إدارة</label> --}}

                            <button form="deleteimage{{ $image->id }}" class="btn btn-danger btn-sm "><i
                                    class="fa fa-trash"></i></button>
                            <form id="deleteimage{{ $image->id }}" method="POST"
                                action="{{ route("admin.productimage.destroy", $image->id) }}"> @csrf @method('delete')
                            </form>
                        </div>
                    @empty
                        <p>لا توجد صورة </p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
