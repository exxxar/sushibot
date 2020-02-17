<?php

namespace App\Http\Controllers;

use App\User;
use ATehnix\VkClient\Auth;
use ATehnix\VkClient\Client;
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
    public function index(Request $request)
    {
        $auth = new Auth('6803875', 'l1rMo05qkLGM8BSh5KbQ', 'http://isushi.herokuapp.com/admin');

        $token = null;

        if ($request->has("code")){
            $token = $auth->getToken($request->get('code'));

            $api = new Client;
            $api->setDefaultToken($token);

            $response = $api->request('market.getAlbums', [
                'owner_id' => -142695628,
                'count'=>50
            ]);

            dd($response);

        }

        return view('home',compact("auth","token"));
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
