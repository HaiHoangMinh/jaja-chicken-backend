<?php
    namespace App\Services;

use Illuminate\Auth\Access\Gate;

class PermissionGateAndPolicyAccess{
        public function setGateAndPolicyAccess()
        {
            Gate::define('role-list','App\Policies\RolePolicy@view');
            Gate::define('role-add','App\Policies\RolePolicy@create');
            Gate::define('role-edit','App\Policies\RolePolicy@update');
            Gate::define('role-delete','App\Policies\RolePolicy@delete');
        }
    }
?>