<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\Reserva;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboardListUsers()
    {
        $users = UserModel::all();
        return view('site.dashboard', compact('users'));
    }

    public function dashboardListReserves()
    {
        $reserves = Reserva::all();
        return view('site.dashboard_reserves', compact('reserves'));
    }
}