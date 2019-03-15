<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Mail;
use App\Mail\Demo;
use App\Mail\UserContact;
use App\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function formUpload()
    {
        return view('form-upload');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function upload(Request $request)
    {
        $product= Product::find(1);
        //kiểm tra có file trong images ko
        if($request->hasFile('images')) 
        {
            $imageData = [];
            //xử lí từng ảnh 
            foreach (request()->file('images') as  $item) {
                //lấy ra tên gốc của ảnh
                $name= $item->getClientOriginalName();
                //đổi tên ảnh
                $newName= '/images/product/'.rand(100,10000).$name;
                //upload ảnh vào thư mục public/images/product/
                $item->move(public_path('/images/product/'), $newName);

                //tạo mảng data để insert vào bảng images
                $dataImage= [
                    'path' => $newName,
                    'product_id' => $product->id
                ];
                array_push($imageData, $dataImage);

            }
            // $imageData= json_encode($imageData);
            // $product->update(['image' => $imageData]);
             Image::insert($imageData);
        }
        return redirect()->route('show-image', $product->id);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function formMail()
    {
        return view('form-mail');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendMail(Request $request)
    {
        // dd($request->all());
        // dd($request->only('name', 'content'));
        $data= $request->only('name', 'content');
        // $product= Product::find(1);
        // $orders= Order::where('user_id', 1)->get();

        Mail::to('huuquangbk151@gmail.com')
            ->send( new UserContact($data));
        
        return redirect()->route('home');
    }
}
