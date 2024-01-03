<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
    $products = Product::with('category')->latest('created_at')->paginate(3);
    $startingNumber = ($products->currentPage() - 1) * $products->perPage() + 1;

    return view('product.index', compact('products', 'startingNumber'));
}

    public function create()
    {
    $this->authorize('create', Product::class);

        $categories = Category::all();
        $products = Product::all();
        return view('product.create', compact('products', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'admin/uploads/product';
            $newImageName = $image->getClientOriginalName();
            $newImageName = pathinfo($newImageName, PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $newImageName);
            $product->image = $newImageName;
        }
        $product->save();

        $product = Product::orderBy('created_at', 'desc')->paginate(3);
        // return redirect()->route('product.index', compact('product'));
        return redirect()->route('product.index', compact('product'))->with('status', 'Thêm sản phẩm thành công');
    }

    public  function trash()
    {
        $products = Product::onlyTrashed()->paginate(3);
        $param = ['products' => $products];
        return view('trash', $param);
        // dd(223);
    }

    public function edit($id)
    {
        $this->authorize('update', Product::class);
        $product = Product::find($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $get_image = $request->image;
        if ($get_image) {
            $path = 'admin\uploads\product' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'admin\uploads\product';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $product->save();

        return redirect()->route('product.index')->with('status', 'Sửa sản phẩm thành công');
    }

    public function destroy($id)
    {
        $this->authorize('forceDelete', Product::class);
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
        return redirect()->back()->with('status', 'Xóa sản phẩm thành công');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where(function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%");
        })
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");
            })
            ->paginate(3);

        return view('product.index', compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public  function softdeletes($id)
    {
        $this->authorize('delete', Product::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $product->deleted_at = date("Y-m-d h:i:s");
        $product->save();
        return redirect()->route('product.index');
    }
    public function restoredelete($id)
    {
        // $this->authorize('restore', Category::class);
        $products = Product::withTrashed()->where('id', $id);
        $products->restore();
        return redirect()->route('product.trash');
    }
}

