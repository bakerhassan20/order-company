@extends('../layouts/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Tailwind HTML Admin Template</title>

      <style>
.disable{
    pointer-events:none;
    background-color: #dde2ef !important;
    color:black !important;

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

@if (session('success'))
    <x-base.alert class="m-5 "  variant="success" >
         {{ session('success') }}
    </x-base.alert>

@endif
@if (session('error'))
    <x-base.alert class="m-5 "  variant="error" >
         {{ session('error') }}
    </x-base.alert>

@endif


      <!-- BEGIN: Bordered Table -->
            <x-base.preview-component class="intro-y box mt-5">
                <div class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                        Bordered Table
                    </h2>
                        <x-base.button
                                class="mt-3 w-full px-4 py-3 align-top xl:mt-0 xl:w-32 btn"
                                variant="primary">
                               <a class="btn btn-primary btn-sm" href="{{ route('orders.create') }}">اضافة طلب</a>
                            </x-base.button>


                </div>

                    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box mt-5 p-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form action="{{ route('orderFilter') }}" method="post"
                class="sm:mr-auto xl:flex"
                id="tabulator-html-filter-form"
            >
                {{csrf_field()}}
                <div class="items-center sm:mr-4 sm:flex">
                    <label class="mr-2 w-12 flex-none xl:w-auto xl:flex-initial">
                        Field
                    </label>
                    <x-base.form-select
                        class="mt-2 w-full sm:mt-0 sm:w-auto 2xl:w-full"
                        id="tabulator-html-filter-field" name="field"
                    >
                        <option value="service_type">service_type</option>
                        <option value="category">Category</option>
                        <option value="remaining_stock">Remaining Stock</option>
                    </x-base.form-select>
                </div>
                <div class="mt-2 items-center sm:mr-4 sm:flex xl:mt-0">
                    <label class="mr-2 w-12 flex-none xl:w-auto xl:flex-initial">
                        Type
                    </label>
                    <x-base.form-select
                        class="mt-2 w-full sm:mt-0 sm:w-auto"
                        id="tabulator-html-filter-type" name="type"
                    >
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
                    <a href="{{ route('orders.index') }}"><x-base.button
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
        </div>
    </div>
    <!-- END: HTML Table Data -->
                <div class="p-5">
                    <x-base.preview>
                        <div class="overflow-x-auto">
                            <x-base.table bordered>
                                <x-base.table.thead>
                                    <x-base.table.tr>
                                        <x-base.table.th class="whitespace-nowrap">#</x-base.table.th>

                                        @can('الاسم')
                                          <x-base.table.th class="whitespace-nowrap">
                                        الاسم
                                        </x-base.table.th>
                                        @endcan

                                        @can('نوع مقدم الطلب')
                                        <x-base.table.th class="whitespace-nowrap">
                                        نوع مقدم الطلب
                                        </x-base.table.th>
                                         @endcan
                                         @can('البريد')
                                        <x-base.table.th class="whitespace-nowrap">
                                       البريد
                                        </x-base.table.th>
                                         @endcan
                                        @can('رقم الهاتف')
                                        <x-base.table.th class="whitespace-nowrap">
                                        رقم الهاتف
                                        </x-base.table.th>
                                        @endcan
                                        @can('نوع الخدمة')
                                        <x-base.table.th class="whitespace-nowrap">
                                         نوع الخدمة
                                        </x-base.table.th>
                                        @endcan
                                        @can('تاريخ تقديم الطلب')
                                        <x-base.table.th class="whitespace-nowrap">
                                        تاريخ تقديم الطلب
                                        </x-base.table.th>
                                        @endcan
                                        @can('تاريخ بدأ الخدمة')
                                        <x-base.table.th class="whitespace-nowrap">
                                       تاريخ بدأ الخدمة
                                        </x-base.table.th>
                                        @endcan
                                        @can('تاريخ انتهاء الخدمة')
                                        <x-base.table.th class="whitespace-nowrap">
                                      تاريخ انتهاء الخدمة
                                        </x-base.table.th>
                                        @endcan
                                        @can('حالة الخدمة')
                                        <x-base.table.th class="whitespace-nowrap">
                                       حالة الخدمة
                                        </x-base.table.th>
                                        @endcan
                                        @can('فاتورة الخدمة')
                                        <x-base.table.th class="whitespace-nowrap">
                                          حالة الفاتورة
                                        </x-base.table.th>
                                        @endcan
                                        @can('مستلم الطلب')
                                         <x-base.table.th class="whitespace-nowrap">
                                        مستلم طلب
                                        </x-base.table.th>
                                        @endcan
                                        @can('مدة الخدمة')
                                        <x-base.table.th class="whitespace-nowrap">
                                        مدة الخدمة
                                        </x-base.table.th>
                                        @endcan
                                        @can('سعر الخدمة')
                                        <x-base.table.th class="whitespace-nowrap">
                                        سعر الخدمة
                                        </x-base.table.th>
                                        @endcan
                                        @can('المبلغ المقدم للمستلم')
                                        <x-base.table.th class="whitespace-nowrap">
                                        المبلغ المقدم للمستلم
                                        </x-base.table.th>
                                        @endcan
                                        @can('وجود استفسار من المستلم')
                                         <x-base.table.th class="whitespace-nowrap">
                                        وجود استفسار من المستلم
                                        </x-base.table.th>
                                        @endcan
                                        @can('وجود اقتراح مبلغ من المستلم')
                                        <x-base.table.th class="whitespace-nowrap">
                                        وجود اقتراح مبلغ من المستلم
                                        </x-base.table.th>
                                        @endcan
                                        <x-base.table.th class="whitespace-nowrap">
                                          الإجراءات
                                        </x-base.table.th>
                                    </x-base.table.tr>
                                </x-base.table.thead>
                                <x-base.table.tbody>
    <?php $count=0;  ?>
    @foreach ($orders as $key => $order)


        <x-base.table.tr>
                <x-base.table.td>{{ ++$count }}</x-base.table.td>

                 @can('الاسم')
                <x-base.table.td>{{ $order->user->name }}</x-base.table.td>
                @endcan

                @can('نوع مقدم الطلب')
                <x-base.table.td>
                @if( $order->user->type == "institution")
               مؤسسة
                @elseif ( $order->user->type == "company")
              شركة
                @elseif ( $order->user->type == "individual")
                فرد

                @endif
                </x-base.table.td>
                 @endcan

                @can('البريد')
                <x-base.table.td>{{ $order->user->email }}</x-base.table.td>
                 @endcan

                @can('رقم الهاتف')
                <x-base.table.td>{{ $order->user->mobile_no }}</x-base.table.td>
                @endcan

                 @can('نوع الخدمة')
                <x-base.table.td>{{ $order->service_type }}</x-base.table.td>
                @endcan

                @can('تاريخ تقديم الطلب')
                <x-base.table.td>{{ $order->created_at->format('d-m-Y h:i') }}</x-base.table.td>
                 @endcan

                @can('تاريخ بدأ الخدمة')
                <x-base.table.td>{{ $order->service_start_date }}</x-base.table.td>
                  @endcan

                @can('تاريخ انتهاء الخدمة')
                <x-base.table.td>{{ $order->service_end_date }}</x-base.table.td>
                 @endcan

                @can('حالة الخدمة')
                <x-base.table.td>
                @if( $order->service_status == "new")
                 طلب جديد
                @elseif ( $order->service_status == "underway")
                قيد التنفيذ
                @elseif ( $order->service_status == "finished")
                منتهية
                @elseif ( $order->service_status == "active")
                نشط
                @elseif ( $order->service_status == "canceled")
                ملغي
                @endif
                </x-base.table.td>
                @endcan

                @can('فاتورة الخدمة')
                <x-base.table.td>
                @if( $order->invoice_status == "paid")
               مدفوعه
                @elseif ( $order->invoice_status == "unpaid")
               غير مدفوعه
                @elseif ( $order->invoice_status == "canceled")
                ملغية
                @elseif ( $order->invoice_status == "finished")
               منتهية
                @elseif ( $order->invoice_status == "pending")
               قيد الدفع
                @endif
                </x-base.table.td>
                @endcan

                @can('مستلم الطلب')
                <x-base.table.td>
                @if($order->recipient)
                @php
                echo App\Models\User::find($order->recipient)->name;
                @endphp
                @else
                لم يحدد
                @endif
                </x-base.table.td>
                @endcan
                @can('مدة الخدمة')
                <x-base.table.td>{{ $order->duration }}</x-base.table.td>
                @endcan

                @can('سعر الخدمة')
                <x-base.table.td>{{ $order->total_price }}</x-base.table.td>
                @endcan

                @can('المبلغ المقدم للمستلم')
                <x-base.table.td>{{ $order->recipient_price }}</x-base.table.td>
                @endcan

                @can('وجود استفسار من المستلم')
                <x-base.table.td>
                @if($order->inquiry  == 0)
                   لا
                   @else
                   نعم
                   @endif
                </x-base.table.td>
                @endcan

                @can('وجود اقتراح مبلغ من المستلم')
                <x-base.table.td>
                   @if($order->suggest_amount  == 0)
                   لا
                   @else
                   نعم
                   @endif
                </x-base.table.td>
                @endcan


<x-base.table.td>




    <!-- BEGIN: Notifications -->
        <x-base.popover class="intro-x mr-4 sm:mr-6">
            <x-base.popover.button
                class="relative block"
            >
                <x-base.lucide
                    class="h-10 w-10"
                    icon="AlignJustify"
                />
            </x-base.popover.button>
            <x-base.popover.panel class="mt-2 w-[280px] p-5 sm:w-[450px]">
                <div class="mb-5 font-medium">الإجراءات</div>





    <x-base.button  data-tw-toggle="modal"
     data-tw-target="#Modify_the_request_type"
            href="#" as="a" variant="primary"
            data-servicetype="{{ $order->service_type }}" data-orderid="{{ $order->id }}"
            class="Modify_the_request_type mt-5">تعديل نوع الطلب </x-base.button>

   <x-base.button  data-tw-toggle="modal"
     data-tw-target="#Modify_service_status"
            href="#" as="a" variant="primary"
            data-servicestatus="{{ $order->service_status }}"  data-orderid="{{ $order->id }}"
            class="Modify_service_status mt-5">تعديل حالة الخدمة</x-base.button>


   <x-base.button  data-tw-toggle="modal"
     data-tw-target="#Edit_invoice_status"
            href="#" as="a" variant="primary"
            data-invoicestatus="{{ $order->invoice_status }}" data-orderid="{{ $order->id }}"
            class="Edit_invoice_status mt-5">تعديل حالة الفاتورة</x-base.button>

    <x-base.button  data-tw-toggle="modal"
     data-tw-target="#See_service_description"
            href="#" as="a" variant="primary"
            data-servicedescription="{{ $order->service_description }}" data-orderid="{{ $order->id }}"
            class="See_service_description mt-5">الاطلاع على وصف الخدمة</x-base.button>


    <x-base.button  data-tw-toggle="modal"
     data-tw-target="#order_recipient"
            href="#" as="a" variant="primary"
            data-recipient="{{ $order->recipient }}" data-orderid="{{ $order->id }}"
            class="order_recipient mt-5">تفويض / تغير مستلم طلب</x-base.button>

    <x-base.button  data-tw-toggle="modal"
     data-tw-target="#order_recipient_price"
            href="#" as="a" variant="primary"
            data-order_recipientprice="{{ $order->recipient_price }}"
            data-order_price="{{ $order->price }}" data-orderid="{{ $order->id }}"
            class="order_recipient_price mt-5">تعديل المبلغ المقدم للمستلم</x-base.button>


   <x-base.button  data-tw-toggle="modal"
     data-tw-target="#recipient_order"
            href="#" as="a" variant="primary"
            data-orderid="{{ $order->id }}"
            class="recipient_order mt-5">استلام الطلب</x-base.button>



      <x-base.button class="px-4 py-3 align-center mt-5 h-2" variant="primary" type="submit" name="submit">
        <a class="btn btn-success btn-sm" href="">نشر الطلب للمستلمين</a>
    </x-base.button>


       <x-base.button class="px-4 py-3 align-center mt-5 h-2" variant="primary" type="submit" name="submit">
        <a class="btn btn-success btn-sm" href="">الاطلاع على المعلومات الإضافية</a>
    </x-base.button>

         <x-base.button class="px-4 py-3 align-center mt-5 h-2" variant="primary" type="submit" name="submit">
        <a class="btn btn-success btn-sm" href="">مراسلة مستلم الطلب</a>
    </x-base.button>





            </x-base.popover.panel>
        </x-base.popover>
        <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->





</x-base.table.td>



        </x-base.table.tr>
    @endforeach
                                </x-base.table.tbody>
                            </x-base.table>
                        </div>
                    </x-base.preview>

                </div>
            </x-base.preview-component>
            <!-- END: Bordered Table -->





<!--MODALS -->




       <!-- Modify_the_request_type -->
                        <x-base.dialog id="Modify_the_request_type">
                          {!! Form::open(array('route' => 'Modify_request_type','method'=>'POST')) !!}
                           <input id="Modify_request_type_orderid" type="hidden"  value="" name="order_id" required />

                            <x-base.dialog.panel>
                                <x-base.dialog.title>
                                    <h2 class="mr-auto text-base font-medium">
                                      تعديل نوع الطلب
                                    </h2>
                                </x-base.dialog.title>
                                <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 sm:col-span-6">
                                        <x-base.form-label for="modal-form-1">اختر نوع الخدمه</x-base.form-label>

                                        <x-base.form-select name="service_type" required id="service_type">
                                        <option value="programming">برمجة نظام</option>
                                        <option value="development">تطوير نظام</option>
                                        <option value="technical">دعم فني</option>
                                        </x-base.form-select>
                                    </div>
                                </x-base.dialog.description>
                                <x-base.dialog.footer>
                                    <x-base.button
                                        class="mr-1 w-20"
                                        data-tw-dismiss="modal"
                                        type="button"
                                        variant="outline-secondary"
                                    >
                                        Cancel
                                    </x-base.button>
                                    <x-base.button
                                        class="w-20"
                                        type="submit"
                                        variant="primary"
                                    >
                                        Send
                                    </x-base.button>
                                </x-base.dialog.footer>
                            </x-base.dialog.panel>
                            {!! Form::close() !!}
                        </x-base.dialog>
                        <!-- END: Modal Content -->



         <!-- Modify_service_status -->
                        <x-base.dialog id="Modify_service_status">
                             {!! Form::open(array('route' => 'Modify_service_status','method'=>'POST')) !!}
                            <input id="Modify_service_status_orderid" type="hidden"  value="" name="order_id" required />
                            <x-base.dialog.panel>
                                <x-base.dialog.title>
                                    <h2 class="mr-auto text-base font-medium">
                              تعديل حالة الخدمة
                                    </h2>
                                </x-base.dialog.title>
                                <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">

                                    <div class="col-span-12 sm:col-span-6">
                                        <x-base.form-label for="modal-form-1">اختر حاله الخدمه</x-base.form-label>

                                        <x-base.form-select name="service_status" required id="service_status">
                                        <option value="new">طلب جديد</option>
                                        <option value="underway"> قيد التنفيذ</option>
                                        <option value="finished">منتهية</option>
                                        <option value="active">نشط</option>
                                        <option value="canceled">ملغي</option>
                                        </x-base.form-select>
                                    </div>
                                </x-base.dialog.description>
                                <x-base.dialog.footer>
                                    <x-base.button
                                        class="mr-1 w-20"
                                        data-tw-dismiss="modal"
                                        type="button"
                                        variant="outline-secondary"
                                    >
                                        Cancel
                                    </x-base.button>
                                    <x-base.button
                                        class="w-20"
                                        type="submit"
                                        variant="primary"
                                    >
                                        Send
                                    </x-base.button>
                                </x-base.dialog.footer>
                            </x-base.dialog.panel>
                                         {!! Form::close() !!}
                        </x-base.dialog>
                        <!-- END: Modal Content -->



                <!-- Edit_invoice_status -->
                        <x-base.dialog id="Edit_invoice_status">
                          {!! Form::open(array('route' => 'Edit_invoice_status','method'=>'POST')) !!}
                            <input id="Edit_invoice_status_orderid" type="hidden"  value="" name="order_id" required />
                            <x-base.dialog.panel>
                                <x-base.dialog.title>
                                    <h2 class="mr-auto text-base font-medium">
                               تعديل حالة الفاتورة
                                    </h2>
                                </x-base.dialog.title>
                                <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">

                                    <div class="col-span-12 sm:col-span-6">
                                        <x-base.form-label for="modal-form-1">اختر حاله الخدمه</x-base.form-label>


                                        <x-base.form-select name="invoice_status" required id="invoice_status">

                                        <option value="paid">مدفوعه</option>
                                        <option value="unpaid">غير مدفوعه</option>
                                        <option value="canceled">منتهية</option>
                                        <option value="finished">ملغية</option>
                                        <option value="pending">قيد الدفع</option>
                                        </x-base.form-select>
                                    </div>
                                </x-base.dialog.description>
                                <x-base.dialog.footer>
                                    <x-base.button
                                        class="mr-1 w-20"
                                        data-tw-dismiss="modal"
                                        type="button"
                                        variant="outline-secondary"
                                    >
                                        Cancel
                                    </x-base.button>
                                    <x-base.button
                                        class="w-20"
                                        type="submit"
                                        variant="primary"
                                    >
                                        Send
                                    </x-base.button>
                                </x-base.dialog.footer>
                            </x-base.dialog.panel>
                                {!! Form::close() !!}
                        </x-base.dialog>
                        <!-- END: Modal Content -->



                <!-- See_service_description -->
                        <x-base.dialog id="See_service_description">
                            <x-base.dialog.panel>
                                <x-base.dialog.title>
                                    <h2 class="mr-auto text-base font-medium">
                           وصف الخدمه
                                    </h2>
                                </x-base.dialog.title>
                                <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">

                                    <div class="col-span-12 sm:col-span-6">

                                    <x-base.form-textarea style="height: 148px;width:320px;"
                                    class="form-control disable"
                                    id="service_description"
                                    name="service_description"
                                    placeholder="  وصف الخدمه"
                                    minlength="10"
                                    required
                                ></x-base.form-textarea>
                                    </div>
                                </x-base.dialog.description>

                            </x-base.dialog.panel>
                        </x-base.dialog>
                        <!-- END: Modal Content -->



                <!-- order_recipient -->
                        <x-base.dialog id="order_recipient">
                        {!! Form::open(array('route' => 'order_recipient','method'=>'POST')) !!}
                            <input id="order_recipient_orderid" type="hidden"  value="" name="order_id" required />
                            <x-base.dialog.panel>
                                <x-base.dialog.title>
                                    <h2 class="mr-auto text-base font-medium">
                                 تفويض / تغير مستلم طلب
                                    </h2>
                                </x-base.dialog.title>
                                <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">

                                    <div class="col-span-12 sm:col-span-6">
                                        <x-base.form-label for="modal-form-1">اختر مستلم الطلب</x-base.form-label>
                                    <?php
                                $users = App\Models\User::where('type','none')->get();
                                    ?>
                                      <x-base.form-select name="recipient" id="recipient" required>
                                         <option value="">اختر مستلم الطلب</option>
                                        @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach

                                        </x-base.form-select>
                                    </div>
                                </x-base.dialog.description>
                                <x-base.dialog.footer>
                                    <x-base.button
                                        class="mr-1 w-20"
                                        data-tw-dismiss="modal"
                                        type="button"
                                        variant="outline-secondary"
                                    >
                                        Cancel
                                    </x-base.button>
                                    <x-base.button
                                        class="w-20"
                                        type="submit"
                                        variant="primary"
                                    >
                                        Send
                                    </x-base.button>
                                </x-base.dialog.footer>
                            </x-base.dialog.panel>
                                     {!! Form::close() !!}
                        </x-base.dialog>
                        <!-- END: Modal Content -->



                              <!-- order_recipient_price -->
                        <x-base.dialog id="order_recipient_price">
                             {!! Form::open(array('route' => 'order_recipient_price','method'=>'POST')) !!}
                            <input id="order_recipient_price_orderid" type="hidden"  value="" name="order_id" required />
                            <x-base.dialog.panel>
                                <x-base.dialog.title>
                                    <h2 class="mr-auto text-base font-medium">
                         تعديل المبلغ المقدم للمستلم
                                    </h2>
                                </x-base.dialog.title>
                                <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">

                                    <div class="col-span-12 sm:col-span-6">

                                <x-base.form-label for="regular-form-2"> المبلغ الكلي </x-base.form-label>
                            <x-base.form-input
                                id="price"
                                type="number"
                                value=""
                                name="price"
                                class="disable"
                                placeholder="المبلغ الكلي"
                            /><br><br>

                            <x-base.form-label class="mt5" for="regular-form-2"> المبلغ المقدم للمستلم </x-base.form-label>
                            <x-base.form-input
                                id="recipient_price"
                                type="number"
                                value=""
                                required
                                 min="0"
                                name="recipient_price"
                                placeholder="المبلغ الكلي "
                            />


                                    </div>
                                </x-base.dialog.description>
                              <x-base.dialog.footer>
                                    <x-base.button
                                        class="mr-1 w-20"
                                        data-tw-dismiss="modal"
                                        type="button"
                                        variant="outline-secondary"
                                    >
                                        Cancel
                                    </x-base.button>
                                    <x-base.button
                                        class="w-20"
                                        type="button"
                                        variant="primary"
                                    >
                                        Send
                                    </x-base.button>
                                </x-base.dialog.footer>
                            </x-base.dialog.panel>
                                        {!! Form::close() !!}
                        </x-base.dialog>
                        <!-- END: Modal Content -->



                   <!-- BEGIN: Delete Modal -->
            <x-base.preview-component class="intro-y box mt-5" id="recipient_order">

                <div
                    class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
                    <h2 class="mr-auto text-base font-medium">
                       استلام طلب
                    </h2>

                </div>
                <div class="p-5">
                    <x-base.preview>

                        <!-- BEGIN: Modal Content -->
                        <x-base.dialog id="recipient_order">
                            {!! Form::open(array('route' => 'recipient_order','method'=>'POST')) !!}
                            <input id="recipient_order_orderid" type="hidden"  value="" name="order_id" required />
                            <x-base.dialog.panel>
                                <div class="p-5 text-center">
                                    <x-base.lucide
                                        class="mx-auto mt-3 h-16 w-16 text-success"
                                        icon="CheckCircle"
                                    />
                                    <div class="mt-5 text-3xl">هل انت متاكد من استلام الطلب</div>

                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <x-base.button
                                        class="mr-1 w-24"
                                        data-tw-dismiss="modal"
                                        type="button"
                                        variant="outline-secondary"
                                    >
                                        الغاء
                                    </x-base.button>
                                    <x-base.button
                                        class="w-24"
                                        type="submit"
                                        variant="primary"
                                    >
                                        استلام
                                    </x-base.button>
                                </div>
                            </x-base.dialog.panel>
                                {!! Form::close() !!}
                        </x-base.dialog>
                        <!-- END: Modal Content -->
                    </x-base.preview>
                </div>

            </x-base.preview-component>
            <!-- END: Delete Modal -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>


$(".Modify_the_request_type").click(function() {
    var servicetype = $(this).data('servicetype');
    $("#service_type option[value= "+ servicetype+"").attr("selected","selected");
    var order_id = $(this).data('orderid');

    $('#Modify_request_type_orderid').val(order_id);
});



/////////////////////////////////

$(".Modify_service_status").click(function() {
    var servicestatus = $(this).data('servicestatus');;
    $("#service_status option[value= "+ servicestatus+"").attr("selected","selected");

      var order_id = $(this).data('orderid');
    $('#Modify_service_status_orderid').val(order_id);
});



/////////////////////////////////

$(".Edit_invoice_status").click(function() {
    var invoicestatus = $(this).data('invoicestatus');;
    $("#invoice_status option[value= "+ invoicestatus+"").attr("selected","selected");

    var order_id = $(this).data('orderid');
    $('#Edit_invoice_status_orderid').val(order_id);

});


/////////////////////////////////

$(".See_service_description").click(function() {
    var servicedescription = $(this).data('servicedescription');;
    $("#service_description").val(servicedescription);

});



/////////////////////////////////

$(".order_recipient").click(function() {
    var recipient = $(this).data('recipient');
    $("#recipient option[value= "+ recipient+"").attr("selected","selected");

    var order_id = $(this).data('orderid');
    $('#order_recipient_orderid').val(order_id);
});


/////////////////////////////////

$(".order_recipient").click(function() {
    var recipient_price = $(this).data('recipient_price');
    var price = $(this).data('recipient_price');

    $('input#recipient_price').val(recipient_price);
    $('input#price').val(price);


});

$(".recipient_order").click(function() {

     var order_id = $(this).data('orderid');
    $('#recipient_order_orderid').val(order_id);


});
</script>
@endsection













