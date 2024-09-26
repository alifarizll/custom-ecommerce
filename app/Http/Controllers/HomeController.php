<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Stripe;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
{
    $user = User::where('usertype', 'user')->count();
    $product = Product::count();
    $order = Order::count();
    $deliverd = Order::where('status', 'Delivered')->count();

    $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $labels = [];
    $data = [];
    $colors = ['#008FFB', '#00E396', '#feb019', '#ff455f', '#775dd0', '#80effe',
              '#0077B5', '#ff6384', '#c9cbcf', '#0057ff', '00a9f4', '#2ccdc9', '#5e72e4'];

    for($i = 1; $i <= 12; $i++) {
        $month = date('F', mktime(0, 0, 0, $i, 1));  
        $count = 0;

        foreach($users as $userData) {
            if($userData->month == $i) {
                $count = $userData->count;  
                break;  
            }
        }

        array_push($labels, $month);
        array_push($data, $count);
        }

        $datasets = [
        [
            'label' => 'Users',
            'data' => $data,
            'backgroundColor' => $colors
        ]
        ];

        return view('admin.index', compact('user', 'product', 'order', 'deliverd', 'datasets', 'labels'));
    }

    public function home()
{
    $product = Product::all();

    $latestProduct = Product::latest()->take(8)->get();

    $latestProductIds = $latestProduct->pluck('id');

    $product = Product::whereNotIn('id', $latestProductIds)->take(12)->get();

    $category = Category::all();

    if(Auth::id())
    {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    }
    else
    {
        $count = '';
    }

    return view('home.index', compact('product', 'count', 'category', 'latestProduct'));
}

    public function login_home()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.index', compact('product','count'));
    }

    public function product_details($slug)
    {
    $data = Product::where('slug', $slug)->first();

    if (!$data) {
        abort(404, 'Product not found');
    }

    if (Auth::id()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    } else {
        $count = '';
    }

    return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added To Cart');

        return redirect()->back();
    }

    public function mycart()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }

        return view('home.mycart' , compact('count', 'cart'));
    }
    public function remove_cart($id)
    {
        $data = Cart::find($id);
        $data->delete();

        toastr()->timeOut(1000)->closeButton()->addSuccess('Product Removed From Cart');

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id', $userid)->get();

        foreach($cart as $carts)
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->product_id = $carts->product_id;

            $order->save();

            $product = Product::find($carts->product_id);

            $product->quantity -= 1;

            $product->save();

            
        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();
        }

        toastr()->timeOut(10000)->closeButton()->addSuccess('Order Confirmed');

        return redirect()->back();

    }
    public function myorders()
    {
        $user = Auth::user()->id;

        $count = Cart::where('user_id', $user)->get()->count();

        $order = Order::where('user_id', $user)->get();

        return view('home.order' , compact('count', 'order'));
    }

    public function stripe($value)
    {
        return view('home.stripe', compact('value'));
    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment Complete" 
        ]);
      
        $name = Auth::user()->name;

        $phone = Auth::user()->phone;

        $address = Auth::user()->address;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id', $userid)->get();

        foreach($cart as $carts)
        {
            $order = new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id = $userid;

            $order->product_id = $carts->product_id;

            $order->payment_status = 'Paid';

            $order->save();

            $product = Product::find($carts->product_id);

            $product->quantity -= 1;

            $product->save();

            
        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach($cart_remove as $remove)
        {
            $data = Cart::find($remove->id);

            $data->delete();
        }

        toastr()->timeOut(10000)->closeButton()->addSuccess('Order Confirmed');

        return redirect('/mycart');
    }

    public function shop(Request $request): View

    {
    $product = Product::query();

    $category = Category::all();

    if (Auth::id()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    } else {
        $count = '';
    }

    if ($request->category_filter) {
        $product = $product->where('category', $request->category_filter);
    }

    $product = $product->get();

    return view('home.shop', compact('product', 'count', 'category'));
    }

    public function why()
    {

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.why', compact( 'count'));
    }
    public function testimonial()
    {

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.testimonial', compact( 'count'));
    }
    public function contact()
    {

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.contact', compact( 'count'));
    }
    
}
