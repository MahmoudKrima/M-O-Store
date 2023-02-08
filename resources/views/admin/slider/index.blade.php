@extends('admin.layout.index')

@section('content')
    <a class="btn btn-success mb-2" href="{{ route('admin.sliders.create') }}">اضافة قسم جديد</a>

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
                    <th>عنوان صغير عربي</th>
                    <th>عنوان صغير انجليزي</th>
                    <th>عنوان كبير عربي</th>
                    <th>عنوان كبير انجليزي</th>
                    <th>صورة</th>
                    <th>إدارة</th>
                </tr>
            </thead>
            <tbody>
                @forelse (\App\Models\Slider::all() as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->small_title_ar }}</td>
                        <td>{{ $item->small_title_en }}</td>
                        <td>{{ $item->big_title_ar }}</td>
                        <td>{{ $item->big_title_en }}</td>
                        <td>
                            @if ($item->image)
                            <img height="70" src="{{asset('storage/' . $item->image)}}" alt="">
                            @else
                            بدون صورة
                            @endif

                        </td>
                            <th>
                            <a class="btn btn-warning  btn-sm" href="{{ route('admin.sliders.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                            <button form="delete{{ $item->id }}" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                            <form id="delete{{ $item->id }}" method="POST" action="{{ route('admin.sliders.destroy', $item->id) }}"> @csrf @method('delete')</form>
                            </th>
                    </tr>
                @empty
                    <th class="text-center" colspan="10">
                        لا يوجد بيانات
                    </th>
                @endforelse




            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
@endsection
