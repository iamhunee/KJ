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
		$msgErr = '필수사항을 기입해주세요.';
		$validation = false;
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$msgErr = '유효하지 않는 이메일주소입니다.';
		$validation = false;
	}else if(!filter_var($phone,FILTER_VALIDATE_INT)){
		$msgErr = '유효하지 않는 전화번호입니다.';
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
		echo "<script>alert('접수되었습니다'); location.href='index.php'</script>";

	}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>국제전자</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="styleKo.css" type="text/css" />
</head>
<body>

<aside>
	<div class="smenu home">
		<span class="h">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;홈
	</div>
	<div class="smenu require">
		<span class="r">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;수리요청
	</div>
	<div class="smenu service">
		<span class="s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;서비스
	</div>
	<div class="smenu tip">
		<span class="t">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;팁
	</div>
</aside>

<section id="page-wrap">
	<div class="language clearfix"><a href="index.php" class="f_r">English</a></div>
	<div id="page1">
		<div class="dial">
			<img src="image/dial.png"  width="200"/>
		</div>
		<div class="clearfix">
			<div class="section s1">
				<img src="image/logo.png" class="icon-left logo"/>
				<div class="note1">
					경험과 노하우를 바탕으로 한 수리!<br />
					신속하고 정확한 업무처리!<br />
					고객 만족도를 최우선으로 추구!
				</div>
			</div>
			<div class="section s2">
				<a href="#inquery">
					<img src="image/require.png" class="icon-right require"/>
				</a>
				<div class="note2">
					신속하게 답변해드립니다.
				</div>
				<div class="arrowWrap2 clearfix">
					<div class="arrow_pointer2"></div>
					<div class="arrow2"></div>
				</div>
			</div>
			<div class="section s3">
				<a href="#service">
					<img src="image/service.png" class="icon-left service"/>
				</a>
				<div class="arrowWrap3 clearfix">
					<div class="arrow3"></div>
					<div class="arrow_pointer3"></div>
				</div>
				<div class="note3">
					최상의 서비스와 만족도를<br />
					보장합니다.
				</div>
			</div>
			<div class="section s4">
				<a href="#tip">
					<img src="image/tip.png" class="icon-right tip"/>
				</a>
				<div class="arrowWrap4 clearfix">
					<div class="arrow_pointer4"></div>
					<div class="arrow4"></div>
				</div>
				<div class="note4">
					알면 유용한 정보!
				</div>
			</div>
		</div>
	</div>
	<div id="page2">
		<div class="mTitleWrap">
			<span class="mTitle1">수리 신청서</span>
		</div>
		<div class="contactForm">
			<?php if($msgErr != ''): ?>
			<div class="err"><?php echo $msgErr; ?></div>
			<?php endif; ?>
			<div class="formWrap">
				<form name="inquery" id="inquery" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

				<div class="panel">
					<div class="input"><input type="text" name="name" class="in_txt" value="<?php echo $name; ?>" placeholder="이름 *" autocomplete="off"/></div>
				</div>
				<div class="panel pop">
					<div class="input"><input type="text" name="email" class="in_txt" value="<?php echo $email; ?>" placeholder="이메일 *" autocomplete="off" /></div>
				</div>
				<div class="panel tooltipBox">
					<div class="tooltip_bottom">
						<div class="tooltip-content-wrap">
							<div class="tooltip-content">
								연락받으실 이메일 주소를 적어주세요.
							</div>
						</div>
					</div>
				</div>
				<div class="panel pop">
					<div class="input"><input type="text" name="phone" class="in_txt" value="<?php echo $phone; ?>"placeholder="전화번호 *" autocomplete="off" /></div>
				</div>
				<div class="panel tooltipBox">
					<div class="tooltip_bottom">
						<div class="tooltip-content-wrap">
							<div class="tooltip-content">
								연락받으실 전화번호를 적어주세요.
							</div>
						</div>
					</div>
				</div>
				<div class="panel pop">
					<div class="input"><input type="text" name="address" class="in_txt" value="<?php echo $address; ?>" placeholder="주소 *" autocomplete="off" /></div>
				</div>
				<div class="panel tooltipBox">
					<div class="tooltip_bottom">
						<div class="tooltip-content-wrap">
							<div class="tooltip-content">
								서비스 받을 주소를 적어주세요.
							</div>
						</div>
					</div>
				</div>
				<div class="panel">
					<div class="input">
						<select class="in_sel" name="kind">
							<option>가전제품 종류</option>
							<option>세탁기</option>
							<option>냉장고</option>
							<option>오븐</option>
							<option>쿡탑</option>
							<option>드라이어</option>
							<option>식기세척기</option>
							<option>삼성TV</option>
						<select>
					</div>
				</div>
				<div class="panel">
					<div class="input">
						<select class="in_sel" name="brand">
							<option>브랜드 명</option>
							<option>삼성</option>
							<option>엘지</option>
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
					<div class="input"><input type="text" name="model" class="in_txt" value="<?php echo $model; ?>" placeholder="모델명 예) F1925WC" autocomplete="off" /></div>
				</div>
				<div class="panel">
					<div class="input">
						<textarea class="txtarea" name="symptom" rows="5" placeholder="고장 원인 또는 증상 *"><?php echo $symptom; ?></textarea>
					</div>
				</div>
				<div class="panel clearfix">
					<input type="submit" name="submit" class="btn_grey f_l" value="수리신청 확인" />
					<span class="f_r">* 필수사항</span>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div id="page3">
		<div class="mTitleWrap">
			<span class="mTitle2">서비스</span>
		</div>
		<div class="left_col">
			<div class="leftWrap">
				<div class="left_box">
					<p class="title txt">•&nbsp;&nbsp;연락처</p>
					<p>김현석&nbsp;&nbsp;&nbsp;&nbsp;mob. 0433 509 567</p>
				</div>
				<div class="left_box">
					<p class="title">•&nbsp;&nbsp;근무 시간</p>
					<p>09:00 ~ 18:00, 월요일 ~ 토요일</p>
				</div>
				<div class="left_box">
					<p class="title">•&nbsp;&nbsp;워런티</p>
					<p>6개월</p>
				</div>
			</div>
		</div>
		<div class="right_col">
			<div class="rightWrap">
				<div class="right_box">
					<p class="title">
						•&nbsp;&nbsp;서비스 브랜드
					</p>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;삼성, 엘지, Whirlpool, Hoover, Simpson, Westinghouse,<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fisher And Paykel, Chef, Omega, Smeg, Lemair 기타 등등
					</p>
				</div>
				<div class="right_box">
					<p class="title">
						•&nbsp;&nbsp;서비스 품목
					</p>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;세탁기, 냉장고, 식기세척기, 오븐, 쿡탑, 드라이어,<br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;삼성TV
					</p>
				</div>
				<div class="right_box">
					<p class="title">
						•&nbsp;&nbsp;서비스 지역
					</p>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;시드니 전 지역
					</p>
				</div>
				<div class="right_box">
					<p class="title">
						•&nbsp;&nbsp;서비스 내용
					</p>
					<p>
						&nbsp;&nbsp;&gt;&nbsp;&nbsp;직접 방문하여 고객님의 제품을 수리합니다.<br />
						&nbsp;&nbsp;&gt;&nbsp;&nbsp;수리 신청 접수시 고객님과 전화통화로 고장 내용을<br />
						&nbsp;&nbsp;&nbsp;&nbsp;확인합니다.<br />
						&nbsp;&nbsp;&gt;&nbsp;&nbsp;교체한 부품의 종류 및 수량에 따라 수리비용이<br />
						&nbsp;&nbsp;&nbsp;&nbsp;산출됩니다.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div id="page4">
		<div class="mTitleWrap">
			<span class="mTitle3">팁</span>
		</div>
		<div class="centerWrap">
			<div class="center_box1">
				<p class="title">•&nbsp;&nbsp;세탁기</p>
				&nbsp;&nbsp;-&nbsp;&nbsp;설치시 수평을 유지하여 소음과 진동을 없애줍니다.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;정해진 빨래 용량을 초과하면 수명이 단축됩니다.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;세탁 후에는 문을 열어 내부를 건조시켜 줍니다.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;세제통도 가끔 꺼내서 세척해 주시면 좋습니다.
			</div>
			<div class="center_box2">
				<p class="title">•&nbsp;&nbsp;냉장고</p>
				&nbsp;&nbsp;-&nbsp;&nbsp;설치시 벽과 일정한 거리를 두고 설치하여 환기와 냉각능력을 유지하도록 합니다.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;냉장고 안을 꽉꽉 채워서 사용하다 보면 냉각기의 순환에 무리를 초래하게 되므로 냉장고를 너무 가득 채우지 않습니다.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;냉장고 문을 자주 열수록 전기 소모는 물론이고 수명도 단축됩니다.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;냉장고 청소시 물과 베이킹 소다를 섞어 닦아주시고, 냉장고 문의 고무 패킹부분은 칫솔을 이용하여 닦아주면 좋습니다.
			</div>
			<div class="center_box2">
				<p class="title">•&nbsp;&nbsp;오븐</p>
				&nbsp;&nbsp;-&nbsp;&nbsp;정기적으로 청소를 합니다. 내부에 남은 찌꺼기는 온도조절 기능을 저하시키거나 화재의 원인이 됩니다.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;안에 식품을 넣지 않거나 지나치게 적은 양을 넣고 가열해도 고장의 원인이 될 수 있습니다.
			</div>
			<div class="center_box2">
				<p class="title">•&nbsp;&nbsp;식기세척기</p>
				&nbsp;&nbsp;-&nbsp;&nbsp;필터를 정기적으로 청소해 줍니다.<br />
				&nbsp;&nbsp;-&nbsp;&nbsp;물의 온도는 48도 정도가 적당합니다.
			</div>
		</div>
	</div>
</section>
<footer>
	Copyright 2014. 이곳의 모든 저작권은 국제전자에게 있습니다.<span class="design">Designed by Jihoon Cheong</span>
</footer>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="jQueryRotate.js"></script>
<script type="text/javascript" src="defaultKo.js"></script>
</body>
</html>