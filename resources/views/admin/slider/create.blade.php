@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.sliders.index') }}">الكل</a>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">إضافة قسم جديد</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.sliders.store') }}" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان صغير عربي</label>
                    @error('title_ar')
                        <div class="right badge badge-danger ">{{ $message = 'يجب ادخال الحقل' }}</div>
                    @enderror
                    <input name="small_title_ar" value="{{ old('small_title_ar') }}" type="text"
                        class="form-control @error('small_title_ar') is-invalid @enderror" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان صغير انجليزي</label>
                    @error('small_title_en')
                        <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                    @enderror
                    <input name="small_title_en" value="{{ old('small_title_en') }}" type="text"
                        class="form-control @error('small_title_en') is-invalid @enderror" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان كبير عربي</label>
                    @error('big_title_ar')
                        <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                    @enderror
                    <input name="big_title_ar" value="{{ old('big_title_ar') }}" type="text"
                        class="form-control @error('big_title_ar') is-invalid @enderror" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان كبير انجليزي</label>
                    @error('big_title_en')
                        <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                    @enderror
                    <input name="big_title_en" value="{{ old('big_title_en') }}" type="text"
                        class="form-control @error('big_title_en') is-invalid @enderror" id="exampleInputEmail1">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">صورة</label>
                    <input name="image" type="file" class="form-control" id="exampleInputEmail1">
                </div>


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">اضافة</button>
            </div>
        </form>
    </div>
@endsection
