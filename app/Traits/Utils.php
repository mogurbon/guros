<?php
namespace App\Traits;

trait Utils {
    public function mutations($array){
        $num = count($array);
        $totcont = 0;
        $rowcont = 0;


        $nueva = [];
        for ($i =0; $i < $num; $i++){
            for($j =0; $j < $num; $j++){
                if ($j > 0){
                    if ( $rowcont == 3 ){
                        $totcont++;
                        $rowcont=0;
                    }
                    if ($array[$i][$j] == $array[$i][$j-1]){
                        $rowcont++;
                    }
                    else{
                        $rowcont=0;
                    }

                }

                $nueva[$i][$j] =$array[$j][$i];

            }
            $rowcont=0;

        }

        $rowcont=0;

        for ($i =0, $num = count($nueva); $i < $num; $i++){
            for($j =0; $j < $num; $j++){
                if ($j > 0){
                    if ( $rowcont == 3 ){
                        $totcont++;
                        $rowcont=0;
                    }
                    if ($nueva[$i][$j] == $nueva[$i][$j-1]){
                        $rowcont++;
                    }
                    else{
                        $rowcont=0;
                    }

                }
            }
            $rowcont=0;


        }
        return $totcont;
    }
}
