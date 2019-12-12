<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use Validator;
class ProductController extends Controller
{
    
    public function index()
    {
        return view('client.products.shop');
    }

    public function detail($slug_product){
        $product = Product::where('slug',$slug_product)->with(['galleries', 'variants' => function ($query) {
                $query->with('value', 'attribute');
        }])->first();
      
        if (!$product) {
            abort(404);
        }
        if (count($product->variants) > 0 && !empty($product->variants)) {
            $json_product = json_encode($product->variants->toArray());
        }else{
            $json_product = null;
        }
        
        $cate_id = $product->categories[0]->id;
        // dd($cate_id);
        $products_relate = Product::select('products.*')->with(['galleries', 'variants' => function ($query) {
                                                $query->with('value', 'attribute');
                                    }])->limit(10)->get();
    
        // dd($products_relate);
        $comments = Comment::where(['status' => 1,'product_id' => $product->id] )->orderBy('created_at','desc')->limit(5)->get();
        return view('client.product-details',compact('product', 'json_product','comments','products_relate'));
    }

    public function send_comment(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'star' => 'required',
                'content' => 'required',
            ],
            [
                'star.required' => 'Vui lòng chọn số sao !',
                'content.required' => 'Vui lòng điền nội dung !',
            ]
        );

        if ($validator->fails()) {
            return response([
                'errors' => true,
                'messages' => $validator->errors(),
            ]);
        }else{
            Comment::insert([
                'rate_star' => $request->star,
                'content' => $request->content,
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'status' => 1,
                'created_at' => date('Y/m/d H:i:s'),
            ]);
            return response([
                'errors' => false,
                'messages' => 'Thành công',
            ]);
        }
    }

    public function load_more_comment(Request $request){
        // echo ($request->total_current);
        $comments = Comment::where(['status' => 1,'product_id' => $request->product_id] )
        ->orderBy('created_at','desc')
        ->skip($request->total_current)
        ->take(5)
        ->get();
        ob_start();
        foreach ($comments as $item) {
            ?>
            <div class="single-review">
                <div class="review-img">
            
                    <img style="width:100%"
                        src="<?php echo !empty($item->user->avatar)  ? $item->user->avatar : asset('client/img/user-default.jpg')?> " alt="">
                </div>
                <div class="review-content" style="width: 100%;">
                    <div class="review-top-wrap">
                        <div class="review-left">
                            <div class="review-name">
                                <h4><?php echo $item->user->email ?></h4>
                            </div>
                            <div class="review-rating">
                                <?php
                                for($i = 0 ; $i <= $item->rate_star ; $i++):
                                    ?>
                                    <i class="fa fa-star"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="pull-right">
                            <a><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() ?></a>
                        </div>
                    </div>
                    <div class="review-bottom">
                        <p>
                            <?php echo $item->content ?>.
                        </p>                        
                    </div>
                </div>
            </div>
            <?php
        }
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
    }
}

    
