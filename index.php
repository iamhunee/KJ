<?php

$msgErr = '';
$name = '';
$email = '';
$phone = '';
$address = '';
$model = '';
$symptom = '';

$validation = false;

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$kind = $_POST['kind'];
	$brand = $_POST['brand'];
	$model = $_POST['model'];
	$symptom = $_POST['symptom'];

	if(empty($name) || empty($phone) || empty($address) || empty($symptom)){
		$msgErr = 'Please fill in all required fields.';
		$validation = false;
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$msgErr = 'Invalid email address.';
		$validation = false;
	}else if(!filter_var($phone,FILTER_VALIDATE_INT)){
		$msgErr = 'Invalid phone number.';
		$validation = false;
	}else{
		$validation = true;
	}

	// Email
	if($validation === true){
		$to = "iamhunee@gmail.com";
		$subject = '수리 요청';
		$message = '<!DOCTYPE html>
					<html>
					<head>
					<title>국제전자</title>
					<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
					</head>
					<body>
						<div class="content">
							<h3>수리요청</h3>
							이름 : '.$name.'<br/>
							이메일 : '.$email.'<br/>
							전화번호 : '.$phone.'<br />
							주소 : '.$address.'<br />
							가전종류 : '.$kind.'<br />
							브랜드 : '.$brand.'<br />
							모델 : '.$model.'<br />
							원인 밎 증상 : '.$symptom.'<br />
						</div>
					</body>
					</html>';
		$headers = 'From: '.$email."\r\n".
			'Reply-To: '.$email."\r\n".
			'MIME=Version: 1.0'."\r\n".
			'Content-type:text/html; charset=utf-8'."\r\n".
			'X-Mailer: PHP/' . phpversion();

	//	mail($to, $subject, $message, $headers);
		echo "<script>alert('Successfully submitted'); location.href='indexEn.php'</script>";

	}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>KJ Appliance</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<aside>
	<div class="smenu home">
		<span class="h">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Home
	</div>
	<div class="smenu require">
		<span class="r">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Request
	</div>
	<div class="smenu service">
		<span class="s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Service
	</div>
	<div class="smenu tip">
		<span class="t">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;Tip
	</div>
</aside>

<section id="page-wrap">
	<div class="language clearfix"><a href="indexKo.php" class="f_r">Korean</a></div>
	<div id="page1">
		<a id="home"></a>
		<div class="dial">
			<img src="image/dial.png" width="200"/>
		</div>
		<div class="clearfix">
			<div class="section s1">
				<img src="image/logoEn.png" class="icon-left logo"/>
				<div class="note1">
					Certified Technicians!<br />
					Warranty on eveery repair!<br />
					Customer satisfaction is top priority!<br />
					Experts at an affordable price!
				</div>
			</div>
			<div class="section s2">
				<a href="#inquery">
					<img src="image/requireEn.png" class="icon-right require"/>
				</a>
				<div class="note2">
					We promise prompt response!
				</div>
				<div class="arrowWrap2 clearfix">
					<div class="arrow_pointer2"></div>
					<div class="arrow2"></div>
				</div>
			</div>
			<div class="section s3">
				<a href="#service">
					<img src="image/serviceEn.png" class="icon-left service"/>
				</a>
				<div class="arrowWrap3 clearfix">
					<div class="arrow3"></div>
					<div class="arrow_pointer3"></div>
				</div>
				<div class="note3">
					We guarantee an excellent service<br />
					and customer satisfaction.
				</div>
			</div>
			<div class="section s4">
				<a href="#tip">
					<img src="image/tipEn.png" class="icon-right tip"/>
				</a>
				<div class="arrowWrap4 clearfix">
					<div class="arrow_pointer4"></div>
					<div class="arrow4"></div>
				</div>
				<div class="note4">
					Useful Information!
				</div>
			</div>
		</div>
	</div>
	<div id="page2">
		<div class="mTitleWrap">
			<span class="mTitle1">Service Application</span>
		</div>
		<div class="contactForm">
			<?php if($msgErr != ''): ?>
			<div class="err"><?php echo $msgErr; ?></div>
			<?php endif; ?>
			<div class="formWrap">
				<form name="inquery" id="inquery" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="panel">
					<div class="input"><input type="text" name="name" class="in_txt" value="<?php echo $name; ?>" placeholder="Name *" autocomplete="off"/></div>
				</div>
				<div class="panel pop">
					<div class="input"><input type="text" name="email" class="in_txt" value="<?php echo $email; ?>" placeholder="Email *" autocomplete="off" /></div>
				</div>
				<div class="panel tooltipBox">
					<div class="tooltip_bottom">
						<div class="tooltip-content-wrap">
							<div class="tooltip-content">
								Please fill in your email address.
							</div>
						</div>
					</div>
				</div>
				<div class="panel pop">
					<div class="input"><input type="text" name="phone" class="in_txt" value="<?php echo $phone; ?>"placeholder="Phone number *" autocomplete="off" /></div>
				</div>
				<div class="panel tooltipBox">
					<div class="tooltip_bottom">
						<div class="tooltip-content-wrap">
							<div class="tooltip-content">
								Please fill in your mobile or phone number.
							</div>
						</div>
					</div>
				</div>
				<div class="panel pop">
					<div class="input"><input type="text" name="address" class="in_txt" value="<?php echo $address; ?>" placeholder="Address *" autocomplete="off" /></div>
				</div>
				<div class="panel tooltipBox">
					<div class="tooltip_bottom">
						<div class="tooltip-content-wrap">
							<div class="tooltip-content">
								Please fill in your address.
							</div>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="input">
						<select class="in_sel" name="kind">
							<option>Select Appliance</option>
							<option>Washing Machine</option>
							<option>Refregerator</option>
							<option>Oven</option>
							<option>Cook Top</option>
							<option>Dryer</option>
							<option>Dish Washer</option>
							<option>Samsung TV</option>
						<select>
					</div>
				</div>
				<div class="panel">
					<div class="input">
						<select class="in_sel" name="brand">
							<option>Select Brand Name</option>
							<option>Samsung</option>
							<option>LG</option>
							<option>Simpon</option>
							<option>Westinghouse</option>
							<option>Whirlpool</option>
							<option>Fisher&Paykel</option>
							<option>Omega</option>
							<option>Smeg</option>
							<option>Hoover</option>
							<option>Kitchenaid</option>
							<option>Kelvinator</option>
						<select>
					</div>
				</div>
				<div class="panel">
					<div class="input"><input type="text" name="model" class="in_txt" value="<?php echo $model; ?>" placeholder="Model Name e.g, F1925WC" autocomplete="off" /></div>
				</div>
				<div class="panel">
					<div class="input">
						<textarea class="txtarea" name="symptom" rows="3" placeholder="Describe your problem *"><?php echo $symptom; ?></textarea>
					</div>
				</div>
				<div class="panel clearfix">
					<input type="submit" name="submit" class="btn_grey f_l" value="Submit Request" />
					<span class="f_r">* Required fields</span>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div id="page3">
		<div class="mTitleWrap">
			<span class="mTitle2">Service</span>
		</div>
		<div class="left_col">
			<div class="leftWrap">
				<div class="left_box">
					<p class="title txt">•&nbsp;&nbsp;Contact</p>
					<p>Mr. Kim&nbsp;&nbsp;&nbsp;&nbsp;mob. 0433 509 567</p>
				</div>
				<div class="left_box">
					<p class="title">•&nbsp;&nbsp;Business Hour </p>
					<p>09:00 ~ 18:00, Mon ~ Sat</p>
				</div>
				<div class="left_box">
					<p class="title">•&nbsp;&nbsp;Warranty</p>
					<p>6 month</p>
				</div>
			</div>
		</div>
		<div class="right_col">
			<div class="rightWrap">
				<div class="right_box">
					<p class="title">
						•&nbsp;&nbsp;Brand
					</p>
					<p>
						Samsung, LG, Whirlpool, Hoover, Simpson, Chef,<br />
						Westinghouse, Fisher And Paykel, Omega, Smeg, <br />
						Lemair, Etc.
					</p>
				</div>
				<div class="right_box">
					<p class="title">
						•&nbsp;&nbsp;Item
					</p>
					<p>
						Washing Machine, Refrigerator, Dish Washer,<br />
						Oven, Cook Top, Dryer, Samsung TV
					</p>
				</div>
				<div class="right_box">
					<p class="title">
						•&nbsp;&nbsp;Region
					</p>
					<p>
						Sydney entire region
					</p>
				</div>
				<div class="right_box">
					<p class="title">
						•&nbsp;&nbsp;Contents
					</p>
					<p>
						&nbsp;&nbsp;&gt;&nbsp;&nbsp;We visit you and repair your products.<br />
						&nbsp;&nbsp;&gt;&nbsp;&nbsp;We confirm your request by phone as soon as <br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;we receive application.<br />
						&nbsp;&nbsp;&gt;&nbsp;&nbsp;The price will include the service fee and<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;the cost of parts.<br />
					</p>
				</div>
			</div>
		</div>
	</div>
	<div id="page4">
		<div class="mTitleWrap">
			<span class="mTitle3">Tip</span>
		</div>
		<div class="centerWrap">
			<div class="center_box1">
				<p class="title">•&nbsp;&nbsp;Dish Washer</p>
				&nbsp;&nbsp;-&nbsp;&nbsp;Clean the filter regularly.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;The suitable water temperature is 48 degrees.
			</div>
			<div class="center_box2">
				<p class="title">•&nbsp;&nbsp;Washing machine</p>
				&nbsp;&nbsp;-&nbsp;&nbsp;When installation keeps on an even keel, it eliminates noise and vibration.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;Exceeding appropriate amount of washing, it can cause of shorten the lifespan of machine.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;After finish washing, keep open door for a while and make it drying inside of machine.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;It is better regularly cleaning of detergent dispenser.
			</div>
			<div class="center_box2">
				<p class="title">•&nbsp;&nbsp;Refrigerator</p>
				&nbsp;&nbsp;-&nbsp;&nbsp;When installing refrigerator make certain distance from the wall, to maintain ventilation and cooling capacity.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;Do not filled too much inside a refrigerator, it will cause overload of cooling circulation.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;Do not open the door too often, it will increase the electricity consumption and shorten the life span of machine.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;When cleaning the refrigerator using (mix baking soda with water) detergent and wipe with clothes,<br />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;also when cleaning part of the door rubber seal using toothbrush to give the polish.

			</div>
			<div class="center_box2">
				<p class="title">•&nbsp;&nbsp;Oven</p>
				&nbsp;&nbsp;-&nbsp;&nbsp;Remaining residue inside the oven bring about decrease of temperature function as well as the cause of the fire.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;When heating the oven, put proper amount of food. Too small or too much food inside also causes the failure.

			</div>

		</div>
	</div>
</section>
<footer>
	Copyright 2014. KJ appliance repair All rights reserved.<span class="design">Designed by Jihoon Cheong</span>
</footer>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="jQueryRotate.js"></script>
<script type="text/javascript" src="default.js"></script>
</body>
</html>