<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Utils;
use App\Models\Mutations;
use Illuminate\Support\Facades\DB;

class MutationController extends Controller
{
    use Utils;
    public function index(Request $request){

        $array = $request->input('dna');

        $totcont = $this->mutations($array);
        $mutation = new Mutations();


        if ($totcont >=2 ){
            response()->json(['Mutation'=> true]);
            $mutation->count_mutations = 1;
            $mutation->save();
        }else{
            $mutation->count_no_mutations = 1;
            $mutation->save();
            abort(403);


        }

    }
    public function getMutationNum(){
        $total_mutations = DB::table('mutations')->count();
        if ($total_mutations > 0){#previniendo que haya datos
            $mutations = DB::table('mutations')->sum('count_mutations');
            $no_mutations = DB::table('mutations')->sum('count_no_mutations');

            if ($mutations == 0){#previniendo la division entre cero
                $ratio = 0;
            }else{
                $ratio = $total_mutations/$mutations;

            }
        }else{
            $mutations = 0;
            $no_mutations = 0;
            $ratio = 0;
        }
        $resp = ['count_mutations' => $mutations, 'count_no_mutations' => $no_mutations, 'ratio' => $ratio];
        return response()->json($resp);
    }
}
