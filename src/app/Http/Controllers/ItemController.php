<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\profileRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ExhibitionRequest;
use App\Http\Requests\addressRequest;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Address;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(){
        return view('index');
    }

    public function detail($id){

        $product = Product::with('likes', 'comments.user.profile', 'categories')->findOrFail($id);

        $latestComment = $product->comments()->latest()->first();

        return view('item', compact('product', 'latestComment'));
    }

    public function postComment(CommentRequest $request, $productId){
        Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'content' => $request->input('content')
        ]);

        return redirect()->back();
    }

    public function profile(){

        $user = Auth::user()->load('profile');

        return view('mypage', compact('user'));
    }

    public function initialEditProfile(){
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function editProfile(){

        $user = Auth::user()->load('profile');

        return view('profile', compact('user'));
    }

    public function storeProfile(ProfileRequest $request){
        $dir = 'images';

        $file_name = null;

        if ($request->hasFile('profile_image')) {
            $file_name = $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->storeAs('public/' . $dir, $file_name);
        }

        Auth::user()->profile()->create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'profile_image' => $file_name,
            'postal_code' => $request->input('postal_code'),
            'address' => $request->input('address'),
            'building' => $request->input('building'),
        ]);

        return redirect('/');
    }

    public function updateProfile(ProfileRequest $request){
        $user = auth()->user();

        if (!$user->profile) {
            $user->profile()->create([
                'name' => $user->name,
            ]);
            $user->refresh(); // リレーションを更新
        }

        if ($request->hasFile('profile_image')) {
            if ($user->profile->profile_image) {
                Storage::delete('public/images/' . $user->profile->profile_image);
            }
            $file_name = $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->storeAs('public/images', $file_name);
        } else {
            $file_name = $user->profile->profile_image ?? null;
        }

        $user->profile()->update([
            'profile_image' => $file_name,
            'postal_code' => $request->input('postal_code'),
            'address' => $request->input('address'),
            'building' => $request->input('building'),
        ]);

        $user->update([
            'name' => $request->input('name'),
        ]);

        return redirect('/mypage');
    }

    public function showExhibit(){
        $categories = Category::all();
        return view('sell', compact('categories'));
    }

    public function exhibit(ExhibitionRequest $request){
        $dir = 'products';
        $file_name = null;

        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_name);
        }

        $product = Product::create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => $file_name,
            'condition' => $request->input('condition'),
            'is_sold' => false,
        ]);

        if ($request->filled('category')) {
            $product->categories()->attach($request->input('category'));
        }

        return redirect('/');
    }

    public function showPurchase($id){

        $product = Product::with('user.profile')->find($id);

        return view('purchase', compact('product'));
    }

    public function purchase(Request $request, $productId){

        $product = Product::with('user.profile')->findOrFail($productId);

        if (!$product->user->profile) {
            return redirect('/mypage/profile');
        }

        Purchase::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'payment_method' => $request->input('payment_method'),
            'shipping_postal_code' => auth()->user()->profile->postal_code,
            'shipping_address' => auth()->user()->profile->address,
            'total_price' => $product->price,
        ]);

        return redirect('/index');
    }

    public function editAddress(){
        return view('address');
    }

    public function updateAddress(AddressRequest $request){

        $user = auth()->user();

        if (!$user->address) {
            $user->address()->create([
                'postal_code' => $request->input('postal_code'),
                'address' => $request->input('address'),
                'building' => $request->input('building'),
            ]);
        } else {
            $user->address()->update([
                'postal_code' => $request->input('postal_code'),
                'address' => $request->input('address'),
                'building' => $request->input('building'),
            ]);
        }

        return redirect()->back();
    }

}
