<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        \OpenAdmin\Admin\Auth\Database\Menu::truncate();
        \OpenAdmin\Admin\Auth\Database\Menu::insert(
            [

            ]
        );

        \OpenAdmin\Admin\Auth\Database\Permission::truncate();
        \OpenAdmin\Admin\Auth\Database\Permission::insert(
            [

            ]
        );

        \OpenAdmin\Admin\Auth\Database\Role::truncate();
        \OpenAdmin\Admin\Auth\Database\Role::insert(
            [

            ]
        );

        // pivot tables
        DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert(
            [

            ]
        );

        DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert(
            [

            ]
        );

        // finish
    }
}
