
@extends('../layouts/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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



{!! Form::open(array('route' => 'orders.store','method'=>'POST')) !!}
<!-- row -->
<x-base.preview-component class="intro-y box">
               <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-3 dark:border-darkmode-400 sm:flex-row">
                    <h2 class=" text-base font-medium">اضافه طلب</h2>

                </div>
                       <div style="padding:30px;">

                         @if(auth()->user()->type == 'none')
                          <div class="mt-3">
                              <x-base.form-select
                                class="sm:mt-2 sm:mr-2 typeC"
                                formSelectSize="lg"
                                name="user_id"
                                required
                                aria-label=".form-select-lg example">
                                   <option value="">اختر مستخدم</option>
                                 @foreach ($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                                 @endforeach
                            </x-base.form-select>
                             @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                    <p style="color:red;margin-left:20px;font-size: 15px;">{{ $message }}</p>
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
                                aria-label=".form-select-lg example">
                                <option value="">اختر نوع الخدمه</option>
                                <option value="programming">برمجة نظام</option>
                                <option value="development">تطوير نظام</option>
                                <option value="technical">دعم فني</option>
                            </x-base.form-select>
                             @error('service_type')
                                    <span class="invalid-feedback" role="alert">
                                    <p style="color:red;margin-left:20px;font-size: 15px;">{{ $message }}</p>
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
                                <x-base.form-textarea style="height: 148px;width:980px;"
                                    class="form-control"
                                    id="validation-form-6"
                                    name="service_description"
                                    placeholder="  وصف الخدمه"
                                    minlength="10"
                                    required
                                ></x-base.form-textarea>

                                  @error('service_description')
                                    <span class="invalid-feedback" role="alert">
                                    <p style="color:red;margin-left:20px;font-size: 15px;">{{ $message }}</p>
                                    </span>
                                @enderror


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













