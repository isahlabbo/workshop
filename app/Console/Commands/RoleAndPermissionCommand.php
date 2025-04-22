<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Role;
use App\Models\Permission;

class RoleAndPermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:role-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $models =[
           'Bootcamp',
           'Project',
           'Step',
           'Tool',
           'Workshop',
           'Topic',
           'Sub Topic',
           'Payment',
           'Payment Attempt',
           'Fees',
           'Bootcamp Fees',
           'Workshop Fees',
           'Programme',
           'Coordinator',
           'Facilitator',
           'Centre',
           'Topic Allocation',
           'Schedule',
           'Certificate',
           'Assessment',
           'Calendar',
           'Roles',
           'Permissions',
           'Role Permissions',
           'User Roles',
           'User Permissions',
       ];
       foreach($models as $model){
           $role = Role::firstOrCreate(['name'=>'Manage '.$model]);
            foreach(['Create ', 'Read ', 'Update ', 'Delete '] as $task){
                $permission = Permission::firstOrCreate(['name'=>$task.$model]);
                $role->rolePermissions()->firstOrCreate(['permission_id'=>$permission->id]);
            }
       }

    }
}
