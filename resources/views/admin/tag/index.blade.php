@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.tag.create') }}">اضافة تاج جديد</a>

    <div class="row">
        <table id="example2" class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>العنوان عربي</th>
                    <th>العنوان انجليزي</th>

                    <th>إدارة</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title_ar }}</td>
                        <td>{{ $item->title_en }}</td>
                        <th>
                            <a class="btn btn-warning  btn-sm" href="{{ route('admin.tag.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <button form="delete{{ $item->id }}" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                            <form id="delete{{ $item->id }}" method="POST" action="{{ route('admin.tag.destroy', $item->id) }}"> @csrf @method('delete')</form>
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
