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

        Departement::insert([
            ['name' => 'Mechanic', 'salary' => 6000000],
            ['name' => 'Front Office', 'salary' => 5000000],
            ['name' => 'Back Office', 'salary' => 5500000],
            ['name' => 'Manager', 'salary' => 10000000],
            ['name' => 'HRD', 'salary' => 8000000],
        ]);
        Employee::insert([
            ['name' => 'John Doe', 'departement_id' => 4, 'phone' => '081234567890', 'address' => '123 Main St'],
            ['name' => 'Jane Smith', 'departement_id' => 5, 'phone' => '081234567891', 'address' => '456 Elm St'],
            ['name' => 'Alice Johnson', 'departement_id' => 2, 'phone' => '081234567892', 'address' => '789 Oak St'],
            ['name' => 'Bob Brown', 'departement_id' => 1, 'phone' => '081234567893', 'address' => '101 Pine St'],
            ['name' => 'Charlie Davis', 'departement_id' => 1, 'phone' => '081234567894', 'address' => '202 Maple St'],
            ['name' => 'David Wilson', 'departement_id' => 1, 'phone' => '081234567895', 'address' => '303 Birch St'],
            ['name' => 'Eve Taylor', 'departement_id' => 1, 'phone' => '081234567896', 'address' => '404 Cedar St'],
            ['name' => 'Frank Harris', 'departement_id' => 1, 'phone' => '081234567897', 'address' => '505 Walnut St'],
            ['name' => 'Grace Martin', 'departement_id' => 1, 'phone' => '081234567898', 'address' => '606 Cherry St'],
            ['name' => 'Hank Lee', 'departement_id' => 1, 'phone' => '081234567899', 'address' => '707 Willow St'],
            ['name' => 'Ivy Walker', 'departement_id' => 1, 'phone' => '081234567900', 'address' => '808 Ash St'],
            ['name' => 'Jack Hall', 'departement_id' => 1, 'phone' => '081234567901', 'address' => '909 Poplar St'],
        ]);
    


        $developer = Role::firstOrCreate(['name' => 'developer', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        $employee = Role::firstOrCreate(['name' => 'employee', 'guard_name' => 'web']);

        // Define permissions
        $permissions = [
            'dashboard',
            'masterdata-user',
            'masterdata-employee',
            'masterdata-menu',
            'masterdata-departement',
            'masterdata-role',

                    
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $developer->syncPermissions([
            'dashboard',
            'masterdata-user',
            'masterdata-employee',
            'masterdata-menu',
            'masterdata-departement',
            'masterdata-role',
        ]);

        $admin->syncPermissions([
            'dashboard',
            'masterdata-user',
            'masterdata-employee',
            'masterdata-role',
            'masterdata-menu',
            'masterdata-departement',
        ]);

        $employee->syncPermissions([
            'dashboard'
        ]);

        // Create a developer user

        $developerUser = User::factory()->create([
            'name' => 'developer',
            'email' => 'dev@me',
            'password' => bcrypt('guarajadisini')
        ]);
        $developerUser->assignRole('developer');

        $admin =  User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $admin->assignRole('admin');

        

        
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

        Submenu::create([
            'menu_id' => $masterData->id,
            'name' => 'User',
            'route' => 'user',
            'order' => 0,
            'permission_id' => Permission::where('name', 'masterdata-user')->first()->id
        ]);

        Submenu::create([
            'menu_id' => $masterData->id,
            'name' => 'Role',
            'route' => 'role',
            'order' => 1,
            'permission_id' => Permission::where('name', 'masterdata-role')->first()->id
        ]);

        Submenu::create([
            'menu_id' => $masterData->id,
            'name' => 'Departement',
            'route' => 'departement',
            'order' => 2,
            'permission_id' => Permission::where('name', 'masterdata-departement')->first()->id
        ]);
        Submenu::create([
            'menu_id' => $masterData->id,
            'name' => 'Employee',
            'route' => 'employee',
            'order' => 3,
            'permission_id' => Permission::where('name', 'masterdata-employee')->first()->id
        ]);

        Submenu::create([
            'menu_id' => $masterData->id,
            'name' => 'Menu',
            'route' => 'menu',
            'order' => 4,
            'permission_id' => Permission::where('name', 'masterdata-menu')->first()->id
        ]);

       


     

       

    }
}
