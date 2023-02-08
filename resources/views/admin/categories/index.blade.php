@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.categories.create') }}">اضافة قسم جديد</a>

    {{-- messages --}}

    {{-- Success --}}
    @if (session('success'))
    <div class="col-sm-5">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

    {{-- delete --}}


@if (session('delete'))
<div class="col-sm-5">
    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
</div>
@endif
    {{-- update --}}
    @if (session('update'))
    <div class="col-sm-5">
        <div class="alert  alert-warning alert-dismissible fade show" role="alert">
            {{ session('update') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
    @endif

{{-- end messages --}}

    <div class="row">
        <table id="example2" class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>العنوان عربي</th>
                    <th>العنوان انجليزي</th>
                    <th>صورة</th>
                    <th>إدارة</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title_ar }}</td>
                        <td>{{ $item->title_en }}</td>
                        <td>
                            @if ($item->logo)
                            <img height="70" src="{{asset('storage/' . $item->logo)}}" alt="">
                            @else
                            بدون صورة
                            @endif

                        </td>
                        <th>
                            <a class="btn btn-primary  btn-sm" href="{{ route('admin.categories.sizes', $item->id) }}">المقاسات</a>
                            <a class="btn btn-warning  btn-sm" href="{{ route('admin.categories.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <button form="delete{{ $item->id }}" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                            <form id="delete{{ $item->id }}" method="POST" action="{{ route('admin.categories.destroy', $item->id) }}"> @csrf @method('delete')</form>
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
