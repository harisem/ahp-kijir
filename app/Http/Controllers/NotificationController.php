<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('users')->where('user_id', Auth::id())->get();
        // dd($notifications);
        return view('notifikasi.index', [
            'notifications' => $notifications
        ]);
    }
}
