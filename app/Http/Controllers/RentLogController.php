<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        // 'user','book' adalah nama relasi di model rentlog
        $rentlogs['rentlogs'] = RentLogs::with(['user','book'])->get();
        return view('rentlog',$rentlogs);
    }
}
