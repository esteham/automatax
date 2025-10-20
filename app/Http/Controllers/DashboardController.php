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
            Role::ADMIN      => Inertia::render('Dashboard/Admin/Index'),
            Role::TAXPAYER   => Inertia::render('Dashboard/Taxpayer/Index'),
            Role::AUDITOR    => Inertia::render('Dashboard/Auditor/Index'),
            Role::ACCOUNTANT => Inertia::render('Dashboard/Accountant/Index'),
            default          => Inertia::render('Dashboard/Taxpayer/Index'),
        };

    }
    
}
