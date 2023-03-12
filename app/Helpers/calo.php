<?php 
	function getRequest($url){
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Upgrade-Insecure-Requests: 1',
		    'Cookie: flang=vn; _ga=GA1.2.1861778950.1536825121; __atuvc=0%7C44%2C0%7C45%2C0%7C46%2C0%7C47%2C9%7C48; cookingclass2911=1; _gid=GA1.2.518166615.1543417546; _fbp=fb.1.1543417554523.905433317; ASP.NET_SessionId=pww5l521qsxttodhece0cgh1; __RequestVerificationToken=a6txsplhNNSmlH9dwXf5W52l5uVMfzZD0TUY_yoojQpKGon-G49a8L8R1qDRr5roxenyNcfX7Auka-OE3FnScf4mYJqoqSJobL84kn9ErAY1; _gat_UA-50409735-1=1'
		));
	    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36');
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $output = curl_exec($ch);
	    curl_close($ch);
	    return $output;
	}

	function loadDom($html,$query,$flag = false){
		libxml_use_internal_errors(true);
		$dom = new DOMDocument();
		$dom->loadHTML($html);
		$xpath = new DOMXpath($dom);
		$result = $xpath->query($query);
		if($flag)
			return $dom->saveHTML($result->item(0));
		return $result;
	}

	function downFile($url,$fileName){
		$output_filename = $fileName;
	    $host = $url;
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $host);
	    curl_setopt($ch, CURLOPT_VERBOSE, 1);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_AUTOREFERER, false);
	    //curl_setopt($ch, CURLOPT_REFERER, "http://www.xcontest.org");
	    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    // the following lines write the contents to a file in the same directory (provided permissions etc)
	    $fp = fopen($output_filename, 'w');
	    fwrite($fp, $result);
	    fclose($fp);
	}

	function tinhCalo($data)
	{
		$scale = 1.2;
		switch($data['frequency'])
		{
			case 1:
				$scale = 1.2;
				break;
			case 2:
				$scale = 1.375;
				break;
			case 3:
				$scale = 1.55;
				break;
			case 4:
				$scale = 1.725;
				break;
			case 5:
				$scale = 1.9;
				break;
		}
		$caloDu = 0;
		if($data['gender'] == 1)
		{
			if($data['status'] == "reduction")
			{
				$caloDu = -300;
			}
			else if($data['status'] == "increase")
			{
				$caloDu = 300;
			}
			return ceil((13.397*$data['weight'] + 4.799*$data['height'] - 5.677*$data['age'] + 88.362)*$scale) + $caloDu;
		}else
		{
			if($data['status'] == "reduction")
			{
				$caloDu = -150;
			}
			else if($data['status'] == "increase")
			{
				$caloDu = 150;
			}
			return ceil((9.247*$data['weight'] + 3.098*$data['height'] - 4.33*$data['age'] + 447.593)*$scale) + $caloDu;
		}
	}

	function tinhDinhDuong($calo)
	{
		$dinhDuong = [
			'protein' => 20,
			'fat' => 30,
			'carb' => 50
		];
		$scale = $calo/100;
		return [
			'p'=> ceil($scale*$dinhDuong['protein']/4),
			'f'=> ceil($scale*$dinhDuong['fat']/9),
			'c'=> ceil($scale*$dinhDuong['carb']/4)
		];
	}

	/*
		$dataPer = [
			'frequency' => 1, // tần xuất hoạt động
			'gender' => 'male', // giới tính nam
			'status' => 'reduction', // tình trạng tăng cân hay giảm cân
			'weight' => 50, // cân nặng
			'height' => 160, // chiều cao
			'age' => 21 // độ tuổi,
			'num_food' => 5 // số lượng món ăn
		]
	*/
	function tinhDuaRaSoLuong($dataPer,$lstFoods)
	{
		// Khởi tạo thông tin của người dùng
		$time;
		$calo;
		$protein;
		// Tính toán theo từng buổi
		$hours = date('H');
		if($hours < 10){
			$time = 1;
		}else if($hours < 17){
			$time = 2;
		}else{
			$time = 3;
		}

		// Tính lượng calo cần thiết của người đó
		$calo = tinhCalo($dataPer);
		// Tính toán lượng calo cho từng bữa ăn với tỉ lệ 25:45:30 sáng:trưa:tối
		if($time == 1){ // Sáng thì 25%
			$calo = $calo/100*25;
		}else if($time == 2){ // Trưa 45%
			$calo = $calo/100*45;
		}else{ // Tối 30%
			$calo = $calo/100*30;
		}
		// Tính các khối lượng 3 thành phần dinh dưỡng
		$protein = tinhDinhDuong($calo);
		$data = [
            // Hàm mục tiêu -> Max giá trị cực đại, nếu giá trị -> min thì đổi dấu
            'target'=> [],
            // biến có trong từng phương trình
            'equation' => [],
            // điều kiện của phương trình
            'codition' => [],
            // giá trị của từng biến của từng phương trình
            /* Ví dụ
            *   x1+x2+3x3 = 1
            *   2x1+x2+2x3 = 2
            * thì ta có [1,2],
            *           [1,1],
            *           [3,2]
            */ 
            'index' => [],
            // giá trị bên phải sau dấu bằng
            'variableRight' => []
        ];
		// Thêm hàm mục tiêu target
        foreach ($lstFoods as $key => $food) {
        	array_push($data['target'], -$food->food_price);
        }
		// Thêm biến có trong từng phương trình điều kiện
		// Chạy số lượng phương trình (chất dinh dưỡng)
		for($i = 0 ; $i< $dataPer['num_food']+5; $i++){
			if($i == $dataPer['num_food']+4){
				array_push($data['codition'],"<=");
			}else{
				array_push($data['codition'],">=");
			}
			$data['equation'][$i] = [];
			// Chạy số lượng thực phẩm (hay còn là biến)
			for($j = 0 ; $j < $dataPer['num_food']+1; $j++){
				if($i == 0){
					if($lstFoods[$j]->food_protein != 0){
						array_push($data['equation'][$i],$j+1);
					}
				}else if($i == 1){
					if($lstFoods[$j]->food_lipid != 0){
						array_push($data['equation'][$i],$j+1);
					}
				}else if($i == 2){
					if($lstFoods[$j]->food_glucid != 0){
						array_push($data['equation'][$i],$j+1);
					}
				}else{
					if($i == $dataPer['num_food']+4){
						array_push($data['equation'][$i],1);
					}else{
						array_push($data['equation'][$i],$i-2);
					}
					break;
				}
			}
		}
		// Thêm giá trị của từng biến trong từng phương trình
		// Chạy số lượng thực phẩm
		foreach ($lstFoods as $i => $food) {
			$data['index'][$i] = [];
			for($j = 0 ; $j< $dataPer['num_food']+5; $j++){
				if($j == 0){
					array_push($data['index'][$i],$food->food_protein);
				}else if($j == 1){
					array_push($data['index'][$i],$food->food_lipid);
				}else if($j == 2){
					array_push($data['index'][$i],$food->food_glucid);
				}else {
					if($i == 0 && $j == $dataPer['num_food']+4){
						array_push($data['index'][$i],1);
					}
					else if($j == $i+3){
						array_push($data['index'][$i],1);
					}else{
						array_push($data['index'][$i],0);
					}
				}
			}
		}
		// Thêm giá trị cần thiết của các hàm điều kiện
		array_push($data['variableRight'],$protein['p']);
		array_push($data['variableRight'],$protein['f']);
		array_push($data['variableRight'],$protein['c']);
		for($i = 0; $i < $dataPer['num_food']+1 ; $i++){
			if($i == 0){
				array_push($data['variableRight'],1);
			}else{
				array_push($data['variableRight'],0.5);
			}
		}
		array_push($data['variableRight'],2);
		return [
			'lstFoods' => $lstFoods,
			'result' => handByKalo($data)
		];
	}

	// Thuật toán đơn hình dạng chính tắc 
	// Chuyển tất cả các dấu của phương trình về dấu =
	function handByKalo($dataInit)
	{
		$_Data = [
            // giá trị khởi tạo
            'init' => [
                // Hàm mục tiêu -> Max giá trị cực đại, nếu giá trị -> min thì đổi dấu
                'target'=> [-2,-3],
                // biến có trong từng phương trình
                'equation' => [
                    [1,2],
                    [1,2],
                    [1]
                ],
                // điều kiện của phương trình
                'codition'=> [
                    ">=",
                    ">=",
                    ">="
                ],
                // giá trị của từng biến của từng phương trình
                /* Ví dụ
                *   x1+x2+3x3 = 1
                *   2x1+x2+2x3 = 2
                * thì ta có [1,2],
                *           [1,1],
                *           [3,2]
                */ 
                'index'=> [
                    [5,4,0.5],
                    [10,3,0]
                ],
                // giá trị bên phải sau dấu bằng
                'variableRight'=> [90,48,1.5]
            ],
            // chỉ số sau mỗi lần có kết quả
            'indexs'=> [],
            // kết quả delt cho từng giá trị
            'delta'=> [],
            // giá trị cột xoay hoặc dòng xoay
            's'=> [
                'cols'=> [
                    'value'=> [],
                    'index'=> null
                ], // cột xoay
                'rows'=> null // giá trị phần tử trục
            ],
            'patu'=> [],
            'notPatu'=> [],
            'stopCols'=> [] // những cột không tính nữa
        ];
		$_Data['init'] = $dataInit;
		// 1. Biến đổi về dạng (chính tắc) dựa vào dấu của phương trình
		kiemTraChinhTac($_Data);
		// 2. Tạo ra phương án tối ưu
		// Kiểm tra và xử lý PATU
		$_Data['patu'] = kiemTraPhuongAnToiUu($_Data);
		$step = true;
		$iii = 0;
		while($step){
			$step = nextStep($_Data,$iii);
			$iii++;
			if($iii == 20){
				$step = false;
			}
		}
		sortByValue($_Data['patu']);
		return $_Data['patu'];
		// 3. Tính
		// 3.1 Tính Delta k(&,n) nếu như là phương án cực biên thì nó nó có giá trị bằng 0

		// 3.2 Tìm min ở phần Delta (if (n < 0 ) thì tìm min(n) ngược lại if(n == 0 ) thì min (&)) tìm được cột min và hàng min
		// 3.3 Thay thế dòng min bằng cột min(dòng chính) giá trị/ (giao cột với hàng min)
		// 3.4 Dòng khác sẽ được tính bằng (giá trị cũ) - (chính)*(giao cột với hàng min)
		// 3.5 Xét kết quả và lặp tiếp 
	}
	
	// Kiêm tra đủ chính tắc chưa, nếu chưa đủ thì chuyển về dạng chuẩn tắc.
	function kiemTraChinhTac(&$data)
	{
		$ckCodition = [
			'stt' => false,
			'data' => []
		];
		// Kiểm tra xem các phương trình đã ở dạng chính tắc hay chưa
		foreach ($data['init']['codition'] as $i => $codition) {
			if($codition != "="){
				$ckCodition['stt'] = true;
				$it = [
					'id'=> $i,
					'value'=> $codition
				];
				array_push($ckCodition['data'],$it);
			}
		}
		// Có lỗi ở đây rồi (chưa có dạng chính tắc)
		if($ckCodition['stt']){
			// thêm biến cho vùng lỗi (+- biến để chuyển về dạng chính tắc)
			foreach ($ckCodition['data'] as $key => $item) {
				// lấy biến có giá trị lớn nhất ra
				$mValue = getMaxValue($data);
				array_push($data['init']['equation'][$item['id']],$mValue+1); // Thêm một biến mới = max + 1
				array_push($data['init']['index'],[]);
				// nếu mà điều kiện hiện tại là < = 
				if($item['value'] == "<="){
					// thêm giá trị index cho biến mới tạo nó là phương án tối ưu
					foreach ($data['init']['equation'] as $i => $value) {
						if($item['id'] == $i){
							array_push($data['init']['index'][$mValue],1);
						}else{
							array_push($data['init']['index'][$mValue],0);
						}
					}
					array_push($data['init']['target'],0);
				}else{ // Ngược lại thì giá trị đó không được coi là 1 phương án tối ưu nên cho vào notPatu
					foreach ($data['init']['equation'] as $i => $value) {
						if($item['id'] == $i){
							array_push($data['init']['index'][$mValue],-1);
						}else{
							array_push($data['init']['index'][$mValue],0);
						}
					}
					array_push($data['init']['target'],0);
					array_push($data['notPatu'],$mValue);
				}
				// Đã xong bước hoàn thành chính tắc.
				$data['init']['codition'][$item['id']] = "=";
			}
		}
	}
	// Sau khi kiểm tra xong chính tắc rồi thì thực hiện việc kiểm tra PATU
	function kiemTraPhuongAnToiUu(&$data)
	{
		// chạy từ biến 1 đến hết biến
		$_variable = $data['init']['equation'];
		$PATU = [];
		$arr = [];
		for($i = 1 ; $i<= getMaxValue($data) ; $i++){
			$cValue = 0;
			$id = 0;
			// Kiểm tra sự tồn tại của biến trong mỗi phương trình.
			foreach ($_variable as $j => $item) {
				if(array_search($i,$item) > -1){
					$cValue++;
					$id = $j;
				}
			}
			if($cValue == 1 ){
				if(array_search($i-1,$data['notPatu']) === false){
					$pa = [
						'id' => $id,
						'value' => $i,
						'cj' => $data['init']['target'][$i-1],
						'pa' => $data['init']['variableRight'][$id],
					];
					array_push($PATU,$pa);
					array_push($arr,$id);
				}
			}
		}
		// Nếu mà chưa đủ PATU
		if(sizeof($PATU) < sizeof($_variable)){
			// thêm biến mới cho phương trình 
			foreach ($_variable as $i => $item) {
				// nếu là phương trình chưa có PATU
				if(array_search($i,$arr) === false){
					array_push($data['init']['target'],"-m");
					$mValue = getMaxValue($data);
					array_push($data['init']['equation'][$i],$mValue+1);
					$pa = [
						'id' => $i,
						'value' => $mValue+1,
						'cj' => $data['init']['target'][$mValue],
						'pa' => $data['init']['variableRight'][$i],
					];
					array_push($PATU,$pa);
					array_push($data['init']['index'],[]);
					// thêm chỉ số cho biến mới
					foreach ($data['init']['equation'] as $j => $value) {
						if($i == $j){
							array_push($data['init']['index'][$mValue],1);
						}else{
							array_push($data['init']['index'][$mValue],0);
						}
					}
				}
			}
		}
		$data['indexs'] = $data['init']['index'];
		return $PATU;
	}
 
	// Thực hiện việc tính từng bước nè.
	function nextStep(&$data,$iii)
	{
		// Tính delta
		$data['delta'] = []; // 1
		$data['s']['cols']['value'] = []; // 1
		$data['notPatu'] = []; // 1
		sortById($data['patu']); // 1
		$_min = [
			'phi'=> 0,
			'n'=> 0,
			'index'=> null
		]; // 1
		for($i = 0 ; $i< sizeof($data['indexs']) ; $i++){ // 1
			$n = 0; $phi = 0; // 1
			$cPatu = false; // 1
			for($j = 0 ; $j<sizeof($data['init']['equation']) ; $j++){ // 1
				// tính số delta m và delta n
				// Nếu mà biến đó ko phải phương án tối ưu
				if($data['patu'][$j]['value']-1 != $i && !$cPatu){ //1
					if($data['patu'][$j]['cj'] === "-m"){ // 1 nếu nó không có biến giả tạo 
						$n+=$data['indexs'][$i][$j]; // 1
					}else{
						$phi+=($data['patu'][$j]['cj']*$data['indexs'][$i][$j]); // 1
					}
				// nếu là phương án tối ưu
				}else{
					$cPatu = true; // 1
				}
			}
			$delta; // 1
			if($cPatu){ // 1
				$delta = [
					'phi'=> 0,
					'n'=> 0
				]; // 1
			}else if(array_search($i,$data['stopCols']) !== false){ // 1
				$delta = [
					'phi'=> null,
					'n'=> null
				]; // 1
			}else{
				$delta = [
					'phi'=> $phi-$data['init']['target'][$i],
					'n'=> -$n
				]; // 1
			}
			// Nếu mà có biến giả tạo nào được thêm
			if(array_search("-m",$data['init']['target']) !== false){ // 1
				if($_min['n'] > $delta['n'] && $delta['n'] != null){ // 1
					$_min['n'] = $delta['n']; // 1
					$_min['index'] = $i; // 1
					$_min['phi'] = $delta['phi']; // 1
				}else if($_min['n'] == $delta['n']){ // 1
					if($_min['phi'] > $delta['phi']){ // 1
						$_min['n'] = $delta['n']; // 1
						$_min['index'] = $i; // 1
						$_min['phi'] = $delta['phi']; // 1
					}
				}
				// Nếu không có biến giả tạo được thêm
			}else if(array_search($i,$data['stopCols']) !== false){ // 1

			}else{
				// chỉ tính phi
				if($_min['n'] > $delta['phi'] && $delta['phi'] != null){ // 1
					$_min['n'] = $delta['n']; // 1
					$_min['index'] = $i; // 1
					$_min['phi'] = $delta['phi']; // 1
				}
			}
			array_push($data['delta'], $delta); // 1
		}
		// if($iii == 3){
		// 	dd($data);
		// 	die;
		// }
		// Nếu như kết quả toàn giá trị duong thì dừng
		if($_min['index'] === null){ // 1
			return false;
		}
		// Tìm phần tử trục
		$_findRows = [
			'value'=> null,
			'index'=> null
		]; // 1
		// Chọn trúc xoay và cột xoay
		$minXoay = null;
		$data['s']['cols']['index'] = $_min['index']; // 1
		for($i = 0 ; $i< sizeof($data['init']['equation']) ; $i++){ // 1
			// thêm cột xoay vào
			array_push($data['s']['cols']['value'], $data['indexs'][$_min['index']][$i]); // 1
			// nếu như giá trị bị chia > 0 thì tính
			if($data['indexs'][$_min['index']][$i] > 0){ // 1
				// tính và tìm giá trị min
				$tinh = ($data['patu'][$i]['pa'])/($data['indexs'][$_min['index']][$i]); // 1
				// print_r($tinh);
				// print_r($_min);
				if($minXoay == null){ // 1
					$minXoay = $tinh; // 1
					$_findRows['value'] = $data['indexs'][$_min['index']][$i]; // 1
					$_findRows['index'] = $i; // 1
				}else if($minXoay > $tinh){ // 1
					$minXoay = $tinh; // 1
					$_findRows['value'] = $data['indexs'][$_min['index']][$i]; // 1
					$_findRows['index'] = $i; // 1
				}
			}
		}
		// Nếu như không có phần tử trục do toàn giá trị âm
		if($_findRows['value'] == null){ // 1
			return false;
		}
		$data['s']['rows'] = $_findRows; // 1
		array_push($data['stopCols'], $data['patu'][$_findRows['index']]['value']-1); // 1
		// Sau khi đã tính toán xong cột xoay và phần tử trục thì tính tiếp cho bảng tiếp theo.
		// Dữ liệu tính toán bảng tiếp theo dưới dạng bảng

		// tính pa dòng chính.
		$tg = $data['patu'][$data['s']['rows']['index']]; // 1
		$data['patu'][$data['s']['rows']['index']] = [
			'id'=>$tg['id'],
			'value'=>$data['s']['cols']['index']+1,
			'cj'=>$data['init']['target'][$data['s']['cols']['index']],
			'pa'=>$tg['pa']/$data['s']['rows']['value']
		]; // 1
		// tính pa dòng khác.
		foreach ($data['patu'] as $i => $patu) { // 1
			if($i != $data['s']['rows']['index']){ // 1
				$data['patu'][$i] = [
					'id'=> $patu['id'],
					'value' => $patu['value'],
					'cj' => $patu['cj'],
					'pa' => $patu['pa']-($data['patu'][$data['s']['rows']['index']]['pa']*$data['s']['cols']['value'][$i])
				]; // 1
			}
		}
		// Tính dòng mới, dòng khác.
		// Dòng mới bằng dòng cũ/phần tử trục
		for($i = 0 ; $i< sizeof($data['indexs']) ; $i++){ // 1
			$data['indexs'][$i][$data['s']['rows']['index']] /= $data['s']['rows']['value'];
		}
		// tính pa dòng khác
		for($i = 0 ; $i < sizeof($data['indexs']) ; $i++){ // 1
			for($j = 0 ; $j < sizeof($data['init']['equation']); $j++){ // 1
				// Chỉ tính dòng khác
				if($j != $data['s']['rows']['index']){
					// Dòng khác bằng dòng cũ - (dòng chính*phần tử trục)
					$data['indexs'][$i][$j] -= ($data['indexs'][$i][$data['s']['rows']['index']]*$data['s']['cols']['value'][$j]);
				}
			}
		}
		return true;
	}

	function sortById(&$arr)
	{
		for($i = 0 ; $i< sizeof($arr) ; $i++){
			for($j = sizeof($arr) - 1 ; $j > 0 ; $j--){
				if($arr[$j]['id'] < $arr[$j - 1]['id']){
					$tg = $arr[$j];
					$arr[$j] = $arr[$j-1];
					$arr[$j-1] = $tg;
				}
			}
		}
	}

	function sortByValue(&$arr)
	{
		for($i = 0 ; $i < sizeof($arr) ; $i++){
			for($j = sizeof($arr) - 1 ; $j > 0 ; $j--){
				if($arr[$j]['value'] < $arr[$j - 1]['value']){
					$tg = $arr[$j];
					$arr[$j] = $arr[$j-1];
					$arr[$j-1] = $tg;
				}
			}
		}
	}

	function getMaxValue($data)
	{
		$_m = 0;
		foreach ($data['init']['equation'] as $item1) {
			if(is_array($item1)){
				foreach ($item1 as $item2) {
					if($item2 > $_m){
						$_m = $item2;
					}
				}	
			}
		}
		return $_m;
	}
?>