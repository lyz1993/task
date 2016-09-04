<?php
header("content-type:text/html;charset=utf-8");
ini_set("magic_quotes_runtime",0);
require 'class.phpmailer.php';
try {
	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
	$mail->SMTPAuth   = true;                  //开启认证
	$mail->Port       = 25;
	$mail->Host       = "smtp.163.com";
	$mail->Username   = "18660780067@163.com";
	$mail->Password   = "jkc726";
	$mail->From       = "18660780067@163.com";
	$mail->FromName   = "l";
	$to = "545313980@qq.com";
	$mail->AddAddress($to);
	$mail->Subject  = "错误处理提醒";
	$mail->Body = "有一个任务需要你处理，请查看。";
	$mail->IsHTML(true);
	$mail->Send();
	echo '邮件已发送';
} catch (phpmailerException $e) {
	echo "邮件发送失败：".$e->errorMessage();
}
?>
