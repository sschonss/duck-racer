<?php
namespace App\Http\Controllers;
use App\Models\Race; use Illuminate\Http\Request; use Illuminate\Support\Str;
class RaceController extends Controller {
 public function home(){return view('dashboard');}
 public function joinPage(string $code){return view('join',['code'=>$code]);}
 public function create(){ $race=Race::create(['code'=>strtoupper(Str::random(6)),'names'=>[]]); return response()->json($race); }
 public function show(Race $race){return response()->json($race);}
 public function join(Request $request,Race $race){$data=$request->validate(['name'=>'required|string|max:120']);$names=array_values(array_unique(array_merge($race->names??[],[$data['name']])));$race->update(['names'=>$names]);return response()->json($race);}
 public function start(Race $race){$names=$race->names??[];shuffle($names);$results=array_map(fn($name,$i)=>['name'=>$name,'position'=>$i+1],$names,array_keys($names));$race->update(['status'=>'finished','results'=>$results]);return response()->json($race);}
 public function import(Request $request,Race $race){$data=$request->validate(['names'=>'required|array']);$names=array_values(array_unique(array_merge($race->names??[],$data['names'])));$race->update(['names'=>$names]);return response()->json($race);}
}
