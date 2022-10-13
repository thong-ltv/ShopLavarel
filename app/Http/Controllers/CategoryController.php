<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create()
    {
        //chu y: tat ca su dung huong doi tuong
        // dd('created'); hien chu len man hinh
        // return view('category.add'); //return ve mot view

        // $data = Category::all();  //lay du lieu tu model Category (hay bang categories khi tao model Category) return array()
        // // $data = Category::get();  co the dung get thay all

        // foreach($data as $value)
        // {
        //     if($value['parent_id'] == 0)
        //     {
        //         echo "<option>".$value['name']."</option>";

        //         foreach($data as $value1)
        //         {
        //             if($value1['parent_id'] == $value['id'])
        //             {
        //                 echo "<option>".$value1['name']."</option>";

        //                 foreach($data as $value2)
        //         {
        //                     if($value2['parent_id'] == $value1['id'])
        //                     {
        //                         echo "<option>".$value2['name']."</option>";
        //                     }
        //         }
        //             }
        //         }
        //     }
        // }
        $htmlOption = $this->getCategory($parent_id = '');

        return view('admin.category.add', compact('htmlOption'));  // tra ve view add va truyen theo chuoi htmlOption


    }

    //tao function recusive (de quy trong danh muc)
    // public function recusive($id, $text = '')
    // {
    //     $data = Category::all();
    //     foreach($data as $value)
    //     {
    //         if($value['parent_id'] == $id)
    //         {
    //             // echo "<option>".$text.$value['name']."</option>";// trong thuc te khong nen dung echo
    //             $this->htmlSelect .= "<option>".$text.$value['name']."</option>";
    //             $this->recusive($value['id'], $text. '-');
    //         }
    //     } 
        
    //     return $this->htmlSelect;  //tra ve chuoi htmlSelect
    // }

    public function index()
    {
        // dd('created'); hien chu len man hinh
        $categories = $this->category->latest()->paginate(3);  //tro den model category (category), lay nhung san pham moi dua vao (latest), moi trang 5 sp (paginate)
        return view('admin.category.index', compact('categories')); //return ve mot view   compact laf truyen bien di
    }

    // insert danh muc vao data
    public function store(Request $request)
    {
        $this->category->create([  //ham create de insert du lieu
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-') //slug dung de chuyen string thanh slug
        ]);

        return redirect()->route('catogories.index');
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->recusive($parent_id); // nhan gia tri tu ham recusive
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);  //tra ve mang object cac doi tuong
        $parent_id = $category->parent_id;
        $htmlOption = $this->getCategory($parent_id);
        return view('admin.category.edit', compact('htmlOption', 'category'));
    }

    public function update(Request $request, $id)
    {
        $this->category->find($id)->update([  //ham create de insert du lieu
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-') //slug dung de chuyen string thanh slug
        ]);

        return redirect()->route('catogories.index');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();

        return redirect()->route('catogories.index');
    }
}
