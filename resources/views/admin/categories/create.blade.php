@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.categories.index') }}">الكل</a>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">إضافة قسم جديد</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.categories.store') }}" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">اسم القسم عربي</label>
                    @error('title_ar')
                        <div class="right badge badge-danger ">{{ $message = 'يجب ادخال الحقل' }}</div>
                    @enderror
                    <input name="title_ar" value="{{ old('title_ar') }}" type="text"
                        class="form-control @error('title_ar') is-invalid @enderror" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">اسم القسم انجليزي</label>
                    @error('title_en')
                        <div class="right badge badge-danger">{{ $message = 'يجب ادخال الحقل' }}</div>
                    @enderror
                    <input name="title_en" value="{{ old('title_en') }}" type="text"
                        class="form-control @error('title_en') is-invalid @enderror" id="exampleInputEmail1">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">صورة</label>
                    <input name="logo" type="file" class="form-control" id="exampleInputEmail1">
                </div>


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">اضافة  <i class="fa fa-plus"></i></button>
            </div>
        </form>
    </div>
@endsection
