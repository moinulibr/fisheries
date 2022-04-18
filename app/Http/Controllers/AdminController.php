<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        // $orders = Order::all();
        // return view('admin.order.index', compact('orders'));
        return view('admin.dashboard');
    }
    public function newsTicker()
    {
        return view('admin.news_ticker');
    }
    
    public function imageMessage()
    {
        return view('admin.image_messages');
    }

    public function importantLink()
    {
        return view('admin.important_links');
    }

    public function otherService()
    {
        return view('admin.other_services');
    }
}
