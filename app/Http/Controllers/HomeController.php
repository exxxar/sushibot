<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    public function searchAjax(Request $request)
    {
        $vowels = array("(", ")", "-", " ");
        $tmp_phone = $request->get("query");
        $tmp_phone = str_replace($vowels, "", $tmp_phone);
        return User::where('phone', 'like', '%' . $tmp_phone . '%')->get();
    }
    public function search(Request $request)
    {
        $vowels = array("(", ")", "-", " ");
        $tmp_phone = $request->get("phone");
        $tmp_phone = str_replace($vowels, "", $tmp_phone);
        $user = User::where("phone", $tmp_phone)->first();
        if ($user)
            return redirect()
                ->route("users.show", $user->id);
        return back()
            ->with("success", "Пользователь не найден!");
    }
}
