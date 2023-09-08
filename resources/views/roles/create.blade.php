
@extends('../layouts/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>

@endsection

@section('subcontent')
@can('اضافة صلاحية')
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

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<!-- row -->
<div class="container"style="margin:20px;padding: 20px;">
<x-base.preview-component class="intro-y box" >
               <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-3 dark:border-darkmode-400 sm:flex-row">
                    <h2 class=" text-base font-medium">اضافه صلاحيه</h2>

                </div>
                       <div style="padding:30px;">
                  <div class="">
                            <x-base.form-label for="regular-form-2"> اسم الصلاحيه</x-base.form-label>
                            <x-base.form-input
                                id="regular-form-2"
                                type="text"
                                 required
                                name="name"
                                placeholder="اسم الصلاحيه"
                            />
                </div>
                <div class="mt-5 grid grid-cols-12 gap-6">

                      @foreach($permission as $value)
                      <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3"style="text-align: center;">
                        <div class="box">
                           <div class="p-5">
                            <x-base.form-check class="">
                                <x-base.form-check class="mr-5">
                                    <x-base.form-check.input
                                        id="checkbox-switch-4"
                                        type="checkbox"
                                        value="{{ $value->id }}"
                                        name="permission[]"
                                    />
                                    <x-base.form-check.label for="checkbox-switch-4">
                                    {{  $value->name }}
                                    </x-base.form-check.label>
                                </x-base.form-check>
                            </x-base.form-check>
                              </div>
                              </div>
                              </div>
                             @endforeach

                 </div>

             <x-base.button
                                class="px-10 py-3 align-center mt-5 h-30"

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













