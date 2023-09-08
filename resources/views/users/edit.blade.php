
@extends('../layouts/' . $layout)
@section('subhead')
<title>Dashboard - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
@can('تعديل مستخدم')
<style>
  .typeC {
    display: none;
  }
</style>

@if (session('success'))
<x-base.alert class="m-5" variant="success">
  {{ session('success') }}
</x-base.alert>
@endif
@if (session('error'))
<x-base.alert class="m-5" variant="error">
  {{ session('error') }}
</x-base.alert>
@endif


<div class="mt-50" style="padding: 30px">
  {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

    <x-base.preview-component class="intro-y box">
      <div
        class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row"
      >
        <h2 class="mr-auto text-base font-medium">تعديل مستخدم</h2>
      </div>
      <div class="p-5">
        <x-base.preview>
          <div>
            <x-base.form-label for="regular-form-1">
              اسم المستخدم</x-base.form-label
            >
            <x-base.form-input
              id="regular-form-1"
              type="text"
              name="name"
              required
              value="{{ $user->name }}"
              placeholder="Input text"
            />
            @error('name')
            <span class="invalid-feedback" role="alert">
              <p style="color: red; margin-left: 20px; font-size: 15px">
                {{ $message }}
              </p>
            </span>
            @enderror
          </div>
          <div class="mt-3">
            <x-base.form-label for="regular-form-2"
              >البريد الاكتروني</x-base.form-label
            >
            <x-base.form-input
              id="regular-form-2"
              type="email"
              required
              name="email"
              value="{{ $user->email }}"
              placeholder="email"
            />

            @error('email')
            <span class="invalid-feedback" role="alert">
              <p style="color: red; margin-left: 20px; font-size: 15px">
                {{ $message }}
              </p>
            </span>
            @enderror
          </div>
          <div class="mt-3">
            <x-base.form-label for="regular-form-3"> الهاتف</x-base.form-label>
            <x-base.form-input
              id="regular-form-3"
              type="text"
              name="mobile_no"
              value="{{ $user->mobile_no }}"
              required
              placeholder="With help"
            />
            @error('mobile_no')
            <span class="invalid-feedback" role="alert">
              <p style="color: red; margin-left: 20px; font-size: 15px">
                {{ $message }}
              </p>
            </span>
            @enderror
          </div>
          <div class="mt-3">
            <x-base.form-select
              class="sm:mt-2 sm:mr-2"
              formSelectSize="lg"
              id="target"
              name="roles_name[]"
              required
              aria-label=".form-select-lg example"
            >
              <option value="">اختر صلاحيه</option>
              @foreach ($roles as $role)

              <option value="{{ $role }}">{{ $role }}</option>
              @endforeach
            </x-base.form-select>
             @error('roles_name')
            <span class="invalid-feedback" role="alert">
              <p style="color: red; margin-left: 20px; font-size: 15px">
                {{ $message }}
              </p>
            </span>
            @enderror
          </div>

          <div class="mt-3">
            <x-base.form-select
              class="sm:mt-2 sm:mr-2 typeC"
              formSelectSize="lg"
              name="type"
              aria-label=".form-select-lg example" >
              <option value="">choose type</option>
            @if($user->type == 'مؤسسة')
              <option selected value="مؤسسة">مؤسسة</option>
            @else
             <option  value="مؤسسة">مؤسسة</option>
            @endif
            @if($user->type == 'فرد')
              <option selected value="فرد">فرد</option>
            @else
             <option  value="فرد">فرد</option>
            @endif
            @if($user->type == 'شركة')
              <option selected value="شركة">شركة</option>
            @else
             <option value="شركة">شركة</option>
            @endif

            </x-base.form-select>
            @error('type')
            <span class="invalid-feedback" role="alert">
              <p style="color: red; margin-left: 20px; font-size: 15px">
                {{ $message }}
              </p>
            </span>
            @enderror
          </div>
        </x-base.preview>
      </div>

      <x-base.button
        class="px-4 py-3 align-center m-5 h-2"
        variant="primary"
        type="submit"
      >
        حفظ
      </x-base.button>
    </x-base.preview-component>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  $("#target").on("change", function (e) {
    var valueSelected = this.value;
    if (valueSelected == "مستخدم") {
      $(".typeC").css("display", "inline-block");
      $(".typeC").attr("required", true);
    } else {
      $(".typeC").css("display", "none");
      $(".typeC").removeAttr("required");
    }
  });
</script>
@endcan
@endsection
