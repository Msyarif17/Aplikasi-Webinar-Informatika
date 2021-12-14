<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
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
            'name' => 'Admin Webinar', 
            'email' => 'webinarinformatikaofficial@gmail.com',
            'password' => bcrypt('webinarif21')
        ]);
    
        $role = Role::create(['name' => 'Admin']);
        Role::create(['name'=>'Peserta']);
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}