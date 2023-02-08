@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.admins.index') }}">الكل</a>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">تعديل الادمن</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.admins.update',$item->id) }}" role="form">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">الاسم</label>
                    <input name="name" value="{{ old('name',$item->name) }}" type="text" class="form-control"
                        id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">الكود</label>
                    <input name="code" value="{{ old('code',$item->code) }}" type="text" class="form-control"
                        id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">الرقم السري</label>
                    <input name="password" value="{{ old('password') }}" type="password" class="form-control"
                        id="exampleInputEmail1">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">تعديل <i class="fa fa-save"></i></button>
            </div>
        </form>
    </div>
@endsection
