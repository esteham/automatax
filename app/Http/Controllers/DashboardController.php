<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Enums\Role;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $role = $request->user()->role;

        return match ($role) {
            Role::ADMIN      => Inertia::render('Dashboard/Admin/Index', ['role' => $role->value]),
            Role::TAXPAYER   => Inertia::render('Dashboard/Taxpayer/Index'),
            Role::AUDITOR    => Inertia::render('Dashboard/Admin/Index', ['role' => $role->value]),
            Role::ACCOUNTANT => Inertia::render('Dashboard/Admin/Index', ['role' => $role->value]),
            default          => Inertia::render('Dashboard/Taxpayer/Index'),
        };

    }
    
}
