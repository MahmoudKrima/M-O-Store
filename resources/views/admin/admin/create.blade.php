@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.admins.index') }}">الكل</a>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">إضافة ادمن جديد</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.admins.store') }}" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">الاسم</label>
                    @error('name')
                        <div class="right badge badge-danger ">{{ $message = 'يجب ادخال الحقل' }}</div>
                    @enderror
                    <input name="name" value="{{ old('name') }}" type="text"
                        class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">الكود</label>
                    @error('code')
                        <div class="right badge badge-danger ">{{ $message = 'الكود موجود مسبقاً' }}</div>
                    @enderror
                    <input name="code" value="{{ old('code') }}" type="text"
                        class="form-control @error('code') is-invalid @enderror" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">الرقم السري</label>
                    @error('password')
                        <div class="right badge badge-danger ">{{ $message = 'يجب ادخال الحقل' }}</div>
                    @enderror
                    <input name="password" value="{{ old('password') }}" type="password"
                        class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">اضافة <i class="fa fa-plus"></i></button>
            </div>
        </form>
    </div>
@endsection
