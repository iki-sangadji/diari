public function hitungDensitas($m){
        
        $hasilAkhir=array();
        for($indexM=0; $indexM< sizeof($m[0]);$indexM++){
            $hasilAkhir[]=$m[0][$indexM];
        }
        
        for($i=1;$i<sizeof($m);$i++){
            $jumlah=array();
            $hasil=$hasilAkhir;
            $pembagi=0;
            for($indexhasil1=0;$indexhasil1<sizeof($hasilAkhir);$indexhasil1++){
                $jumlah[]=0;
            }

            for( $k=0;$k<sizeof($hasil);$k++){
        
                for($j=0;$j<sizeof($m[$i]);$j++){
                    
                       $tempPenyakit2=$this->getIrisan($m[$i][$j]["penyakit"], $hasil[$k]["penyakit"]);
                       $tempDensitas2=$m[$i][$j]["densitas"] * $hasil[$k]["densitas"];
                       
                       if($tempPenyakit2[0]=="&" && (!($m[$i][$j]["penyakit"][0]=="&") 
                            || !($hasil[$k]["penyakit"][0]=="&")) ){
                           $pembagi=$pembagi+$tempDensitas2;
                          
                       }else{
                           $index=$this->getIndex($hasilAkhir, $tempPenyakit2);
                           if($index==-1){
                               $hasilAkhir[]=array("penyakit"=>$tempPenyakit2, "densitas"=>$tempDensitas2);
                               $jumlah[]=$tempDensitas2;
                           } else{
                               $jumlah[$index]=$jumlah[$index] + $tempDensitas2; 
                           }
                       }
                }
             }
             for($l=0;$l<sizeof($hasilAkhir);$l++){
                 $hasilAkhir[$l]["densitas"]=$jumlah[$l]/(1-$pembagi);
             }
        
        }
        return $hasilAkhir;
    }