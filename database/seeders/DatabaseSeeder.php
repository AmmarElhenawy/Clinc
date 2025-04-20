<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user=User::factory()->create([
            'name' => 'admin User',
            'email' => 'ammaradmin@gmail.com',
            'password' => Hash::make('12341234'),//لازم التشفير
        ]);
        $doctor1=User::factory()->create([
            'name' => 'doctor User',
            'email' => 'doc@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        $nurse1=User::factory()->create([
            'name' => 'nurse User',
            'email' => 'nurse@gmail.com',
            'password' => Hash::make('654321'),
        ]);
        // إنشاء صلاحيات
Permission::create(['name' =>'اضافه دوكتور']);//doctor
Permission::create(['name' => 'حاله الكشف']);//doctor
// Permission::create(['name' => 'لم يكشف']);
Permission::create(['name' => 'تحويل الي دوكتور']);//doctor
Permission::create(['name' => 'تعديل حذف']);//doctor
Permission::create(['name' => 'روشته']);//doctor
Permission::create(['name' => 'الفاتوره المطبوعه']);//nurse
Permission::create(['name' => 'كشف']);//nurse
Permission::create(['name' => 'اعاده']);//nurse

// إنشاء أدوار
$admin = Role::create(['name' => 'admin']);
$doctor = Role::create(['name' => 'doctor']);
$nurse = Role::create(['name' => 'nurse']);

// ربط صلاحيات بـ role
$admin->givePermissionTo(['اضافه دوكتور',
'حاله الكشف',
'تحويل الي دوكتور',
'تعديل حذف',
'روشته',
'الفاتوره المطبوعه',
'كشف',
'اعاده',
]);
$doctor->givePermissionTo(['اضافه دوكتور','حاله الكشف','تحويل الي دوكتور','تعديل حذف','روشته']);
$nurse->givePermissionTo(['الفاتوره المطبوعه','كشف','اعاده']);

$user->assignRole('admin');
$doctor1->assignRole('doctor');
$nurse1->assignRole('nurse');
    }
}
