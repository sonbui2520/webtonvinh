<?php

namespace App\Http\Controllers;

use App\Imports\IPexceltonvinh1;
use App\Traits\kiemduyet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class UserController extends Controller
{
    use kiemduyet;

    public function index()
    {
        if(!Session::get("user"))
        {
            return redirect()->route("taikhoan.login");

        }
        return view("page.index");
    }
    public function index_taikhoan()
    {
        if(!Session::get("user"))
        {
            return redirect()->route("taikhoan.login");

        }
        $users=User::paginate(10);
        return view('page.taikhoan',compact('users'));
    }

    public function getbyid($id)
    {
        $users=User::find($id);
        return response()->json($users);
    }
    public function delete($id)
    {
        $user = User::find($id);
       $user ->delete();
       return redirect()->route("taikhoan.index");
    }
    public function edit(Request $request)
    {
        $user=User::find($request->id);
        $user->Hoten=$request->Hoten;
        $user->sdt=$request->sdt;
        $user->email=$request->email;
        $user->save();
        return response()->json($user);

    }
    #region sơn đăng nhập
    public function login()
    {

        return view("dangnhap");
    }

    public function xulilogin(Request $request)
    {
        //$2y$10$RE9F8MHAPN4SD6i12r09xuPyHbnH3BHImemfHY5mwLyrj5l9JG3w.
        $username = $request-> username;
        $password =$request -> password;
        $user = DB::table('users')->where('tentk', $username) ->where('matkhau', $password )-> get();
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        // die();
        if(count($user)==0)
        {
            $err = "Tên đăng nhập hoặc mật khẩu không đúng!";
            return Redirect()->route('taikhoan.login',['err'=>$err]);
        }
        else{
            Session::put('user', $user);
            return Redirect()->route('trangchu');
        }

    }
    public function dangxuat()
    {
        Session::flush(); // xóa seesion;
        return Redirect()->route('taikhoan.login');
    }
       #endregion

    // tuowngf
    public function show_register()
    {
        return view('taotaikhoan');
    }
    public function store(Request $request){
        $users = DB::table('users')->where('email',$request->email)->first();//first để lấy ra dòng đầu tiên
        if(!$users){
            $newUser = new User();
            $newUser -> tentk = $request->tentk;
            $newUser -> email  = $request->email;
            $newUser -> matkhau = $request->matkhau;
            $newUser -> Hoten = $request->Hoten;
            $newUser -> sdt = $request->sdt;
            $newUser -> Quyen = 0;
            $newUser -> save();
            return redirect()-> route('taikhoan.index');
        }else
        {
            return redirect()-> route('page.show_register') -> with('message','Tài khoản đã tồn tại, Mời bạn đăng nhập');
        }
    }

    public function test()
    {
        $id_vung=1;
        $id_dot=1;
        $ds= $this->truyvanvungdot($id_dot,$id_vung);
        $data=$this->formatdatatonvinh($ds);
        $html=$this->htmltonvinh($data);

        echo "<pre>";
        print_r($ds);
        echo "</pre>";
        // return response()->json(['html'=>$html]);
    }
    public function quenmatkhau(Request $request)
    {

        $username = $request-> username;
        $passwordNew = $request -> passwordNew;
        $email = $request -> email;
        $user = DB::table('users')->where('tentk', $username) ->where('email', $email )-> get();
        if (count($user)!=0)
            {
                 $user = DB::table('users')->where('tentk', $username)->update(['matkhau'=>$passwordNew]);
                echo '<script language="javascript">alert("Đổi Mật Khẩu thành công!");</script>';
                return Redirect()->route('taikhoan.login');
            }
       else {
        echo '<script language="javascript">alert("Tên Đăng Nhập hoặc Email Không tồn tại!");</script>';
        return Redirect()->route('quenmatkhau');
       }
    }
    public function doimatkhau(Request $request)
    {

        $username = $request-> username;
        $password = $request-> password;
        $passwordnew = $request -> passwordnew;
        $user = DB::table('users')->where('tentk', $username) ->where('matkhau', $password) -> get();
        if (count($user)!=0)
            {
                 $user = DB::table('users')->where('tentk', $username)->update(['matkhau'=>$passwordnew]);
                echo '<script language="javascript">alert("Đổi Mật Khẩu thành công!");</script>';
                return Redirect()->route('taikhoan.login');
            }
       else {
        echo '<script language="javascript">alert("Tên Đăng Nhập hoặc Email Không tồn tại!");</script>';
        return Redirect()->route('doimatkhau');
       }
    }
}
