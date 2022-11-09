<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class AdminRoleController extends Controller
{
    private $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->latest()->paginate(5);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.add');
    }
}
