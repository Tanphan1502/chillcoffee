<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart', []); // Lấy giỏ hàng từ session
        $newProducts=Product::newProducts(4)->get();
        return view('cart', compact('cart', 'newProducts'));
    }

    public function addToCart(Request $request)
    {
        $quantity = is_numeric($request->quantity) && $request->quantity > 0 ? $request->quantity : 1;

        $product = [
            'id' => $request->id,
            'name' => $request->name ?? 'Unknown Product',
            'price' => $request->price ?? 0,
            'quantity' => $quantity,
            'img' => $request->img ?? 'default-image.jpg',
        ];

        $cart = session()->get('cart', []); // Lấy giỏ hàng từ session

        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        if (isset($cart[$product['id']])) {
            // Nếu có rồi, tăng số lượng lên thay vì thêm mới
            $cart[$product['id']]['quantity'] += $product['quantity'];
        } else {
            // Nếu chưa có, thêm sản phẩm vào giỏ
            $cart[$product['id']] = $product;
        }

        session()->put('cart', $cart); // Lưu lại giỏ hàng vào session

        // Tính tổng giá trị giỏ hàng
        $cartTotal = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart' => $cart,
            'cartTotal' => $cartTotal,  // Trả về tổng giá trị giỏ hàng
        ]);
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]); // Xóa sản phẩm khỏi giỏ hàng
            session()->put('cart', $cart); // Cập nhật lại giỏ hàng trong session
        }

        return response()->json([
            'success' => true,
            'message' => 'Product removed successfully!',
            'cartCount' => count($cart), // Trả về số lượng sản phẩm còn lại
        ]);
    }

    public function update(Request $request, $id)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng
        if(isset($cart[$id])) {
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $cart[$id]['quantity'] = $request->quantity;
            
            // Cập nhật lại giỏ hàng trong session
            session()->put('cart', $cart);
        }

        // Trả về phản hồi JSON sau khi cập nhật
        return response()->json(['message' => 'Số lượng đã được cập nhật']);
    }

    public function updateQuantity(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        // Giả sử cart là một session array
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session(['cart' => $cart]);

            $total = $cart[$id]['price'] * $quantity;
            $cartTotal = array_reduce($cart, function ($sum, $item) {
                return $sum + ($item['price'] * $item['quantity']);
            }, 0);

            return response()->json([
                'success' => true,
                'total' => $total,
                'cartTotal' => $cartTotal
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Product not found']);
    }

}
