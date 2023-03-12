<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Food;
use Auth;
use Illuminate\Http\Request;
use App\Http\Resources\FoodResource;
use Collection;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = [
            'frequency' => 1, // tần xuất hoạt động
            'gender' => 'male', // giới tính nam
            'status' => 'increase', // tình trạng tăng cân hay giảm cân
            'weight' => 50, // cân nặng
            'height' => 160, // chiều cao
            'age' => 21 // độ tuổi
        ];
        //return tinhCalo($user);
        $lstFood = Food::all()->random(5);
        return FoodResource::collection($lstFood);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::guard('customer')->user();
        $flag = true;
        $foods = collect();
        $foodResult = [];
        $age = $user->getAge();
        while ($flag) {
            $checkOut = true;
            $foods = Food::all()->random(4);
            $userInfo = [
                'frequency' => $user->customer_active, // tần xuất hoạt động
                'gender' => $user->customer_gender, // giới tính nam
                'status' => $user->customer_target, // tình trạng tăng cân hay giảm cân
                'weight' => $user->customer_weight, // cân nặng
                'height' => $user->customer_height, // chiều cao
                'age' => $age, // độ tuổi,
                'num_food' => 3 // Số lượng thực phẩm
            ];
            $result = tinhDuaRaSoLuong($userInfo,$foods);
            $foodResult = [];
            foreach ($result['result'] as $patu) {
                if($patu['value'] <= sizeof($foods)){
                    if($patu['pa'] > 100){
                        $flag = true;
                        $checkOut = false;
                        break;
                    }
                    $foodResult[$patu['value']-1] = $patu['pa'];
                }
            }
            if($checkOut){
                $flag = false;
            }
        }
        return [
            'foods' => FoodResource::collection($foods),
            'result' => $foodResult
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
