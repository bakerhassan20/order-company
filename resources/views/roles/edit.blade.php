
@extends('../layouts/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
.disable{
    pointer-events:none;
    background-color: #dde2ef !important;
    color:black !important;

    }
  </style>
@endsection

@section('subcontent')

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



{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<!-- row -->
<x-base.preview-component class="intro-y box">
               <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-3 dark:border-darkmode-400 sm:flex-row">
                    <h2 class=" text-base font-medium">اضافه صلاحيه</h2>

                </div>
                       <div style="padding:30px;">
                  <div class="">
                            <x-base.form-label for="regular-form-2"> اسم الصلاحيه</x-base.form-label>
                            @if ($role->name == 'admin' || $role->name == 'user')
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
                 <div class="row" style="margin-top:30px;">

                      @foreach($permission as $value)
                           <div class="col-4">
                            <x-base.form-check class="">
                                <x-base.form-check class="mr-5">
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }} {{ $value->name }}</label>
                                </x-base.form-check>
                            </x-base.form-check>
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



{!! Form::close() !!}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>


</script>
@endsection













