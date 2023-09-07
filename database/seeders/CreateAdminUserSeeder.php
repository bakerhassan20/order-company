<?php
namespace Database\Seeders;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

         $user = User::create([
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'mobile_no' => '1122002942',
        'mobile_verified_at' => Carbon::now(),
        'roles_name' => ["مدير"],
        ]);

        $role = Role::create(['name' => 'مدير']);
        $role2 = Role::create(['name' => 'مستخدم']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


}
}
