﻿<?php
if(!defined('CC_INI_SET')){ die("Access Denied"); }
if(!isset($langBully)) require(CC_ROOT_DIR.CC_DS."language".CC_DS.LANG_FOLDER.CC_DS."config.php");
$lv = !$langBully ?  "lang" : "bully";
${$lv}['error'] = array(
'error' => "ОШИБКА - %1\$s",
'no_error_msg' => "Извините, для этого кода ошибки нет заданного сообщения об ошибке. ",
'10001' => "К сожалению, для вашего заказа нет подходящего метода доставки. Из-за того, что общий вес вашего заказа слишком велик или мы не осуществляем доставку в вашу страну. Если у вас возникли вопросы, пожалуйста, свяжитесь с нашими сотрудниками.",
'10002' => "Ваша ссылка загрузки просрочена или недействительна. Пожалуйста, свяжитесь с нашими сотрудниками, которые восстановят вашу ссылку или предоставят вам другие средства доступа к файлу.",
'10003' => "I am sorry but we can only take PayPal orders from accounts with a verified address."
);
?>
