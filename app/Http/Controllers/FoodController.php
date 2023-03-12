<?php

namespace App\Http\Controllers;

use App\Food;
use App\FoodCategory;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     * Hiển thị một danh sách của tài nguyên
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $foods = (new Food)->newQuery();
        if($request->name){
            $foods = $foods->SearchName($request->name);
        }
        if($request->category){
            $foods = $foods->SearchCategory($request->category);
        }
        $foodcategories = FoodCategory::all();
        $foods = $foods->paginate(20);
        // Lấy tất cả thực phẩm trong csdl ra
        // Trả về giao diện index
        return view('admin.food.index',compact('foods','foodcategories'));
    }

    /**
     * Show the form for creating a new resource.
     * Hiện thị giao diện tạo một tài nguyên mới
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Lấy thể loại thực phẩm
        $foodcategories = FoodCategory::all();
        // Trả về form tạo thực phẩm kèm theo tất cả cả thể loại foodcategories
        return view('admin.food.create',compact('foodcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Lưu 1 thực phẩm mới vào csdl
        $food = Food::create($request->all());
        // Lưu 1 cái biến tạm thời chứa dữ liệu thống báo, sau đó mất đi
        session()->flash('message','Thêm thực phẩm thành công');
        // Điều hướng tới route
        return redirect()->route('admin.food.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     * Chuyển giao diện tới giao diện sửa thực phẩm
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $foodcategories = FoodCategory::all();
        return view('admin.food.edit',compact('food','foodcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $food->update($request->all());
        session()->flash('message','Sửa thông tin thực phẩm thành công');
        return redirect()->route('admin.food.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        session()->flash('message','Xóa một thực phẩm thành công');
        return redirect()->route('admin.food.index');
    }

    public function createMany(Request $request)
    {
        return view('admin.food.many');
    }

    public function storeMany(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file;
            if($file){
                $result = $file->move('Excel', 'ThucPham' . "." . $file->getClientOriginalExtension());
                $ws = readExcel($result->getPathName());

                $lastRow = $ws->getHighestRow();
                for($i = 2 ; $i < $lastRow ; $i++){
                    $food = Food::create([
                        'food_name' => $ws->getCell('B'.$i)->getValue(),
                        'food_energy' => $ws->getCell('C'.$i)->getValue(),
                        'food_protein' => $ws->getCell('D'.$i)->getValue(),
                        'food_lipid' => $ws->getCell('E'.$i)->getValue(),
                        'food_glucid' => $ws->getCell('F'.$i)->getValue(),
                        'food_price' => $ws->getCell('H'.$i)->getValue(),
                        'food_status' => 1,
                        'food_food_category_id' => $ws->getCell('G'.$i)->getValue()
                    ]);
                }
                return redirect()->route('admin.food.index');
                //return view('admin.food.showmany',compact('ws'));
            }
        }
    }

    public function deleteMany(Request $request){
        $ckboxs = $request->ckb;
        if(is_array($ckboxs)){
            foreach ($ckboxs as $key => $value) {
                $food = Food::findOrFail($value);
                $food->delete();
            }
            session()->flash('message','Xóa thực phẩm thành công');
            return redirect()->route('admin.food.index');
        }else{
            return back();
        }
    }
}
