<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [

        'المستخدمين',
        'قائمة المستخدمين',
        'صلاحيات المستخدمين',
        'الاعدادات',

        'اضافة مستخدم',
        'تعديل مستخدم',
        'حذف مستخدم',

        'عرض صلاحية',
        'اضافة صلاحية',
        'تعديل صلاحية',
        'حذف صلاحية',

        'عرض طلب',
        'اضافة طلب',
        'تعديل طلب',
        'حذف طلب',

        'الاسم',
        'نوع مقدم الطلب',
        'البريد',
        'رقم الهاتف',

        'نوع الخدمة',
        'تاريخ تقديم الطلب',
        'تاريخ بدأ الخدمة',
        'تاريخ انتهاء الخدمة',

        'حالة الخدمة',
        'فاتورة الخدمة',
        'مستلم الطلب',
        'مدة الخدمة',

        'سعر الخدمة',
        'المبلغ المقدم للمستلم',
        'وجود استفسار من المستلم',
        'وجود اقتراح مبلغ من المستلم',



];



foreach ($permissions as $permission) {

Permission::create(['name' => $permission]);
}


}
}
