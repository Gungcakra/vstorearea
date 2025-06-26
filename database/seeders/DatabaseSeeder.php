<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Customer;
use App\Models\Departement;
use App\Models\Employee;
use App\Models\Menu;
use App\Models\Service;
use App\Models\SparePart;
use App\Models\SubMenu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

    


        $developer = Role::firstOrCreate(['name' => 'developer', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // Define permissions
        $permissions = [
            'dashboard',
            'masterdata-user',
            'masterdata-game',
            'masterdata-menu',
            'masterdata-transaction',
            'masterdata-role',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $developer->syncPermissions([
            'dashboard',
            'masterdata-user',
            'masterdata-game',
            'masterdata-menu',
            'masterdata-transaction',
            'masterdata-role',
        ]);

        $admin->syncPermissions([
            'dashboard',
            // 'masterdata-user',
            'masterdata-game',
            // 'masterdata-menu',
            'masterdata-transaction',
            // 'masterdata-role',
        ]);

        // Create a developer user
        $developerUser = User::factory()->create([
            'name' => 'developer',
            'email' => 'dev@me',
            'password' => bcrypt('guarajadisini')
        ]);
        $developerUser->assignRole('developer');

        $adminUser = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('yayasayasetuju')
        ]);
        $adminUser->assignRole('admin');

        // Menu Dashboard
        $dashboard = Menu::create([
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-house',
            'route' => 'dashboard',
            'order' => 1,
        ]);

        SubMenu::create([
            'menu_id' => $dashboard->id,
            'name' => 'Home',
            'route' => 'dashboard',
            'order' => 1,
            'permission_id' => Permission::where('name', 'dashboard')->first()->id
        ]);

        // Menu Master Data
        $masterData = Menu::create([
            'name' => 'Master Data',
            'icon' => 'fa-solid fa-database',
            'route' => null,
            'order' => 2
        ]);

        SubMenu::create([
            'menu_id' => $masterData->id,
            'name' => 'User',
            'route' => 'user',
            'order' => 0,
            'permission_id' => Permission::where('name', 'masterdata-user')->first()->id
        ]);

        SubMenu::create([
            'menu_id' => $masterData->id,
            'name' => 'Role',
            'route' => 'role',
            'order' => 1,
            'permission_id' => Permission::where('name', 'masterdata-role')->first()->id
        ]);

        SubMenu::create([
            'menu_id' => $masterData->id,
            'name' => 'Game',
            'route' => 'game',
            'order' => 2,
            'permission_id' => Permission::where('name', 'masterdata-game')->first()->id
        ]);

        SubMenu::create([
            'menu_id' => $masterData->id,
            'name' => 'Transaction',
            'route' => 'transaction',
            'order' => 3,
            'permission_id' => Permission::where('name', 'masterdata-transaction')->first()->id
        ]);

        SubMenu::create([
            'menu_id' => $masterData->id,
            'name' => 'Menu',
            'route' => 'menu',
            'order' => 4,
            'permission_id' => Permission::where('name', 'masterdata-menu')->first()->id
        ]);

       

        $this->call([
            GameSeeder::class,
        ]);
     

       

    }
}
