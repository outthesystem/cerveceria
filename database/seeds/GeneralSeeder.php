<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Carbon\Carbon;
use DB;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
      ]);
      DB::table('roles')->insert([
        [
            'name' => 'Admin',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
      ]);
      DB::table('permissions')->insert([
        [
            'name' => 'ver_usuarios',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'crear_usuario',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'editar_usuario',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'eliminar_usuario',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'ver_permisos',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'crear_permiso',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'editar_permiso',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'eliminar_permiso',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'ver_roles',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'crear_rol',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'editar_rol',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'eliminar_rol',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'ver_dashboard',
            'guard_name' => 'web',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
      ]);
      DB::table('model_has_roles')->insert([
        [
            'role_id' => '1',
            'model_id' => '1',
            'model_type' => 'App\User',
        ],
      ]);
      DB::table('role_has_permissions')->insert([
        [
            'permission_id' => '1',
            'role_id' => '1',
        ],
        [
            'permission_id' => '2',
            'role_id' => '1',
        ],
        [
            'permission_id' => '3',
            'role_id' => '1',
        ],
        [
            'permission_id' => '4',
            'role_id' => '1',
        ],
        [
            'permission_id' => '5',
            'role_id' => '1',
        ],
        [
            'permission_id' => '6',
            'role_id' => '1',
        ],
        [
            'permission_id' => '7',
            'role_id' => '1',
        ],
        [
            'permission_id' => '8',
            'role_id' => '1',
        ],
        [
            'permission_id' => '9',
            'role_id' => '1',
        ],
        [
            'permission_id' => '10',
            'role_id' => '1',
        ],
        [
            'permission_id' => '11',
            'role_id' => '1',
        ],
        [
            'permission_id' => '12',
            'role_id' => '1',
        ],
        [
            'permission_id' => '13',
            'role_id' => '1',
        ],
      ]);
    }
}
