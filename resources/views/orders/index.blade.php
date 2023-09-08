@extends('../layouts/' . $layout) @section('subhead')
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



  .disable {
    pointer-events: none;
    background-color: #dde2ef !important;
    color: black !important;
  }

  .table td {
    text-align: center !important;
  }

  tr:nth-child(even) td,
  thead {
    background-color: #ebeced; /* Fondo blanco */
  }
  table {
    border: 1px solid #ddd;
  }
</style>
@endsection @section('subcontent')
@can('عرض طلب')

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

<!-- BEGIN: Bordered Table -->
<x-base.preview-component class="intro-y box mt-5">
  <div
    class="flex flex-col items-center border-b border-slate-200/60 p-5 sm:flex-row"
  >
    <h2 class="mr-auto text-base font-medium">الطلبات</h2>

    @can('اضافة طلب')
  <a class="btn btn-primary btn-sm" href="{{ route('orders.create') }}">
    <x-base.button
      class="mt-3 w-full px-4 py-3 align-top xl:mt-0 xl:w-32 btn"
      variant="primary"
    >
    اضافة طلب
    </x-base.button> </a>
    @endcan

  </div>

  <!-- BEGIN: HTML Table Data -->
  <div class="intro-y box mt-5 p-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
      <form
        action="{{ route('orderFilter') }}"
        method="post"
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
            id="tabulator-html-filter-field"
            name="field"
            required
          >
            @can('الاسم')
            <option value="user_name">الاسم</option>
            @endcan @can('نوع مقدم الطلب')
            <option value="user_type">نوع مقدم الطلب</option>
            @endcan @can('البريد')
            <option value="user_email">البريد</option>
            @endcan @can('رقم الهاتف')
            <option value="user_mobile_no">رقم الهاتف</option>
            @endcan @can('نوع الخدمة')
            <option value="service_type">نوع الخدمة</option>
            @endcan @can('تاريخ تقديم الطلب')
            <option value="created_at">تاريخ تقديم الطلب</option>
            @endcan @can('تاريخ بدء الخدمة')
            <option value="service_start_date">تاريخ بدء الخدمة</option>
            @endcan @can('تاريخ انتهاء الخدمة')
            <option value="service_end_date">تاريخ انتهاء الخدمة</option>
            @endcan @can('حالة الخدمة')
            <option value="service_status">حالة الخدمة</option>
            @endcan @can('حالة الخدمة')
            <option value="invoice_status">حالة الفاتورة</option>
            @endcan @can('مستلم الطلب')
            <option value="recipient_name">مستلم طلب</option>
            @endcan @can('مدة الخدمة')
            <option value="duration">مدة الخدمة</option>
            @endcan @can('سعر الخدمة')
            <option value="total_price">سعر الخدمة</option>
            @endcan @can('المبلغ المقدم للمستلم')
            <option value="recipient_price">المبلغ المقدم للمستلم</option>
            @endcan
          </x-base.form-select>
        </div>
        <div class="mt-2 items-center sm:mr-4 sm:flex xl:mt-0">
          <label class="mr-2 w-12 flex-none xl:w-auto xl:flex-initial">
            Type
          </label>
          <x-base.form-select
            class="mt-2 w-full sm:mt-0 sm:w-auto"
            id="tabulator-html-filter-type"
            name="type"
            required
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
          <a href="{{ route('orders.index') }}"
            ><x-base.button
              class="mt-2 w-full sm:mt-0 sm:ml-1 sm:w-16"
              id="tabulator-html-filter-reset"
              type="button"
              variant="secondary"
            >
              Reset
            </x-base.button></a
          >
        </div>
      </form>
    </div>
    <div class="scrollbar-hidden overflow-x-auto">
      <div class="mt-5" id="tabulator"></div>
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
              @endcan @can('نوع مقدم الطلب')
              <x-base.table.th class="whitespace-nowrap">
                نوع مقدم الطلب
              </x-base.table.th>
              @endcan @can('البريد')
              <x-base.table.th class="whitespace-nowrap">
                البريد
              </x-base.table.th>
              @endcan @can('رقم الهاتف')
              <x-base.table.th class="whitespace-nowrap">
                رقم الهاتف
              </x-base.table.th>
              @endcan @can('نوع الخدمة')
              <x-base.table.th class="whitespace-nowrap">
                نوع الخدمة
              </x-base.table.th>
              @endcan @can('تاريخ تقديم الطلب')
              <x-base.table.th class="whitespace-nowrap">
                تاريخ تقديم الطلب
              </x-base.table.th>
              @endcan @can('تاريخ بدء الخدمة')
              <x-base.table.th class="whitespace-nowrap">
                تاريخ بدأ الخدمة
              </x-base.table.th>
              @endcan @can('تاريخ انتهاء الخدمة')
              <x-base.table.th class="whitespace-nowrap">
                تاريخ انتهاء الخدمة
              </x-base.table.th>
              @endcan @can('حالة الخدمة')
              <x-base.table.th class="whitespace-nowrap">
                حالة الخدمة
              </x-base.table.th>
              @endcan @can('فاتورة الخدمة')
              <x-base.table.th class="whitespace-nowrap">
                حالة الفاتورة
              </x-base.table.th>
              @endcan @can('مستلم الطلب')
              <x-base.table.th class="whitespace-nowrap">
                مستلم طلب
              </x-base.table.th>
              @endcan @can('مدة الخدمة')
              <x-base.table.th class="whitespace-nowrap">
                مدة الخدمة
              </x-base.table.th>
              @endcan @can('سعر الخدمة')
              <x-base.table.th class="whitespace-nowrap">
                سعر الخدمة
              </x-base.table.th>
              @endcan @can('المبلغ المقدم للمستلم')
              <x-base.table.th class="whitespace-nowrap">
                المبلغ المقدم للمستلم
              </x-base.table.th>
              @endcan
              <x-base.table.th class="whitespace-nowrap">
                الإجراءات
              </x-base.table.th>
            </x-base.table.tr>
          </x-base.table.thead>
          <x-base.table.tbody>
            <?php $count=0; ?> @foreach ($orders as $key => $order)

            <x-base.table.tr>
              <x-base.table.td>{{ ++$count }}</x-base.table.td>

              @can('الاسم')
              <x-base.table.td>{{ $order->user->name }}</x-base.table.td>
              @endcan @can('نوع مقدم الطلب')
              <x-base.table.td> {{ $order->user->type}} </x-base.table.td>
              @endcan @can('البريد')
              <x-base.table.td>{{ $order->user->email }}</x-base.table.td>
              @endcan @can('رقم الهاتف')
              <x-base.table.td>{{ $order->user->mobile_no }}</x-base.table.td>
              @endcan @can('نوع الخدمة')
              <x-base.table.td> {{$order->service_type}} </x-base.table.td>
              @endcan @can('تاريخ تقديم الطلب')
              <x-base.table.td
                >{{ $order->created_at->format('d-m-Y h:i') }}</x-base.table.td
              >
              @endcan @can('تاريخ بدء الخدمة')
              <x-base.table.td
                >{{ $order->service_start_date }}</x-base.table.td
              >
              @endcan @can('تاريخ انتهاء الخدمة')
              <x-base.table.td>{{ $order->service_end_date }}</x-base.table.td>
              @endcan @can('حالة الخدمة')
              <x-base.table.td> {{ $order->service_status }} </x-base.table.td>
              @endcan @can('فاتورة الخدمة')
              <x-base.table.td> {{ $order->invoice_status}} </x-base.table.td>
              @endcan @can('مستلم الطلب')
              <x-base.table.td>
                @if($order->recipient) @php echo
                App\Models\User::find($order->recipient)->name; @endphp @else لم
                يحدد @endif
              </x-base.table.td>
              @endcan @can('مدة الخدمة')
              <x-base.table.td>{{ $order->duration }}</x-base.table.td>
              @endcan @can('سعر الخدمة')
              <x-base.table.td>{{ $order->total_price }}</x-base.table.td>
              @endcan @can('المبلغ المقدم للمستلم')
              <x-base.table.td>{{ $order->recipient_price }}</x-base.table.td>
              @endcan

              <x-base.table.td>
                <!-- BEGIN: Notifications -->
                <x-base.popover class="intro-x mr-4 sm:mr-6">
                  <x-base.popover.button class="relative block">
                    <x-base.lucide class="h-10 w-10" icon="AlignJustify" />
                  </x-base.popover.button>
                  <x-base.popover.panel class="mt-2 w-[280px] p-5 sm:w-[450px]">
                    <div class="mb-5 font-medium">الإجراءات</div>

                    @can('تعديل نوع الطلب')
                    <x-base.button
                      data-tw-toggle="modal"
                      data-tw-target="#Modify_the_request_type"
                      href="#"
                      as="a"
                      variant="primary"
                      data-servicetype="{{ $order->service_type }}"
                      data-orderid="{{ $order->id }}"
                      class="Modify_the_request_type mt-5"
                      >تعديل نوع الطلب</x-base.button
                    >

                    @endcan @can('تعديل حالة الخدمة')
                    <x-base.button
                      data-tw-toggle="modal"
                      data-tw-target="#Modify_service_status"
                      href="#"
                      as="a"
                      variant="primary"
                      data-servicestatus="{{ $order->service_status }}"
                      data-orderid="{{ $order->id }}"
                      class="Modify_service_status mt-5"
                      >تعديل حالة الخدمة</x-base.button
                    >

                    @endcan @can('تعديل حالة الفاتورة')
                    <x-base.button
                      data-tw-toggle="modal"
                      data-tw-target="#Edit_invoice_status"
                      href="#"
                      as="a"
                      variant="primary"
                      data-invoicestatus="{{ $order->invoice_status }}"
                      data-orderid="{{ $order->id }}"
                      class="Edit_invoice_status mt-5"
                      >تعديل حالة الفاتورة</x-base.button
                    >

                    @endcan @can('الاطلاع على وصف الخدمة')
                    <x-base.button
                      data-tw-toggle="modal"
                      data-tw-target="#View_additional_information"
                      href="#"
                      as="a"
                      variant="primary"
                      data-servicedescription="{{ $order->service_description }}"
                      data-orderid="{{ $order->id }}"
                      class="View_additional_information mt-5"
                      >الاطلاع على وصف الخدمة</x-base.button
                    >

                    @endcan @can('تفويض / تغير مستلم طلب')
                    <x-base.button
                      data-tw-toggle="modal"
                      data-tw-target="#order_recipient"
                      href="#"
                      as="a"
                      variant="primary"
                      data-recipient="{{ $order->recipient }}"
                      data-orderid="{{ $order->id }}"
                      class="order_recipient mt-5"
                      >تفويض / تغير مستلم طلب</x-base.button
                    >

                    @endcan @can('تعديل المبلغ المقدم للمستلم')
                    <x-base.button
                      data-tw-toggle="modal"
                      data-tw-target="#order_recipient_price"
                      href="#"
                      as="a"
                      variant="primary"
                      data-order_recipientprice="{{ $order->recipient_price }}"
                      data-order_price="{{ $order->total_price }}"
                      data-orderid="{{ $order->id }}"
                      class="order_recipient_price mt-5"
                      >تعديل المبلغ المقدم للمستلم</x-base.button
                    >
                    @endcan
                    @if ($order->publish == 1 || $order->publish == 0)
                     @can('استلام الطلب')
                    <x-base.button
                      data-tw-toggle="modal"
                      data-tw-target="#recipient_order"
                      href="#"
                      as="a"
                      variant="primary"
                      data-orderid="{{ $order->id }}"
                      class="recipient_order mt-5"
                      >استلام الطلب</x-base.button
                    >
                    @endcan
                    @endif


                     @can('الاطلاع على المعلومات الإضافية')
                    <x-base.button
                      data-tw-toggle="modal"
                      data-tw-target="#See_service_description"
                      href="#"
                      as="a"
                      variant="primary"
                      data-orderid="{{ $order->id }}"
                      data-userid="{{  App\Models\User::find($order->user_id)->name}}"
                      data-usermobile="{{  App\Models\User::find($order->user_id)->mobile_no}}"
                      data-servicetype="{{ $order->service_type }}"
                      data-createdat="{{ $order->created_at }}"
                      data-servicestartdate="{{ $order->service_start_date }}"
                      data-serviceenddate="{{ $order->service_end_date }}"
                      data-invoicestatus="{{ $order->invoice_status }}"
                      data-recipient="{{App\Models\User::find($order->recipient)->name }}"
                      data-duration="{{ $order->duration }}"
                      data-total_price="{{ $order->total_price }}"
                      data-servicedescription="{{ $order->service_description }}"
                      class="See_service_description mt-5"
                      >الاطلاع على المعلومات الإضافية</x-base.button
                    >

                    @endcan

                    @if ($order->publish == 0)
                    @can('نشر للمستلمين')
                    <x-base.button
                      href="{{ route('publish') }}"
                      as="a"
                      data-tw-toggle="modal"
                      onclick="event.preventDefault();document.getElementById('publish-form').submit();"
                      class="mt-5"
                      >نشر للمستلمين</x-base.button>
                    <form
                      id="publish-form"
                      action="{{ route('publish') }}"
                      method="POST"
                      style="display: none"
                    >
                      @csrf
                      <input
                        id="publishorderid"
                        type="hidden"
                        value=" {{ $order->id }}"
                        name="order_id"
                        required
                      />
                    </form>
                  </x-base.popover.panel>
                  @endcan
                @endif
                </x-base.popover>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
              </x-base.table.td>
            </x-base.table.tr>
            @endforeach
          </x-base.table.tbody>
        </x-base.table>
                        <div class="container"style="">
                            {!! $orders->links() !!}
                        </div>
      </div>
    </x-base.preview>
  </div>
</x-base.preview-component>
<!-- END: Bordered Table -->

<!--MODALS -->

<!-- Modify_the_request_type -->
<x-base.dialog id="Modify_the_request_type">
  {!! Form::open(array('route' => 'Modify_request_type','method'=>'POST')) !!}
  <input
    id="Modify_request_type_orderid"
    type="hidden"
    value=""
    name="order_id"
    required
  />

  <x-base.dialog.panel>
    <x-base.dialog.title>
      <h2 class="mr-auto text-base font-medium">تعديل نوع الطلب</h2>
    </x-base.dialog.title>
    <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
      <div class="col-span-12 sm:col-span-6">
        <x-base.form-label for="modal-form-1"
          >اختر نوع الخدمه</x-base.form-label
        >

        <x-base.form-select name="service_type" required id="service_type">
          <option value="برمجة نظام">برمجة نظام</option>
          <option value="تطوير نظام">تطوير نظام</option>
          <option value="دعم فني">دعم فني</option>
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
      <x-base.button class="w-20" type="submit" variant="primary">
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
  <input
    id="Modify_service_status_orderid"
    type="hidden"
    value=""
    name="order_id"
    required
  />
  <x-base.dialog.panel>
    <x-base.dialog.title>
      <h2 class="mr-auto text-base font-medium">تعديل حالة الخدمة</h2>
    </x-base.dialog.title>
    <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
      <div class="col-span-12 sm:col-span-6">
        <x-base.form-label for="modal-form-1"
          >اختر حاله الخدمه</x-base.form-label
        >

        <x-base.form-select name="service_status" required id="service_status">
          <option value="طلب جديد">طلب جديد</option>
          <option value="قيد التنفيذ">قيد التنفيذ</option>
          <option value="منتهية">منتهية</option>
          <option value="نشط">نشط</option>
          <option value="ملغي">ملغي</option>
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
      <x-base.button class="w-20" type="submit" variant="primary">
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
  <input
    id="Edit_invoice_status_orderid"
    type="hidden"
    value=""
    name="order_id"
    required
  />
  <x-base.dialog.panel>
    <x-base.dialog.title>
      <h2 class="mr-auto text-base font-medium">تعديل حالة الفاتورة</h2>
    </x-base.dialog.title>
    <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
      <div class="col-span-12 sm:col-span-6">
        <x-base.form-label for="modal-form-1"
          >اختر حاله الخدمه</x-base.form-label
        >

        <x-base.form-select name="invoice_status" required id="invoice_status">
          <option value="مدفوعه">مدفوعه</option>
          <option value="غير مدفوعه">غير مدفوعه</option>
          <option value="منتهية">منتهية</option>
          <option value="ملغية">ملغية</option>
          <option value="قيد الدفع">قيد الدفع</option>
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
      <x-base.button class="w-20" type="submit" variant="primary">
        Send
      </x-base.button>
    </x-base.dialog.footer>
  </x-base.dialog.panel>
  {!! Form::close() !!}
</x-base.dialog>
<!-- END: Modal Content -->

<!-- See_service_description -->
<x-base.dialog id="See_service_description">
 <x-base.dialog.panel style="width: 660px; height: 500px">
    <x-base.dialog.title>
      <h2 class="mr-auto text-base font-medium">المعلومات الاضافيه</h2>
    </x-base.dialog.title>
    <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
      <!-- BEGIN: Horizontal Form -->



            <div class="overflow-x-auto" style="width: 600px; height: 350px;overflow: scroll;">
                <x-base.table>

                    <x-base.table.tbody>
                        <x-base.table.tr>
                            <x-base.table.td class="border-b dark:border-darkmode-400">
                                <div class="whitespace-nowrap font-medium">
                                   اسم العميل
                                </div>
                            </x-base.table.td>

                            <x-base.table.td class="w-32 border-b text-right font-medium dark:border-darkmode-400">
                               <span class="tdname"></span>
                            </x-base.table.td>
                        </x-base.table.tr>
                        <x-base.table.tr>
                            <x-base.table.td class="border-b dark:border-darkmode-400">
                                <div class="whitespace-nowrap font-medium">
                                  الهاتف
                                </div>

                            </x-base.table.td>
                            <x-base.table.td class="w-32 border-b text-right font-medium dark:border-darkmode-400">
                                <span class="tdmobile"></span>
                            </x-base.table.td>
                        </x-base.table.tr>
                        <x-base.table.tr>
                            <x-base.table.td class="border-b dark:border-darkmode-400">
                                <div class="whitespace-nowrap font-medium">
                             نوع الخدمة
                                </div>

                            </x-base.table.td>
                            <x-base.table.td class="w-32 border-b text-right font-medium dark:border-darkmode-400">
                                 <span class="tdtype"></span>
                            </x-base.table.td>
                        </x-base.table.tr>
                        <x-base.table.tr>
                            <x-base.table.td>
                                <div class="whitespace-nowrap font-medium">
                                  تاريخ تقديم الطلب
                                </div>

                            </x-base.table.td>

                            <x-base.table.td class="w-32 text-right font-medium">
                                <span class="tdcreate"></span>
                            </x-base.table.td>
                        </x-base.table.tr>
                              <x-base.table.tr>
                            <x-base.table.td>
                                <div class="whitespace-nowrap font-medium">
                                تاريخ بدأ الخدمة
                                </div>

                            </x-base.table.td>

                            <x-base.table.td class="w-32 text-right font-medium">
                                 <span class="tdstart"></span>
                            </x-base.table.td>
                        </x-base.table.tr>
                              <x-base.table.tr>
                            <x-base.table.td>
                                <div class="whitespace-nowrap font-medium">
                                 تاريخ انتهاء الخدمة
                                </div>

                            </x-base.table.td>

                            <x-base.table.td class="w-32 text-right font-medium">
                               <span class="tdend"></span>
                            </x-base.table.td>
                        </x-base.table.tr>
                              <x-base.table.tr>
                            <x-base.table.td>
                                <div class="whitespace-nowrap font-medium">
                                  حالة الفاتورة
                                </div>

                            </x-base.table.td>

                            <x-base.table.td class="w-32 text-right font-medium">
                                 <span class="tdstatus"></span>
                            </x-base.table.td>
                        </x-base.table.tr>

                             <x-base.table.tr>
                            <x-base.table.td>
                                <div class="whitespace-nowrap font-medium">
                               مستلم طلب
                                 </div>

                            </x-base.table.td>

                            <x-base.table.td class="w-32 text-right font-medium">
                                <span class="tdrecipient"></span>
                            </x-base.table.td>
                        </x-base.table.tr>

                             <x-base.table.tr>
                            <x-base.table.td>
                                <div class="whitespace-nowrap font-medium">
                                مدة الخدمة
                                </div>

                            </x-base.table.td>

                            <x-base.table.td class="w-32 text-right font-medium">
                                  <span class="tdduration"></span>
                            </x-base.table.td>
                        </x-base.table.tr>

                             <x-base.table.tr>
                            <x-base.table.td>
                                <div class="whitespace-nowrap font-medium">
                                 سعر الخدمة
                                 </div>

                            </x-base.table.td>

                            <x-base.table.td class="w-32 text-right font-medium">
                               <span class="tdprice"></span>
                            </x-base.table.td>
                        </x-base.table.tr>

                             <x-base.table.tr>
                            <x-base.table.td>
                                <div class="whitespace-nowrap font-medium">
                                 وصف الخدمه
                                </div>

                            </x-base.table.td>

                            <x-base.table.td class="w-32 text-right font-medium">
                                <span class="tddescription"></span>
                            </x-base.table.td>
                        </x-base.table.tr>


                    </x-base.table.tbody>
                </x-base.table>
            </div>


                 <div class="mb-5 flex items-center bord border-slate-200/60 pb-5 dark:border-darkmode-400">


                </div>

      <!-- END: Horizontal Form -->
    </x-base.dialog.description>
  </x-base.dialog.panel>
</x-base.dialog>
<!-- END: Modal Content -->

<!-- order_recipient -->
<x-base.dialog id="order_recipient">
  {!! Form::open(array('route' => 'order_recipient','method'=>'POST')) !!}
  <input
    id="order_recipient_orderid"
    type="hidden"
    value=""
    name="order_id"
    required
  />
  <x-base.dialog.panel>
    <x-base.dialog.title>
      <h2 class="mr-auto text-base font-medium">تفويض / تغير مستلم طلب</h2>
    </x-base.dialog.title>
    <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
      <div class="col-span-12 sm:col-span-6">
        <x-base.form-label for="modal-form-1"
          >اختر مستلم الطلب</x-base.form-label
        >
        <?php $users = App\Models\User::where('type','none')->get(); ?>
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
      <x-base.button class="w-20" type="submit" variant="primary">
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
  <input
    id="order_recipient_price_orderid"
    type="hidden"
    value=""
    name="order_id"
    required
  />
  <x-base.dialog.panel>
    <x-base.dialog.title>
      <h2 class="mr-auto text-base font-medium">تعديل المبلغ المقدم للمستلم</h2>
    </x-base.dialog.title>
    <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
      <div class="col-span-12 sm:col-span-6">
        <x-base.form-label for="regular-form-2">
          المبلغ الكلي
        </x-base.form-label>
        <x-base.form-input
          id="price"
          type="number"
          value=""
          name="price"
          class="disable"
          placeholder="المبلغ الكلي"
        /><br /><br />

        <x-base.form-label class="mt5" for="regular-form-2">
          المبلغ المقدم للمستلم
        </x-base.form-label>
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
      <x-base.button class="w-20" type="submit" variant="primary">
        Send
      </x-base.button>
    </x-base.dialog.footer>
  </x-base.dialog.panel>
  {!! Form::close() !!}
</x-base.dialog>
<!-- END: Modal Content -->

<!-- BEGIN: Delete Modal -->
<x-base.preview-component class="intro-y box mt-5" id="recipient_order">


    <x-base.preview>
      <!-- BEGIN: Modal Content -->
      <x-base.dialog id="recipient_order">
        {!! Form::open(array('route' => 'recipient_order','method'=>'POST')) !!}
        <input
          id="recipient_order_orderid"
          type="hidden"
          value=""
          name="order_id"
          required
        />
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
            <x-base.button class="w-24" type="submit" variant="primary">
              استلام
            </x-base.button>
          </div>
        </x-base.dialog.panel>
        {!! Form::close() !!}
      </x-base.dialog>
      <!-- END: Modal Content -->
    </x-base.preview>

</x-base.preview-component>
<!-- END: Delete Modal -->

<!-- See_service_description -->
<x-base.dialog id="View_additional_information">
  <x-base.dialog.panel style="width: 660px; height: 500px">
    <x-base.dialog.title>
      <h2 class="mr-auto text-base font-medium">المعلومات الاضافيه</h2>
    </x-base.dialog.title>
    <x-base.dialog.description class="grid grid-cols-12 gap-4 gap-y-3">
      <!-- BEGIN: Horizontal Form -->
      <x-base.preview-component class="intro-y box mt-5" >
        <div class="p-5" style="width:600px">
          {!! Form::open(array('route' =>
          'View_additional_information','method'=>'POST')) !!}
          <x-base.preview>
            <x-base.form-inline>
              <input
                id="show_orderid"
                type="hidden"
                value=""
                name="order_id"
                required
              />
              <x-base.form-label class="sm:w-20" for="horizontal-form-1">
                مقدم الخدمة
              </x-base.form-label>
              <x-base.form-input
                class="disable"
                id="show_user_id"
                type="text"
              />
            </x-base.form-inline>
            <x-base.form-inline class="mt-5">
              <x-base.form-label class="sm:w-20" for="horizontal-form-2">
                نوع الخدمه
              </x-base.form-label>
              <x-base.form-input
                id="show_service_status"
                type="text"
                class="disable"
                placeholder="سعر"
              />
            </x-base.form-inline>
            <x-base.form-inline class="mt-5">
              <x-base.form-label class="sm:w-20" for="horizontal-form-2">
                سعر الخدمه
              </x-base.form-label>
              <x-base.form-input
                id="show_order_price"
                type="number"
                placeholder="سعر"
                name="price"
              />
            </x-base.form-inline>

            <x-base.form-label class="sm:w-20 mt-5" for="horizontal-form-2">
              وصف الخدمه
            </x-base.form-label>
            <p id="show_service_description"></p>
            <x-base.button class="w-24 mt-10" type="submit" variant="primary">
              اضافه مبلغ
            </x-base.button>
          </x-base.preview>
          {!! Form::close() !!}
        </div>
      </x-base.preview-component>
      <!-- END: Horizontal Form -->
    </x-base.dialog.description>
  </x-base.dialog.panel>
</x-base.dialog>
<!-- END: Modal Content -->

<script
  src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
  type="text/javascript"
></script>
<script>
  $(".Modify_the_request_type").click(function () {
      var order_id = $(this).data("orderid");
       $("#Modify_request_type_orderid").val(order_id);
       var servicetype = $(this).data("servicetype");
        var select = document.getElementById('service_type');
        var option;
        for (var i=0; i<select.options.length; i++) {
        option = select.options[i];

        if (option.value == servicetype) {
            option.selected = true;
            return;
        }
        }


  });

  /////////////////////////////////

  $(".Modify_service_status").click(function () {
    var servicestatus = $(this).data("servicestatus");
    var order_id = $(this).data("orderid");
    $("#Modify_service_status_orderid").val(order_id);

    var select = document.getElementById('service_status');
        var option;
        for (var i=0; i<select.options.length; i++) {
        option = select.options[i];

        if (option.value == servicestatus) {
            option.selected = true;
            return;
        }
        }

  });

  /////////////////////////////////

  $(".Edit_invoice_status").click(function () {
    var invoicestatus = $(this).data("invoicestatus");

    var order_id = $(this).data("orderid");
    $("#Edit_invoice_status_orderid").val(order_id);

     var select = document.getElementById('invoice_status');
        var option;
        for (var i=0; i<select.options.length; i++) {
        option = select.options[i];

        if (option.value == invoicestatus) {
            option.selected = true;
            return;
        }
        }
  });


  /////////////////////////////////

  $(".order_recipient").click(function () {

    var recipient = $(this).data("recipient");

    var order_id = $(this).data("orderid");
    $("#order_recipient_orderid").val(order_id);

    var select = document.getElementById('recipient');
        var option;
        for (var i=0; i<select.options.length; i++) {
        option = select.options[i];

        if (option.value == recipient) {
            option.selected = true;
            return;
        }
        }
  });

  /////////////////////////////////

   $(".order_recipient_price").click(function () {
    var order_recipientprice = $(this).data("order_recipientprice");
    var order_price = $(this).data("order_price");

    $("input#recipient_price").val(order_recipientprice);
    $("input#price").val(order_price);

     var order_id = $(this).data("orderid");
    $("#order_recipient_price_orderid").val(order_id);

  });


  $(".recipient_order").click(function () {
    var order_id = $(this).data("orderid");
    $("#recipient_order_orderid").val(order_id);
  });

  $(".View_additional_information").click(function () {
    var orderid = $(this).data("orderid");
    var orderprice = $(this).data("orderprice");
    var servicedescription = $(this).data("servicedescription");
    var servicestatus = $(this).data("servicestatus");
    var userid = $(this).data("userid");

    $("#show_orderid").val(orderid);
    $("#show_order_price").val(orderprice);
    $("#show_service_description").text(servicedescription);
    $("#show_service_status").val(servicestatus);
    $("#show_user_id").val(userid);
  });

  /////////////////////////////////

  $(".See_service_description").click(function () {
    var userid = $(this).data("userid");
    var usermobile = $(this).data("usermobile");
    var servicetype = $(this).data("servicetype");
    var createdat = $(this).data("createdat");
    var servicestartdate = $(this).data("servicestartdate");
    var serviceenddate = $(this).data("serviceenddate");
    var invoicestatus = $(this).data("invoicestatus");
    var recipient = $(this).data("recipient");
    var duration = $(this).data("duration");
    var total_price = $(this).data("total_price");
    var servicedescription = $(this).data("servicedescription");

   $('.tdname').html(userid);
   $('.tdmobile').html(usermobile);
   $('.tdtype').html(servicetype);
   $('.tdcreate').html(createdat);
   $('.tdstart').html(servicestartdate);
    $('.tdend').html(serviceenddate);
   $('.tdstatus').html(invoicestatus);
   //$('.tdname').html(invoicestatus);
   $('.tdrecipient').html(recipient);
   $('.tdduration').html(duration);
   $('.tdprice').html(total_price);
   $('.tddescription').html(servicedescription);




  });


</script>

  @endcan
@endsection
