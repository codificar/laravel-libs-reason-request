<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class AddPermissionReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::updateOrCreate(
            ['name' => 'ModuleReasons'],
            [
                'name' => 'ModuleReasons',
                'parent_id' => 2319,
                'is_menu' => 1,
                'url' => null,
                'order' => 930,
                'icon' => 'fa fa-newspaper-o'
            ]
        );

        $permission1 = Permission::updateOrCreate(
            ['name' => 'SettingReasons'],
            [
                'name' => 'SettingReasons',
                'parent_id' => $permission->id,
                'is_menu' => 1,
                'order' => 931,
                'url' => '/admin/lib/reasons/setting'
            ]
        );

        $permission2 = Permission::updateOrCreate(
            ['name' => 'addReasons'],
            [
                'name' => 'addReasons',
                'parent_id' => $permission->id,
                'is_menu' => 1,
                'order' => 932,
                'url' => '/admin/lib/reasons/add'
            ]
        );

        $permission3 = Permission::updateOrCreate(
            ['name' => 'listReasons'],
            [
                'name' => 'listReasons',
                'parent_id' => $permission->id,
                'is_menu' => 1,
                'order' => 933,
                'url' => '/admin/lib/reasons/list'
            ]
        );

        $admins = \Admin::select('id','profile_id')->get();
        
        if($admins && $permission){
            $findProfiles = array();
            foreach($admins as $admin){
                \AdminPermission::updateOrCreate(
                    ['admin_id' => $admin->id, 'permission_id' => $permission->id],
                    ['admin_id' => $admin->id, 'permission_id' => $permission->id]
                );
                \AdminPermission::updateOrCreate(
                    ['admin_id' => $admin->id, 'permission_id' => $permission1->id],
                    ['admin_id' => $admin->id, 'permission_id' => $permission1->id]
                );
                \AdminPermission::updateOrCreate(
                    ['admin_id' => $admin->id, 'permission_id' => $permission2->id],
                    ['admin_id' => $admin->id, 'permission_id' => $permission2->id]
                );
                \AdminPermission::updateOrCreate(
                    ['admin_id' => $admin->id, 'permission_id' => $permission3->id],
                    ['admin_id' => $admin->id, 'permission_id' => $permission3->id]
                );
                
                if ($admin->profile_id && !in_array($admin->profile_id, $findProfiles)) {
                    $findProfiles = array_merge($findProfiles, array($admin->profile_id));
                    \ProfilePermission::updateOrCreate(
                        ['profile_id' => $admin->profile_id, 'permission_id' => $permission->id],
                        ['profile_id' => $admin->profile_id, 'permission_id' => $permission->id]
                    );
                    \ProfilePermission::updateOrCreate(
                        ['profile_id' => $admin->profile_id, 'permission_id' => $permission1->id],
                        ['profile_id' => $admin->profile_id, 'permission_id' => $permission1->id]
                    );
                    \ProfilePermission::updateOrCreate(
                        ['profile_id' => $admin->profile_id, 'permission_id' => $permission2->id],
                        ['profile_id' => $admin->profile_id, 'permission_id' => $permission2->id]
                    );
                    \ProfilePermission::updateOrCreate(
                        ['profile_id' => $admin->profile_id, 'permission_id' => $permission3->id],
                        ['profile_id' => $admin->profile_id, 'permission_id' => $permission3->id]
                    );
                }
            }
        }
    }
}
