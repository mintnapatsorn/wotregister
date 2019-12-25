     public function renewreclamtoken(){

        //generate uuid v4
        $uuidBin = random_bytes(16);
        $uuidBin &= "\xFF\xFF\xFF\xFF\xFF\xFF\x0F\xFF\x3F\xFF\xFF\xFF\xFF\xFF\xFF\xFF";
        $uuidBin |= "\x00\x00\x00\x00\x00\x00\x40\x00\x80\x00\x00\x00\x00\x00\x00\x00";
        $uuidHex = bin2hex($uuidBin); //result of uuid generate token

        $arruuid = str_split($uuidHex);
        $generatetoken = $arruuid[0].$arruuid[1].$arruuid[2].$arruuid[3].$arruuid[4].$arruuid[5].$arruuid[6].$arruuid[7]."-".$arruuid[8].$arruuid[9].$arruuid[10].$arruuid[11]."-".$arruuid[12].$arruuid[13].$arruuid[14].$arruuid[15]."-".$arruuid[16].$arruuid[17].$arruuid[18].$arruuid[19]."-".$arruuid[20].$arruuid[21].$arruuid[22].$arruuid[23].$arruuid[24].$arruuid[25].$arruuid[26].$arruuid[27].$arruuid[28].$arruuid[29].$arruuid[30].$arruuid[31];

        $requestId  = Input::get('requestId') ;
        DB::table('domains')->where('id',$requestId)->update(['reclamation_token'=>$generatetoken]);

        $notification = array('message' => $requestId , 'alert-type'=>'error');
        // return back()->with($notification);
        return response()->json([
            'token' => $generatetoken,
            'domain' => $requestId
        ])

    }