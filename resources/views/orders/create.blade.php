@extends('../layouts/' . $layout) @section('subhead')
<title>Dashboard - Midone - Tailwind HTML Admin Template</title>

@endsection @section('subcontent') @if (count($errors) > 0)
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
                           <a class="" href="{{ route('orders.index') }}">  <x-base.button
                                class="mt-10 w-full px-4 py-3 align-top xl:mt-0 xl:w-32 btn"
                                variant="primary" >
                           رجوع
                            </x-base.button> </a>
                    </div>
                </div>

@can('اضافة طلب')

{!! Form::open(array('route' => 'orders.store','method'=>'POST')) !!}
<!-- row -->
<div class="container"style="margin:20px;padding: 20px;">
<x-base.preview-component class="intro-y box">
  <div
    class="flex flex-col items-center border-b border-slate-200/60 p-3 dark:border-darkmode-400 sm:flex-row"
  >
    <h2 class="text-base font-medium">اضافه طلب</h2>
  </div>
  <div style="padding: 30px">
    @if(auth()->user()->type == 'none')
    <div class="mt-3">
      <x-base.form-select
        class="sm:mt-2 sm:mr-2 typeC"
        formSelectSize="lg"
        name="user_id"
        required
        aria-label=".form-select-lg example"
      >
        <option value="">اختر مستخدم</option>
        @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </x-base.form-select>
      @error('user_id')
      <span class="invalid-feedback" role="alert">
        <p style="color: red; margin-left: 20px; font-size: 15px">
          {{ $message }}
        </p>
      </span>
      @enderror
    </div>

    @endif

    <div class="mt-3">
      <x-base.form-select
        class="sm:mt-2 sm:mr-2 typeC"
        formSelectSize="lg"
        name="service_type"
        required
        aria-label=".form-select-lg example"
      >
        <option value="">اختر نوع الخدمه</option>
        <option value="برمجة نظام">برمجة نظام</option>
        <option value="تطوير نظام">تطوير نظام</option>
        <option value="دعم فني">دعم فني</option>
      </x-base.form-select>
      @error('service_type')
      <span class="invalid-feedback" role="alert">
        <p style="color: red; margin-left: 20px; font-size: 15px">
          {{ $message }}
        </p>
      </span>
      @enderror
    </div>

    <div class="input-form mt-3">
      <x-base.form-label
        class="flex w-full flex-col xl:flex-row"
        htmlFor="validation-form-6"
      >
        وصف الخدمه
      </x-base.form-label>
      <x-base.form-textarea
        style="height: 148px; width:100%"
        class="form-control"
        id="validation-form-6"
        name="service_description"
        placeholder="  وصف الخدمه"
        minlength="10"
        required
      ></x-base.form-textarea>

      @error('service_description')
      <span class="invalid-feedback" role="alert">
        <p style="color: red; margin-left: 20px; font-size: 15px">
          {{ $message }}
        </p>
      </span>
      @enderror
    </div>

    <x-base.button
      class="px-10 py-3 align-center mt-5 h-30"
      variant="primary"
      type="submit"
      name="submit"
    >
      حفظ
    </x-base.button>
  </div>
</x-base.preview-component>
 </div>
{!! Form::close() !!}
@endcan
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script></script>
@endsection
