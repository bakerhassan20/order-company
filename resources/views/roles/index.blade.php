


@extends('../layouts/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>
<style>

.pagination {
  position: absolute;
   top: -4%;
  left: 78%;
  margin: 20px;
  padding: 10px;
  background-color: #fff;
  border-radius: 40px;
  box-shadow: 0 5px 25px 0 rgba(0, 0, 0, 0.5);
}
.pagination li {
  display: inline-block;
  list-style: none;
}
.pagination li a {
  display: block;
  width: 40px;
  height: 40px;
  line-height: 40px;
  background-color: #fff;
  text-align: center;
  text-decoration: none;
  color: #252525;
  border-radius: 4px;
  margin: 5px;
  box-shadow: inset 0 5px 10px rgba(0, 0, 0, 0.1), 0 2px 5px rgba(0, 0, 0, 0.5);
  transition: all 0.3s ease;
}
.pagination li a:hover, .pagination li a.active {
  color: #fff;
  background-color: #ff4242;
}
.pagination li:first-child a {
  border-radius: 40px 0 0 40px;
}
.pagination li:last-child a {
  border-radius: 0 40px 40px 0;
}

.table td {
text-align: center !important;
}


tr:nth-child(even) td ,thead{
  background-color: #ebeced; /* Fondo blanco */
}
table{

     border: 1px solid #ddd;
}


</style>
@endsection

@section('subcontent')
@can('الصلاحيات')


@if (session('success'))
    <x-base.alert class="m-5 "  variant="success" >
         {{ session('success') }}
    </x-base.alert>

@endif



      <!-- BEGIN: Bordered Table -->
            <x-base.preview-component class="intro-y box mt-5">
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                       الصلاحيات
                    </h2>
                      @can('اضافة صلاحية')
                      <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">
                        <x-base.button href="{{ route('register') }}"
                                class="mt-3 w-full px-4 py-3 align-top xl:mt-0 xl:w-32 btn"
                                variant="primary">
                             اضافة صلاحيه
                            </x-base.button> </a>
                        @endcan


                </div>

                 <div class="intro-y box mt-5 p-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form action="{{ route('roleFilter') }}" method="post"
                class="sm:mr-auto xl:flex"
                id="tabulator-html-filter-form"
            >
                {{csrf_field()}}
                <div class="items-center sm:mr-4 sm:flex">
                    <label class="mr-2 w-12 flex-none xl:w-auto xl:flex-initial">
                        Field
                    </label>
                    <x-base.form-select required
                        class="mt-2 w-full sm:mt-0 sm:w-auto 2xl:w-full"
                        id="tabulator-html-filter-field" name="field">
                        <option value="name">الاسم</option>
                    </x-base.form-select>
                </div>
                <div class="mt-2 items-center sm:mr-4 sm:flex xl:mt-0">
                    <label class="mr-2 w-12 flex-none xl:w-auto xl:flex-initial">
                        Type
                    </label>
                    <x-base.form-select required
                        class="mt-2 w-full sm:mt-0 sm:w-auto"
                        id="tabulator-html-filter-type" name="type">
                        <option value="like">like</option>
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value="<=">&lt;=</option>
                        <option value=">">&gt;</option>
                        <option value=">=">&gt;=</option>
                        <option value="!=">!=</option>
                    </x-base.form-select>
                </div>
                <div class="mt-2 items-center sm:mr-4 sm:flex xl:mt-0">
                    <label class="mr-2 w-12 flex-none xl:w-auto xl:flex-initial">
                        Value
                    </label>
                    <x-base.form-input
                        class="mt-2 sm:mt-0 sm:w-40 2xl:w-full"
                        id="tabulator-html-filter-value"
                        type="text"
                        name="value"
                        required
                        placeholder="Search..."
                    />
                </div>
                <div class="mt-2 xl:mt-0">
                    <x-base.button
                        class="w-full sm:w-16"
                        id="tabulator-html-filter-go"
                        type="submit"

                        variant="primary"
                    >
                        Go
                    </x-base.button>
                    <a href="{{ route('roles.index') }}"><x-base.button
                        class="mt-2 w-full sm:mt-0 sm:ml-1 sm:w-16"
                        id="tabulator-html-filter-reset"
                        type="button"

                        variant="secondary"
                    >
                        Reset
                    </x-base.button></a>
                </div>
            </form>

        </div>
        <div class="scrollbar-hidden overflow-x-auto">
            <div
                class="mt-5"
                id="tabulator"
            ></div>
             <div class="p-5">
                    <x-base.preview>
                        <div class="overflow-x-auto">
                            <x-base.table  style="width: 100%;
  text-align: center;">
                                <x-base.table.thead items-center>
                                    <x-base.table.tr>
                                        <x-base.table.th class="whitespace-nowrap">#</x-base.table.th>
                                          <x-base.table.th class="whitespace-nowrap">
                                            الاسم
                                        </x-base.table.th>

                                        <x-base.table.th class="whitespace-nowrap">
                                            العمليات
                                        </x-base.table.th>

                                    </x-base.table.tr>
                                </x-base.table.thead>
                                <x-base.table.tbody>

                                   @foreach ($roles as $key => $role)
                                    <x-base.table.tr>
                                        <x-base.table.td>{{ ++$i }}</x-base.table.td>
                                        <x-base.table.td>{{ $role->name }}</x-base.table.td>

                                        <x-base.table.td>
                                <div class="flex  lg:justify-center">

                        @can('عرض صلاحية')
                        <a class="flex  mr-3 show" href="{{ route('roles.show', $role->id) }}">
                            <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Show
                        </a>
                        @endcan
                        @can('تعديل صلاحية')
                        <a class="flex  mr-3 edit"href="{{ route('roles.edit', $role->id) }}">
                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                        </a>
                        @endcan
                        @if ($role->name !== 'مدير' && $role->name !== 'مستخدم')
                        @can('حذف صلاحية')
                        <a class="flex  delete text-danger" href=""
                                    onclick="event.preventDefault();document.getElementById('deleterole-form').submit();">
                         <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                        </a>
                    <form id="deleterole-form"style="display:inline" action="{{ route('roles.destroy',
                                                $role->id) }}" method="post" style="display: none;">
                       {!! method_field('delete') !!}
                       {!! csrf_field() !!}
                    </form>
                        @endcan
                         @endif
                        </div>
                                        </x-base.table.td>
                                    </x-base.table.tr>
                                @endforeach
                                </x-base.table.tbody>
                            </x-base.table>

                       <div class="container"style="">
                            {!! $roles->links() !!}
                        </div>
                        </div>
                    </x-base.preview>

                </div>
        </div>
    </div>

            </x-base.preview-component>
            <!-- END: Bordered Table -->


@endcan
@endsection


