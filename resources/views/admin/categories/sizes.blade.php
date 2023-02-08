@extends('admin.layout.index')

@section('content')
    {{-- end messages --}}

    <div class="row">
        <table id="example2" class="table table-bordered table-hover text-center">
            <thead class="thead-dark ">
                <tr>
                    <th>#</th>
                    <th>المقاس</th>
                    <th>إدارة</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sizes as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->value }}</td>

                        <th>
                            <button form="delete{{ $item->id }}" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                            <form id="delete{{ $item->id }}" method="POST" action="{{ route('admin.categories.sizes.destroy', $item->id) }}"> @csrf @method('delete')</form>
                        </th>
                    </tr>
                @empty
                    <th class="text-center" colspan="3">
                        لا يوجد مقاسات
                    </th>
                @endforelse



            </tbody>
            <tfoot>

            </tfoot>
        </table>

        <form method="POST" class="col-3" action="{{ route("admin.categories.sizes.store", $category->id) }}">
            @csrf
            <input placeholder="new size" class="form-control" value="{{ old('value') }}" name="value"
                type="text">
            <button class="btn btn-success mt-2" type="submit">اضافة</button>
        </form>


    </div>
@endsection
