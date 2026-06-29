<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // داشبورد ادمین - آمار
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::count();
        $totalRevenue = Order::where('status', 'paid')->sum('total_price');

        return response()->json([
            'total_products' => $totalProducts,
            'total_orders' => $totalOrders,
            'total_users' => $totalUsers,
            'total_revenue' => (float) $totalRevenue,
        ]);
    }

    // لیست همه سفارشات
    public function orders()
    {
        $orders = Order::with('items.product', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($orders);
    }

    // تغییر وضعیت سفارش
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $request->validate([
            'status' => 'required|in:pending,paid,shipped,delivered',
        ]);

        $order->update(['status' => $request->status]);

        return response()->json($order);
    }

    // لیست همه کاربران
    public function users()
    {
        $users = User::withCount('orders')->get();
        return response()->json($users);
    }

    // حذف کاربر
    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    // تغییر نقش کاربر به ادمین
    public function toggleAdmin($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        return response()->json(['message' => 'User role updated']);
    }
}