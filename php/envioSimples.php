<?php
/*
Envio simples
Formatos indicados para utilizar em phone
1) ddd+numero
Exemplo
0119XXXXYYYY

2) +ddi+ddd+número
Exemplo
+55119XXXXYYYY

*/

$api_key="tokenv1 wsAcq... ";  // Chave esta em sua conta do astandes na opção Perfil
$device_id="54...ece955...";   // Ao criar um novo device o sistema vai gerar uma chave. Depois de vincular o device utilize o id para enviar sms por ele.
$dst="011911112222";           // Número do destino. Utilize um dos seguntes formatos 1 ou 2
$msg="Mensagem... ";           // Utilizar no máximo 160 caracteres


          $data='{ "device": "'.$device_id.'",  "phone": "'.$dst.'",  "text": "'.$msg.'" }';



          $header_data= array("Content-Type: application/json","Authorization:  $api_key");
          $url ='https://astandes.com.br/api/v1/message';
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL , $url );
          curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
          curl_setopt($ch, CURLOPT_TIMEOUT , 60);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_USERAGENT , "" );
          curl_setopt($ch, CURLOPT_HTTPHEADER, $header_data );
          curl_setopt($ch, CURLOPT_POST , 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS , $data );

          $return = curl_exec($ch);


          if (curl_errno($ch)) {
                  print curl_error($ch);
          }else{
		echo $return;
	  }
          curl_close($ch);

?>
