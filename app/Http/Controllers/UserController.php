<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Disease;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * Hiển thị danh sách người dùng
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = (new User)->newQuery();
        if($request->name){
            $users = $users->SearchName($request->name);
        }
        $users = $users->paginate(5);
        // Lấy tất cả người dùng trong csdl trừ thằng hiện tại
        //$users = User::where('user_id','<>',Auth::id())->get();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Thêm người dùng mới
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Lấy các
        $diseases = Disease::all();
        return view('admin.user.create',compact('diseases'));
    }

    /**
     * Store a newly created resource in storage.
     * Lưu người dùng vào trong CSDL
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        session()->flash('message','Thêm một người dùng thành công');
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     * Hiển thị tất cả thông tin người dùng
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * Trả về trang hiển thị sửa thông tin người dung
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $diseases = Disease::all();
        return view('admin.user.edit',compact('user','diseases'));
    }

    /**
     * Update the specified resource in storage.
     * Lưu dữ liệu vào trong CSDL
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        session()->flash('message','Sửa một người dùng thành công');
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     * Xóa người dùng theo id ra khỏi csdl
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('message','Xóa một người dùng thành công');
        return redirect()->route('admin.user.index');
    }

    public function deleteMany(Request $request){
        $ckboxs = $request->ckb;
        if(is_array($ckboxs)){
            foreach ($ckboxs as $key => $value) {
                $user = User::findOrFail($value);
                $user->delete();
            }
            session()->flash('message','Xóa người dùng thành công');
            return redirect()->route('admin.user.index');
        }else{
            return back();
        }
    }
}
