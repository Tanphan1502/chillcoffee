<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Import model Cart
use Carbon\Carbon; // Để sử dụng Carbon để tạo thời gian

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Cart is empty.']);
        }

        // Lấy thông tin người dùng
        $userId = session()->get('user_id'); // Hoặc bạn có thể dùng auth()->id()

        // Duyệt qua từng sản phẩm trong giỏ hàng và lưu vào bảng cart
        foreach ($cart as $productId => $item) {
            Cart::create([
                'usr_id' => $userId,
                'prd_id' => $productId,
                'quantity' => $item['quantity'],
                'total' => $item['quantity'] * $item['price'], // Tính tổng giá sản phẩm
                'time' => Carbon::now(), // Thời gian đặt hàng
            ]);
        }

        // Xóa giỏ hàng khỏi session
        session()->forget('cart');

        // Trả về phản hồi JSON thành công
        return response()->json(['success' => true, 'message' => 'Order placed successfully.']);
    }
}
