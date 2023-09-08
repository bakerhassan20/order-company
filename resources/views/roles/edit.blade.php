
@extends('../layouts/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>


  <style>
.disable{
    pointer-events:none;
    background-color: #dde2ef !important;
    color:black !important;

    }
  </style>
@endsection

@section('subcontent')
@can('تعديل صلاحية')


@if (count($errors) > 0)
<div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>خطا</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="main-content-label mg-b-5">
                    <div class="pull-right" style="margin:20px">
                           <a class="" href="{{ route('roles.index') }}">  <x-base.button
                                class="mt-10 w-full px-4 py-3 align-top xl:mt-0 xl:w-32 btn"
                                variant="primary" >
                           رجوع
                            </x-base.button> </a>
                    </div>
                </div>


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<!-- row -->
<div class="container"style="margin:20px;padding: 20px;">
<x-base.preview-component class="intro-y box">
               <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-3 dark:border-darkmode-400 sm:flex-row">
                    <h2 class=" text-base font-medium">اضافه صلاحيه</h2>

                </div>
                       <div style="padding:30px;">
                  <div class="">
                            <x-base.form-label for="regular-form-2"> اسم الصلاحيه</x-base.form-label>
                            @if ($role->name == 'مدير' || $role->name == 'مستخدم')
                              <x-base.form-input
                                id="regular-form-2"
                                type="text"
                                value="{{ $role->name }}"
                                class="disable"
                                name="name"
                                placeholder="اسم الصلاحيه"
                            />
                            @else
                              <x-base.form-input
                                id="regular-form-2"
                                type="text"
                                value="{{ $role->name }}"
                                name="name"
                                placeholder="اسم الصلاحيه"
                            />
                             @endif

                </div>
                 <div class="mt-5 grid grid-cols-12 gap-6">
                      @foreach($permission as $value)
                         <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3"style="text-align: center;">
                        <div class="box">
                           <div class="p-5">
                            <x-base.form-check class="">
                                <x-base.form-check class="mr-5">
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }} {{ $value->name }}</label>
                                </x-base.form-check>
                            </x-base.form-check>
                               </div>
                              </div>
                              </div>
                             @endforeach

                 </div>

             <x-base.button
                                class="px-4 py-3 align-center mt-5 h-2"

                                variant="primary" type="submit" name="submit"
                            >
                                حفظ
                            </x-base.button>

        </div>

    </x-base.preview-component>

  </div>


{!! Form::close() !!}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>


</script>
@endcan
@endsection













