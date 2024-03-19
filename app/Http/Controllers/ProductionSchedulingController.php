<?php

namespace App\Http\Controllers;

use App\Models\BorangSerahKerjaKulit;
use App\Models\BorangSerahKerjaTeks;
use App\Models\CoverAndEndpaper;
use App\Models\DigitalPrinting;
use App\Models\MesinKnife;
use App\Models\MesinLipat;
use App\Models\PerfectBind;
use App\Models\StapleBind;
use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductionSchedulingController extends Controller
{
    public function index(){
        if (!Auth::user()->hasPermissionTo('PRODUCTION SCHEDULING View')) {
            return back()->with('custom_errors', 'You don`t have Right Permission');
        }
        $data = [];

        $digital_printing = DigitalPrinting::select('date')->get()->toArray();
        $cover_end_paper = CoverAndEndpaper::select('date')->get()->toArray();
        $text = Text::select('date')->get()->toArray();
        $mesin_lipat = MesinLipat::select('date')->get()->toArray();
        $staple_bind = StapleBind::select('date')->get()->toArray();
        $perfect_bind = PerfectBind::select('date')->get()->toArray();
        $mesin_knife = MesinKnife::select('date')->get()->toArray();
        $kulit_buku = BorangSerahKerjaKulit::select('date')->get()->toArray();
        $teks = BorangSerahKerjaTeks::select('date')->get()->toArray();

        $data = array_merge($digital_printing, $cover_end_paper, $text, $mesin_lipat, $staple_bind, $perfect_bind, $mesin_knife, $kulit_buku, $teks);
        $data = array_unique($data, SORT_REGULAR);
        return view('Production.ProductionScheduling.index', compact('data'));
    }

    public function detail(Request $request){
        $digital_printing = DigitalPrinting::where('date', '=', $request->date)->with('sale_order')->get()->toArray();
        $cover_end_paper = CoverAndEndpaper::where('date', '=', $request->date)->with('sale_order')->get()->toArray();
        $text = Text::where('date', '=', $request->date)->with('sale_order')->get()->toArray();
        $mesin_lipat = MesinLipat::where('date', '=', $request->date)->with('sale_order')->get()->toArray();
        $staple_bind = StapleBind::where('date', '=', $request->date)->with('sale_order')->get()->toArray();
        $perfect_bind = PerfectBind::where('date', '=', $request->date)->with('sale_order')->get()->toArray();
        $mesin_knife = MesinKnife::where('date', '=', $request->date)->with('sale_order')->get()->toArray();
        $kulit_buku = BorangSerahKerjaKulit::where('date', '=', $request->date)->with('sale_order')->get()->toArray();
        $teks = BorangSerahKerjaTeks::where('date', '=', $request->date)->with('sale_order')->get()->toArray();
        $detail = [
            'DigitalPrinting' => $digital_printing,
            'CoverEndPaper' => $cover_end_paper,
            'Text' => $text,
            'MesinLipat' => $mesin_lipat,
            'StapleBind' => $staple_bind,
            'MesinPerfectBind' => $perfect_bind,
            'Mesin3Knife' => $mesin_knife,
            'KulitBuku' => $kulit_buku,
            'Teks' => $teks,
        ];
        return response()->json($detail);
    }
}
