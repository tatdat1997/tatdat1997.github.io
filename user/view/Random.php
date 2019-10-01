<?php 
    include"../../connect/connectDB.php"; 
?>
<?php  
    $sql = mysqli_query($con,"SELECT * FROM tb_question ORDER BY id_question ASC");
    $data = array();
    $i = 0;
    while ($row = mysqli_fetch_array($sql)) {
    	 $data[$i] = $row['id_question'];
    	 $i++;
    }
	$leg=sizeof($data);
    $string = '[';
    for ($i=0; $i < $leg; $i++) { 
    	$string .= '"'.$data[$i].'",';
    }
    $string = substr($string, 0,-1);
    $string .=']';  
    echo $string;
?>
<!DOCTYPE html>
<html>
<head>
	<title>random</title>
</head>
<body>
	<p>Click the button to display a random number.</p>
	<button onclick="main()">Try it</button>
	<p id="demo"></p>
	<input type="text" name="bienphp" id="bienphp" value="process" />
	<script>
		function main(){
			var listQuestion =<?php echo $string; ?>;
			var numberQuestion = <?php echo $leg; ?>;
			var arrResult = myFunction(listQuestion, numberQuestion);
			document.getElementById("demo").innerHTML = arrResult;
			document.getElementById('bienphp').value= arrResult;

		}
		//numberQuestion use for quanlity number
		function myFunction(listQuestion, numberQuestion) {
			var arrTem = [];
			var arrResult = [];
			//randrom and add item to list
			for (var i = 0; i <numberQuestion; i++) {
				//random tu 1->100
				var num = Math.floor((Math.random() * listQuestion.length) + 1);
				if(checkNumAppear(arrTem, num)){
					arrTem.push(num);
				}else{
					//random false, repeat random
					i--;
				}
			}
			//
			for (var i = 0; i <numberQuestion; i++) {
				arrResult[i] = listQuestion[arrTem[i] - 1];
			}
			return arrResult;
		}
		//listNum is list Number for check, num is number check
		function checkNumAppear(listNum, num){
			for (var i=0;i<listNum.length;i++) {
				if(listNum[i]==num){
					return false;
				}
			}
			return true;
		}
	</script>
</body>
</html>