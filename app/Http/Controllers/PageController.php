<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Promo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class PageController extends Controller
{
    public function showRegistration(){
        return view('register');
    }

    public function showLogin(){
        return view('login');
    }

    public function dashboard(){
        $userAmount = DB::table('users')->where('role', '=', 2)->get()->count();
        $promoAmount = DB::table('promo')->get()->count();

        return view('backOffice.index', compact('userAmount', 'promoAmount'));
    }

    public function showScrape(){
        return view('backOffice.scrapeOption');
    }

    public function showPromo(){
        $promoData = DB::table('promo')
            ->join('website', 'website.id', '=', 'promo.id_website')
            ->select('website.name as webName', 'promo.id', 'promo.name', 'promo.end_date')
            ->get();
        return view('backOffice.listPromo', compact('promoData'));
    }

    public function showAkun(){
        $userData = DB::table('users')->where('role', '=', 2)->get();
        return view('backOffice.listAkun', compact('userData'));
    }

    public function verif(){
        return view('mail.verify');
    }

    public function index(){
        $promoData = DB::table('promo')->where('category', 'LIKE', '%flight%')->limit(7)->get();
        $promoDiscount = DB::table('promo')->where('discount', '!=', '')->limit(7)->get();
        $transportPromo = DB::table('promo')->where('category', 'LIKE', '%akomodasi%')->limit(7)->get();
        return view('frontOffice.index', compact('promoData', 'promoDiscount', 'transportPromo'));
    }

    public function searchResult(Request $request){
        $valMsg = $_GET['search'];
        $promoData = DB::table('promo')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(16);

        return view('frontOffice.searchResult', compact('promoData'), compact('valMsg'));
    }

    public function searchBasedOn($val){
        if ($val == 'mostRecent'){
            $promoData = DB::table('promo')->paginate(16);
            $valMsg = 'Promo Terbaru';
        }elseif ($val == 'neverEnd'){
            $promoData = DB::table('promo')->where('end_date', '=', '')->orWhereNull('end_date')->paginate(16);
            $valMsg = 'Promo yang belum ditentukan berakhirnya';
        }elseif ($val == 'flight'){
            $promoData = DB::table('promo')->where('category', '=', 'flight')->paginate(16);
            $valMsg = 'Promo Penerbangan';
        }elseif ($val == 'hotel'){
            $promoData = DB::table('promo')->where('category', '=',  'hotel')->paginate(16);
            $valMsg = 'Promo Hotel';
        }elseif ($val == 'flight hotel'){
            $promoData = DB::table('promo')->where('category', 'LIKE', '%' . $val . '%')->paginate(16);
            $valMsg = "Promo Penerbangan + Hotel";
        }elseif ($val == 'health') {
            $promoData = DB::table('promo')->where('category', 'LIKE', '%' . $val . '%')->paginate(16);
            $valMsg = 'Promo Layanan Kesehatan';
        }elseif ($val == 'akomodasi') {
            $promoData = DB::table('promo')->where('category', 'LIKE', '%' . $val . '%')->paginate(16);
            $valMsg = 'Promo Transportasi';
        }elseif ($val == 'discount') {
            $promoData = DB::table('promo')->where('discount', '!=', '')->paginate(16);
            $valMsg = 'Promo Berdasarkan Potongan Harga';
        }elseif ($val == 'pegipegi') {
            $promoData = DB::table('promo')->where('id_website', '=', 1)->paginate(16);
            $valMsg = 'Pegipegi';
        }elseif ($val == 'tiket') {
            $promoData = DB::table('promo')->where('id_website', '=', 2)->paginate(16);
            $valMsg = 'tiket.com';
        }elseif ($val == 'traveloka') {
            $promoData = DB::table('promo')->where('id_website', '=', 3)->paginate(16);
            $valMsg = 'Traveloka';
        }elseif ($val == 'airpaz') {
            $promoData = DB::table('promo')->where('id_website', '=', 4)->paginate(16);
            $valMsg = 'Airpaz';
        }elseif ($val == 'nusa') {
            $promoData = DB::table('promo')->where('id_website', '=', 5)->paginate(16);
            $valMsg = 'NusaTrip';
        }elseif ($val == 'garuda') {
            $promoData = DB::table('promo')->where('id_website', '=', 6)->paginate(16);
            $valMsg = 'Garuda Indonesia';
        }elseif ($val == 'citi') {
            $promoData = DB::table('promo')->where('id_website', '=', 7)->paginate(16);
            $valMsg = 'Citilink';
        }elseif ($val == 'percentage') {
            $promoData = DB::table('promo')->where('discount', 'LIKE', '%\%%')->paginate(16);
            $valMsg = 'Promo dengan potongan persentase';
        }elseif ($val == 'priceCut') {
            $promoData = DB::table('promo')->where('discount', 'NOT LIKE', '%\%%')->where('discount', '!=', '')->paginate(16);
            $valMsg = 'Promo dengan kisaran potongan harga';
        }elseif ($val == 'car') {
            $promoData = DB::table('promo')->where('maskapai', 'LIKE', '%car%')->paginate(16);
            $valMsg = 'Akomodasi Mobil';
        }elseif ($val == 'train') {
            $promoData = DB::table('promo')->where('maskapai', 'LIKE', '%train%')->paginate(16);
            $valMsg = 'Akomodasi Kereta Api';
        }elseif ($val == 'jemput') {
            $promoData = DB::table('promo')->where('maskapai', 'LIKE', '%jemput%')->paginate(16);
            $valMsg = 'Akomodasi Transportasi Bandara';
        }

        return view('frontOffice.searchResult', compact('promoData'), compact('valMsg'));
    }

    public function loginProcess(Request $request){
        $data = DB::table('users')->where('email', $request->email)->where('password', $request->password)->first();

        if ($data){
            if ($data->status != 1){
                return redirect('/login')->with('error', 'Please activate your account through email that we had sent.');
            }
            $request->session()->put('name', $data->fullname);
            $request->session()->put('role', $data->role);
            $request->session()->put('id', $data->id);

            if ($data->role == 1){
                return redirect('/dashboard');
            }else{
                return redirect('/');
            }
        }

        return redirect('/login')->with('error', 'Username or Password incorrect');
    }

    public function promoUser($val){
        if ($val == 'index'){
            $promoData = DB::table('promo')->paginate(16);
        }elseif ($val == 'traveloka'){
            $promoData = DB::table('promo')->where('id_website', '=', 3)->paginate(16);
        }elseif ($val == 'pegipegi'){
            $promoData = DB::table('promo')->where('id_website', '=', 1)->paginate(16);
        }elseif ($val == 'tiket'){
            $promoData = DB::table('promo')->where('id_website', '=', 2)->paginate(16);
        }elseif ($val == 'airpaz'){
            $promoData = DB::table('promo')->where('id_website', '=', 4)->paginate(16);
        }elseif ($val == 'nusa'){
            $promoData = DB::table('promo')->where('id_website', '=', 5)->paginate(16);
        }elseif ($val == 'garuda'){
            $promoData = DB::table('promo')->where('id_website', '=', 6)->paginate(16);
        }elseif ($val == 'citi'){
            $promoData = DB::table('promo')->where('id_website', '=', 7)->paginate(16);
        }
        $savedData = DB::table('saved')->where('id_user', '=', Session::get('id'));

        return view('frontOffice.promo', compact('promoData', 'savedData'));
    }

    public function savedPromo(){
        $promoData = DB::table('promo')->join('saved', 'promo.id', '=', 'saved.id_promo')->where('id_user', '=', Session::get('id'))->paginate(16);

        return view('frontOffice.saved', compact('promoData'));
    }

    public function logoutProcess(){
        Auth::logout();
        Session::flush();
        session_unset();
        return redirect('/');
    }
}
