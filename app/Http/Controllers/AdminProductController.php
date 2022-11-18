<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Size;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    private $color;
    private $size;
    public function __construct(Category $category, Product $product, ProductImage $productImage,
                                Tag $tag, ProductTag $productTag, Color $color, Size $size)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
        $this->color = $color;
        $this->size = $size;
    }
    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->recusive($parent_id); // nhan gia tri tu ham recusive
        return $htmlOption;
    }


    public function create()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        $colors = $this-> color->get();
        $sizes = $this->size->get();
        return view('admin.product.add', compact('htmlOption', 'colors', 'sizes'));
    }

    public function store(ProductAddRequest $request) {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => Auth::id(),
                'category_id' => $request->category_id,
    
            ];
    
            $dataUplaodFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            
            if(!empty($dataUplaodFeatureImage))
            {
                $dataProductCreate['feature_image_name'] = $dataUplaodFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUplaodFeatureImage['file_path'];
            }
    
            $product = $this->product->create($dataProductCreate);
    
            //insert data to product_images
            if($request->hasFile('image_path'))
            
            {
                foreach($request->image_path as $fileItem)
                {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
    
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['image_path'],
                        'image_name' => $dataProductImageDetail['image_name'],
                    ]);
                    
                    // $this->productImage->create([
                    //     'product_id' => $product->id,
                    //     'image_path' => $dataProductImageDetail['image_path'],
                    //     'image_name' => $dataProductImageDetail['image_name'],
                    // ]);
                }
            }

            //insert colors to colors
            if(!empty($request->product_colors))
            {
                $product->colors()->attach($request->product_colors);
            }

            //insert sizes to product_sizes
            if(!empty($request->product_sizes))
            {
                $product->sizes()->attach($request->product_sizes);
            }
    
            //insert tags to product_tags
            if(!empty($request->tags))
            {
                    foreach($request->tags as $tagItem)
                {
                    //insert to tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
        
                    // $this->productTag->create([
                    //     'product_id' => $product->id,
                    //     'tag_id' => $tagInstance->id
                    // ]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();

            return redirect()->route('products.index');
          
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Message: ".$th->getMessage()."---Line".$th->getLine());
        }    
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $colorsChecked = $product->colors;
        $sizesChecked = $product->sizes;
        $colors = $this-> color->get();
        $sizes = $this->size->get();
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product', 'colorsChecked', 'colors', 'sizes', 'sizesChecked'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => Auth::id(),
                'category_id' => $request->category_id,
    
            ];
    
            $dataUplaodFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if(!empty($dataUplaodFeatureImage))
            {
                $dataProductCreate['feature_image_name'] = $dataUplaodFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUplaodFeatureImage['file_path'];
            }
    
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            //update colors to colors
            if(!empty($request->product_colors))
            {
                $product->colors()->sync($request->product_colors);
            }

            //update sizes to product_sizes
            if(!empty($request->product_sizes))
            {
                $product->sizes()->sync($request->product_sizes);
            }
    
            //insert data to product_images
            if($request->hasFile('image_path'))
            {
                $this->productImage->where('product_id', $id)->delete();
                foreach($request->image_path as $fileItem)
                {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
    
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['image_path'],
                        'image_name' => $dataProductImageDetail['image_name'],
                    ]);
                    
                    // $this->productImage->create([
                    //     'product_id' => $product->id,
                    //     'image_path' => $dataProductImageDetail['image_path'],
                    //     'image_name' => $dataProductImageDetail['image_name'],
                    // ]);
                }
            }
    
            //insert tags to product_tags
            if(!empty($request->tags))
            {
                    foreach($request->tags as $tagItem)
                {
                    //insert to tag
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
        
                    // $this->productTag->create([
                    //     'product_id' => $product->id,
                    //     'tag_id' => $tagInstance->id
                    // ]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();

            return redirect()->route('products.index');
          
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Message: ".$th->getMessage()."---Line".$th->getLine());
        }
    }

    public function delete($id) 
    {
        
        try {
            $this->product->find($id)->delete();
            $this->productImage->where('product_id', $id)->delete();
            // return response()->json([
            //     'code' => 200,
            //     'message' => 'success'
            // ], status: 200);
        } catch (\Throwable $th) {
            Log::error("Message: ".$th->getMessage()."---Line".$th->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], status: 500);
        }
        return redirect()->route('products.index');
    }
}
