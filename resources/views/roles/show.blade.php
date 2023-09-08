
@extends('../layouts/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>

@endsection

@section('subcontent')
@can('عرض صلاحية')

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


<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
               <div class="main-content-label mg-b-5">
                    <div class="pull-right" style="margin:20px">
                           <a class="" href="{{ route('roles.index') }}">  <x-base.button
                                class="mt-10 w-full px-4 py-3 align-top xl:mt-0 xl:w-32 btn"
                                variant="primary" >
                           رجوع
                            </x-base.button> </a>
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg" style="padding: 47px;">
                                <x-base.button
                                style="margin-bottom:30px;
                                min-width:100px;
                                min-height:53px;
                                font-size:30px;"
                                class="mt-5" >{{ $role->name }}</x-base.button>
                            <x-base.form-label style="font-size:20px;"  href="#"></x-base.form-label>
                                <ul class=""style="margin-left:5px;list-style:none;text-align: center;">
                                    @if(!empty($rolePermissions))
                                     <div class="mt-5 grid grid-cols-12 gap-6">
                                    @foreach($rolePermissions as $v)
                                       <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
                                        <div class="box">
                                        <div class="p-5">
                                          <li style="font-size:20px;" class="mb-2">{{ $v->name }}</li>

                                    </div></div></div>
                                    @endforeach
                                      </div>
                                    @endif
                                </ul>
                    </div>
                    <!-- /col -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>


</script>
@endcan
@endsection













