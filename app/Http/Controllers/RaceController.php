<?php
namespace App\Http\Controllers;
use App\Models\Race; use Illuminate\Http\Request; use Illuminate\Support\Str;
class RaceController extends Controller {
 public function home(){return view('dashboard');}
 public function joinPage(string $code){return view('join',['code'=>$code]);}
 public function create(){ $race=Race::create(['code'=>strtoupper(Str::random(6)),'names'=>[]]); return response()->json($race); }
 public function show(Race $race){return response()->json($race);}
 public function join(Request $request,Race $race){$data=$request->validate(['name'=>'required|string|max:120','session'=>'required|string|max:100']);$sessions=$race->sessions??[];if(in_array($data['session'],array_column($sessions,'session'),true)){return response()->json(['message'=>'Este celular já fez uma inscrição nesta sala.'],409);}foreach($race->names??[] as $name){if(mb_strtolower($name)===mb_strtolower(trim($data['name']))){return response()->json(['message'=>'Este nome já está na corrida.'],409);}}$sessions[]=['session'=>$data['session'],'name'=>trim($data['name'])];$names=array_values(array_merge($race->names??[],[trim($data['name'])]));$race->update(['names'=>$names,'sessions'=>$sessions]);return response()->json($race);}
 public function start(Race $race){$names=$race->names??[];shuffle($names);$results=array_map(fn($name,$i)=>['name'=>$name,'position'=>$i+1],$names,array_keys($names));$race->update(['status'=>'finished','results'=>$results]);return response()->json($race);}
 public function import(Request $request,Race $race){$data=$request->validate(['names'=>'required|array']);$names=array_values(array_unique(array_merge($race->names??[],$data['names'])));$race->update(['names'=>$names]);return response()->json($race);}
}
