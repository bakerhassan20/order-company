@extends('../layouts/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>

    <style>

tr:nth-child(even) td ,thead{
  background-color: #ebeced; /* Fondo blanco */
}
table{

     border: 1px solid #ddd;
}

    </style>

@endsection

@section('subcontent')

@if (session('success'))
    <x-base.alert class="m-5 "  variant="success" >
         {{ session('success') }}
    </x-base.alert>

@endif



      <!-- BEGIN: Bordered Table -->
            <x-base.preview-component class="intro-y box mt-5">
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        المستخدمين
                    </h2>
                        <x-base.button
                                class="mt-3 w-full px-4 py-3 align-top xl:mt-0 xl:w-32 btn"
                                variant="primary">
                               <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">اضافة مستخدم</a>
                            </x-base.button>


                </div>

        <div class="flex flex-col m-5 sm:flex-row sm:items-end xl:items-start">
            <form action="{{ route('userFilter') }}" method="post"
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
                          <option value="email">البريد الاكتروني</option>
                            <option value="mobile_no">الهاتف</option>
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
                    <a href="{{ route('users.index') }}"><x-base.button
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
                            <x-base.table>
                                <x-base.table.thead class="tabulator-header">
                                    <x-base.table.tr>
                                        <x-base.table.th class="whitespace-nowrap">#</x-base.table.th>
                                          <x-base.table.th class="whitespace-nowrap">
                                            اسم المستخدم
                                        </x-base.table.th>
                                          <x-base.table.th class="whitespace-nowrap">
                                            البريد الالكتروني
                                        </x-base.table.th>
                                             <x-base.table.th class="whitespace-nowrap">
                                         الهاتف
                                        </x-base.table.th>
                                        <x-base.table.th class="whitespace-nowrap">
                                            نوع المستخدم
                                        </x-base.table.th>
                                      {{--   <x-base.table.th class="whitespace-nowrap">
                                            العمليات
                                        </x-base.table.th> --}}

                                    </x-base.table.tr>
                                </x-base.table.thead>
                                <x-base.table.tbody>

                                   @foreach ($data as $key => $user)
                                    <x-base.table.tr>
                                        <x-base.table.td>{{ ++$i }}</x-base.table.td>
                                        <x-base.table.td>{{ $user->name }}</x-base.table.td>
                                        <x-base.table.td>{{ $user->email }}</x-base.table.td>
                                             <x-base.table.td>{{ $user->mobile_no }}</x-base.table.td>
                                        <x-base.table.td>
                                         @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                        </x-base.table.td>
                                    </x-base.table.tr>
                                @endforeach
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                           {!! $data->links() !!}
                    </x-base.preview>

                </div>
            </x-base.preview-component>
            <!-- END: Bordered Table -->








@endsection












