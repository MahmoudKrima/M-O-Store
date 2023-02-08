@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.tag.index') }}">الكل</a>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">إضافة تاج جديد</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.tag.store') }}" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">اسم القسم عربي</label>
                    <input name="title_ar" value="{{ old('title_ar') }}" type="text" class="form-control"
                        id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">اسم القسم انجليزي</label>
                    <input name="title_en" value="{{ old('title_en') }}" type="text" class="form-control"
                        id="exampleInputEmail1">
                </div>


            


            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">اضافة <i class="fa fa-plus"></i></button>
            </div>
        </form>
    </div>
@endsection
