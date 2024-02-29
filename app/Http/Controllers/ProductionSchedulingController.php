<?php

namespace App\Http\Controllers;

use App\Models\BorangSerahKerjaKulit;
use App\Models\CoverAndEndpaper;
use App\Models\DigitalPrinting;
use App\Models\MesinKnife;
use App\Models\MesinLipat;
use App\Models\PerfectBind;
use App\Models\StapleBind;
use App\Models\Text;
use Illuminate\Http\Request;

class ProductionSchedulingController extends Controller
{
    public function index(){
        return view('Production.ProductionScheduling.index');
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
        $detail = [
            'DigitalPrinting' => $digital_printing,
            'CoverEndPaper' => $cover_end_paper,
            'Text' => $text,
            'MesinLipat' => $mesin_lipat,
            'StapleBind' => $staple_bind,
            'MesinPerfectBind' => $perfect_bind,
            'Mesin3Knife' => $mesin_knife,
            'KulitBuku' => $kulit_buku,
        ];
        return response()->json($detail);
    }
}
