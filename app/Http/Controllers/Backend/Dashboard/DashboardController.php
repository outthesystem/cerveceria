<?php

namespace App\Http\Controllers\Backend\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
      return view('backend.views.dashboard.index');
    }

}
