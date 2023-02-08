@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.products.index') }}">عرض كل المنتجات </a>

    <div class="container-fluid ">
        <div class="row  my-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">إضافة منتج جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form class="m-3" enctype="multipart/form-data" method="POST" action="{{ route('admin.products.store') }}" role="form">
                    @csrf
                    <div class="row mt-2">

                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">اسم المنتج عربي</label>

                            <input name="title_ar" value="{{ old('title_ar') }}" type="text"
                                class="form-control @error('title_ar') is-invalid @enderror" id="exampleInputEmail1">
                        </div>

                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">اسم المنتج انجليزي</label>

                            <input name="title_en" value="{{ old('title_en') }}" type="text"
                                class="form-control @error('title_en') is-invalid @enderror" id="exampleInputEmail1">
                        </div>
                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">القسم - category</label>

                            <select class="form-control" name="category_id" id="">
                                @foreach (\App\Models\Category::all() as $cat)
                                    <option {{ old('category_id') == $cat->id ? 'selected' : '' }}
                                        value="{{ $cat->id }}">{{ $cat->title_ar }} - {{ $cat->title_en }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">العلامات - Tags</label>


                            @foreach (\App\Models\Tag::all() as $tag)
                                <div class="form-check">
                                    <input name="tags[]" class="form-check-input" type="checkbox"
                                        value="{{ $tag->id }}" id="">
                                    <label class="form-check-label" for="">
                                        {{ $tag->title_ar }} - {{ $tag->title_en }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        {{-- <select  multiple class="form-control" name="tags[]" id="">
                        @foreach (\App\Models\Tag::all() as $tag)
                        <option {{old("tag_id") == $tag->id ? "selected" : ""}} value="{{$tag->id}}">{{$tag->title_ar}} - {{$tag->title_en}}</option>
                        @endforeach
                    </select> --}}



                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">السعر</label>

                            <input name="price" value="{{ old('price') }}" type="text"
                                class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1">
                        </div>
                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">وصف المنتج عربي</label>

                            <textarea name="description_ar"  type="text"
                                class="form-control @error('description_ar') is-invalid @enderror" id="exampleInputEmail1"> {{ old('description_ar') }} </textarea>
                        </div>

                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">وصف المنتج انجليزي</label>

                            <textarea name="description_en"  type="text"
                                class="form-control @error('description_en') is-invalid @enderror" id="exampleInputEmail1">{{ old('description_en') }}</textarea>
                        </div>

                        <div class=" col-6 form-group">

                            <label for="exampleInputEmail1">الصورة الاساسية</label>
                            <input name="main_image" type="file"
                                class="form-control @error('main_image') is-invalid @enderror" id="exampleInputEmail1">
                        </div>



                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">اضافة <i class="fa fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
