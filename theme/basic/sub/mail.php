<?php
	$mail_c= "";
	$mail_c = $mail_c.="<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
	$mail_c = $mail_c.="<div style='width:100%;padding-top:20px;padding-bottom:80px;'>\r\n";
	$mail_c = $mail_c.="	<div id='logo' style='padding: 40px;width: 720px;margin: 0 auto;text-align:center;'>\r\n";
	$mail_c = $mail_c.="		<img src='https://int-x.co.kr/theme/basic/img/main/logo_b.png' alt='믿음산업'>\r\n";
	$mail_c = $mail_c.="	</div>";
	$mail_c = $mail_c.="	<h2 style='font-weight:300; font-size:35px;line-height: 1em;margin:0 0 35px;text-align: center;'>문의가 접수되었습니다.</h2>\r\n";
	$mail_c = $mail_c.="	<table style='border-spacing:0;border-collapse:collapse;padding:0;width:100%;margin:0;'>\r\n";
	$mail_c = $mail_c.="		<tbody>";
	$mail_c = $mail_c.="			<tr>";
	$mail_c = $mail_c.="				<td align='center'>";
	$mail_c = $mail_c.="					<table style='border-spacing:0;border-collapse:collapse;width:800px;'>\r\n";
	$mail_c = $mail_c.="						<colgroup>";
	$mail_c = $mail_c.="							<col width='180px;'>";
	$mail_c = $mail_c.="							<col width='280px;'>";
	$mail_c = $mail_c.="							<col width='120px;'>";
	$mail_c = $mail_c.="							<col width='280px;'>";
	$mail_c = $mail_c.="						</colgroup>";
	$mail_c = $mail_c.="						<tbody>";
	$mail_c = $mail_c.="";
	$mail_c = $mail_c.="							<tr>";
	$mail_c = $mail_c.="								<td align='center' style='padding:20px; background-color: #f7f7f7; font-weight:800; border-bottom:1px solid #ccc;border-top:1px solid #ccc;'>이름</td>\r\n";
	$mail_c = $mail_c.="								<td align='left' style='padding:20px; border-bottom:1px solid #ccc;border-top:1px solid #ccc;' colspan='3'>$wr_name</td>\r\n";
	$mail_c = $mail_c.="							</tr>";
	$mail_c = $mail_c.="							<tr>";
	$mail_c = $mail_c.="								<td align='center' style='padding:20px; background-color: #f7f7f7; font-weight:800; border-bottom:1px solid #ccc;'>연락처</td>\r\n";
	$mail_c = $mail_c.="								<td align='left' style='padding:20px; border-bottom:1px solid #ccc;' colspan='3'>$wr_tel</td>\r\n";
	$mail_c = $mail_c.="							</tr>";
	$mail_c = $mail_c.="							<tr>";
	$mail_c = $mail_c.="								<td align='center' style='padding:20px; background-color: #f7f7f7; font-weight:800; border-bottom:1px solid #ccc;'>구분</td>\r\n";
	$mail_c = $mail_c.="								<td align='left' style='padding:20px; border-bottom:1px solid #ccc;' colspan='3'>$wr_1</td>\r\n";
	$mail_c = $mail_c.="							</tr>";
	$mail_c = $mail_c.="							<tr>";
	$mail_c = $mail_c.="								<td align='center' style='padding:20px; background-color: #f7f7f7; font-weight:800; border-bottom:1px solid #ccc;border-top:1px solid #ccc;'>현장주소</td>\r\n";
	$mail_c = $mail_c.="								<td align='left' style='padding:20px; border-bottom:1px solid #ccc;border-top:1px solid #ccc;' colspan='3'>".$wr_3 ." " .$wr_4."</td>\r\n";
	$mail_c = $mail_c.="							</tr>";
	$mail_c = $mail_c.="							<tr>";
	$mail_c = $mail_c.="								<td align='center' style='padding:20px; background-color: #f7f7f7; font-weight:800; border-bottom:1px solid #ccc;'>현장 상세주소</td>\r\n";
	$mail_c = $mail_c.="								<td align='left' style='padding:20px; border-bottom:1px solid #ccc;' colspan='3'>$wr_5</td>\r\n";
	$mail_c = $mail_c.="							</tr>";
	$mail_c = $mail_c.="							<tr>";
	$mail_c = $mail_c.="								<td align='center' style='padding:20px; background-color: #f7f7f7; font-weight:800; border-bottom:1px solid #ccc;'>부동산 계약여부</td>\r\n";
	$mail_c = $mail_c.="								<td align='left' style='padding:20px; border-bottom:1px solid #ccc;' colspan='3'>$wr_6</td>\r\n";
	$mail_c = $mail_c.="							</tr>";
	$mail_c = $mail_c.="							<tr>";
	$mail_c = $mail_c.="								<td align='center' style='padding:20px; background-color: #f7f7f7; font-weight:800; border-bottom:1px solid #ccc;border-top:1px solid #ccc;'>예정일(희망)</td>\r\n";
	$mail_c = $mail_c.="								<td align='left' style='padding:20px; border-bottom:1px solid #ccc;border-top:1px solid #ccc;' colspan='3'>$wr_7</td>\r\n";
	$mail_c = $mail_c.="							</tr>";
	$mail_c = $mail_c.="							<tr>";
	$mail_c = $mail_c.="								<td align='center' style='padding:20px; background-color: #f7f7f7; font-weight:800; border-bottom:1px solid #ccc;'>문의내용</td>\r\n";
	$mail_c = $mail_c.="								<td align='left' style='padding:20px; border-bottom:1px solid #ccc;' colspan='3'>".nl2br($wr_content)."</td>\r\n";
	$mail_c = $mail_c.="							</tr>";
	$mail_c = $mail_c.="						</tbody>";
	$mail_c = $mail_c.="					</table>";
	$mail_c = $mail_c.="				</td>";
	$mail_c = $mail_c.="			</tr>";
	$mail_c = $mail_c.="		</tbody>";
	$mail_c = $mail_c.="	</table>";
	$mail_c = $mail_c.="</div>";

	$subject = "부분공사 문의가 등록되었습니다";
	$from = "siteadmin@int-x.co.kr"; // 보내는 사람
	$to = $config['cf_admin_email'];// 받는 사람
	$add_header = "From: $from\n";
	$add_header .= "Reply-To: $from\n";
	$add_header .= "Content-Type: text/html;charset=EUC-KR";
	$subject = iconv("UTF-8", "EUC-KR", $subject);
	$messages = iconv("UTF-8", "EUC-KR", $mail_c);
	mail($to, $subject, $messages, $add_header, '-f'.$from);
?>