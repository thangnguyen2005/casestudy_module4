<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $search = $request->input('tukhoa');
        if (!$search) {
            $products = Product::paginate(4);
            return view('shop.shop', compact('products'));
        }
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->paginate(4);
        return view('shop.shop', compact('products'));
    }

    public function autocomplete_ajax(Request $request)
{
    $query = $request->input('query');
    if ($query) {
        $data = Product::where('name', 'LIKE', '%' . $query . '%')->get();

        $output = '<ul class="dropdown-menu" style="display:block; background-color: #fff; border: 1px solid #ccc; padding: 10px;">';
        foreach ($data as $key => $product) {
            $output .= '<li class="li_search_ajax"><a href="#" style="display: block; padding: 5px 10px; text-decoration: none; color: #333;">';
            $output .= '<img src="' . asset('admin/uploads/product/' . $product->image) . '" alt="Product Image" style="width: 50px; height: 50px; margin-right: 10px;">';
            $output .= $product->name;
            $output .= '</a></li>';
        }
        $output .= '</ul>';
        return $output;
    }
}
    public function loadMoreData(Request $request)
    {
        $start = $request->input('start');

        $data = Product::orderBy('id', 'ASC')
            ->offset($start)
            ->limit(5)
            ->get();

        return response()->json([
            'data' => $data,
            'next' => $start + 5
        ]);
    }
    public function checkOut()
    {
        return view('shop.checkOut');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('shop.cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function detail($id)
    {
        $product = Product::find($id);
        // Lấy các sản phẩm có liên quan (ví dụ: cùng danh mục)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '<>', $product->id) // Loại bỏ sản phẩm hiện tại
            ->inRandomOrder() // Sắp xếp ngẫu nhiên
            ->get();
        return view('shop.detail', compact('product', 'relatedProducts'));
    }
    public function order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer

                ::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;

            if (isset($request->note)) {
                $data->note = $request->note;
            }
            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');

            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();
            session()->forget('cart');
            DB::table('products')
                ->where('id', '=', $orderItem->product_id)
                ->decrement('quantity', $orderItem->quantity);
        }

        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];
        // dd($request);
        // alert()->success('Thêm Đơn Đặt: '.$request->name,'Thành Công');
        return redirect()->route('shop.index')->with('success', 'Đặt hàng thành công!');
        // }
        // } catch (\Exception $e) {
        //     // dd($request);
        //     Log::error($e->getMessage());
        //     // toast('Đặt hàng thấy bại!', 'error', 'top-right');
        //     return redirect()->route('shop.index');
        // }
    }
}
