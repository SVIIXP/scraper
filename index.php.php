<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.google.com/search?tbm=map&authuser=0&hl=en&gl=br&pb=!4m12!1m3!1d11754.531472570852!2d-42.561492271391366!3d-19.479263019507737!2m3!1f0!2f0!3f0!3m2!1i1319!2i150!4f13.1!7i20!10b1!12m8!1m1!18b1!2m3!5m1!6e2!20e3!10b1!16b1!19m4!2m3!1i360!2i120!4i8!20m65!2m2!1i203!2i100!3m2!2i4!5b1!6m6!1m2!1i86!2i86!1m2!1i408!2i240!7m50!1m3!1e1!2b0!3e3!1m3!1e2!2b1!3e2!1m3!1e2!2b0!3e3!1m3!1e3!2b0!3e3!1m3!1e8!2b0!3e3!1m3!1e3!2b1!3e2!1m3!1e10!2b0!3e3!1m3!1e10!2b1!3e2!1m3!1e9!2b1!3e2!1m3!1e10!2b0!3e3!1m3!1e10!2b1!3e2!1m3!1e10!2b0!3e4!2b1!4b1!9b0!22m6!1sZ-dTYK75IZO85OUP08mYqAE%3A2!2zMWk6Myx0OjExODg3LGU6MixwOlotZFRZSzc1SVpPODVPVVAwOG1ZcUFFOjI!7e81!12e3!17sZ-dTYK75IZO85OUP08mYqAE%3A560!18e15!24m54!1m16!13m7!2b1!3b1!4b1!6i1!8b1!9b1!20b0!18m7!3b1!4b1!5b1!6b1!9b1!13b0!14b0!2b1!5m5!2b1!3b1!5b1!6b1!7b1!10m1!8e3!14m1!3b1!17b1!20m2!1e3!1e6!24b1!25b1!26b1!29b1!30m1!2b1!36b1!43b1!52b1!54m1!1b1!55b1!56m2!1b1!3b1!65m5!3m4!1m3!1m2!1i224!2i298!89b1!26m4!2m3!1i80!2i92!4i8!30m0!34m16!2b1!3b1!4b1!6b1!8m4!1b1!3b1!4b1!6b1!9b1!12b1!14b1!20b1!23b1!25b1!26b1!37m1!1e81!42b1!47m0!49m1!3b1!50m4!2e2!3m2!1b1!3b1!65m0!69i546&q=pet%20shop",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET"
));

$response = curl_exec($curl);

curl_close($curl);

$response = substr($response,4,-1);
$response = str_replace("null,",'"",',$response);
$data = json_decode($response,1);
$arr = [];
if(isset($data[0][1])) {
	foreach($data[0][1] as $single) {
		if(isset($single[14])) {
			$restaurant = $single[14];
			$temparr = [];
					if(isset($restaurant[11]))
			$temparr['name'] = $restaurant[11];
					if(isset($restaurant[18]))
			$temparr['location'] = $restaurant[18];
			if(isset($restaurant[178][0][0]))
			$temparr['phone'] = $restaurant[178][0][0];
			$arr[] = $temparr;
		}
	}

}
echo "<pre>";
print_r( $arr );
echo "</pre>";