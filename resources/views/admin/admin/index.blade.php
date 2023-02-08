@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.admins.create') }}">اضافة ادمن جديد</a>

    <div class="row">
        <table id="example2" class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>كود</th>
                    <th>الاسم</th>
                    <th>إدارة</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->name }}</td>
                        <th>
                            <a class="btn btn-warning  btn-sm" href="{{ route('admin.admins.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <button form="delete{{ $item->id }}" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                            <form id="delete{{ $item->id }}" method="POST" action="{{ route('admin.admins.destroy', $item->id) }}"> @csrf @method('delete')</form>
                            </th>
                    </tr>
                @empty
                    <th class="text-center" colspan="4">
                        لا يوجد بيانات
                    </th>
                @endforelse




            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
@endsection
