<?php 

function ioncube_event_handler ($err_code, $params) {
	$theme_num = 27;
  $redirect_url = urldecode("http%3A%2F%2Fwp-shop.ru%2Fprice%2F");
	// create $message depending on the error
	if ($err_code == ION_CORRUPT_FILE) {
   $message = 'Был подключен поврежденный файл лицензии <b>' . $params['current_file'] . '</b>. Пожалуйста, перейдите на сайт <a href="'.$redirect_url.'" target="_blank">wp-shop.ru</a> для получения дополнительной информации';
 }
 elseif ($err_code == ION_EXPIRED_FILE) {
    $message = 'Срок действия файла лицензии истек. Пожалуйста, перейдите на сайт <a href="'.$redirect_url.'" target="_blank">wp-shop.ru</a> для продления лицензии';
 }
 elseif ($err_code == ION_NO_PERMISSIONS) {
    $message = 'Этот сайт не лицензирован. Пожалуйста, перейдите на сайт <a href="'.$redirect_url.'" target="_blank">wp-shop.ru</a> для получения лицензии';
 }
 elseif ($err_code == ION_CLOCK_SKEW) {
    $message = 'Please verify that your system clock is properly set.';
 }
 elseif ($err_code == ION_UNTRUSTED_EXTENSION) {
    $message = 'A file was included that includes an untrusted extension.';
 }
 elseif ($err_code == ION_LICENSE_NOT_FOUND) {
    $message = 'Ваш лицензионный файл не найден.  Пожалуйста, перейдите на сайт <a href="'.$redirect_url.'" target="_blank">wp-shop.ru</a> для получения дополнительной информации';
 }
 elseif ($err_code == ION_LICENSE_CORRUPT) {
    $message = 'Ваш лицензионный файл поврежден.  Пожалуйста, перейдите на сайт <a href="'.$redirect_url.'" target="_blank">wp-shop.ru</a> для получения дополнительной информации';
 }
 elseif ($err_code == ION_LICENSE_EXPIRED) {
    $message = 'Срок действия лицензии истек.  Пожалуйста, перейдите на сайт <a href="'.$redirect_url.'" target="_blank">wp-shop.ru</a> для получения дополнительной информации';
 }
 elseif ($err_code == ION_LICENSE_PROPERTY_INVALID) {
    $message = 'Ваш лицензионный файл не может быть распознан.  Пожалуйста, перейдите на сайт <a href="'.$redirect_url.'" target="_blank">wp-shop.ru</a> для получения дополнительной информации';
 }
 elseif ($err_code == ION_LICENSE_HEADER_INVALID) {
    $message = 'Ваш лицензионный файл поврежден.  Пожалуйста, перейдите на сайт <a href="'.$redirect_url.'" target="_blank">wp-shop.ru</a> для получения дополнительной информации';
 }
 elseif ($err_code == ION_LICENSE_SERVER_INVALID) {
    $message = 'Ваш лицензионный файл не соответствует данному сайту.<br /><br />Пожалуйста, перейдите на сайт <a href="'.$redirect_url.'" target="_blank">wp-shop.ru</a> для получения дополнительной информации';
 }
 elseif ($err_code == ION_UNAUTH_INCLUDING_FILE) {
    $message = 'An unauthorized file is trying to include an encoded script (<b>' . $params['include_file'] . '</b>).';
 }
 elseif ($err_code == ION_UNAUTH_INCLUDED_FILE) {
    $message = 'An unauthorized file has been included (<b>' . $params['include_file'] . '</b>).';
 }
 elseif ($err_code == ION_UNAUTH_APPEND_PREPEND_FILE) {
    $message = 'An unauthorized file has been appended/prepended to an encoded script (<b>' . $params['include_file'] . '</b>).';

 }
	
	$message = '<p> ' . $message . '</p>';
  echo "
  <html>
    <head>
      <title>Error</title>
      <style type='text/css'>
		*, html, body, div, dl,
		dt, dd, ul, ol, li, h1,
		h2, h3, h4, h5, h6, pre,
		form, label, fieldset, input, p,
		blockquote, th, td	 {
			margin:0;
			padding:0;
		}
		
        body  {
			background: #f1f1f1;
			margin: 0px;
		}
		
		body {
			color: #444;
			font-family: 'Open Sans',sans-serif;
		}
		
		.floatLeft {
			float: left;
		}
		
		.clear {
			clear: both;
		}
		
		a {
			outline: none; 
			text-decoration: none;
			color:#EE6D5B;
		}

		a:hover {
			text-decoration: underline;
		}
		
		#wrapper {
			background: #fff;
			margin: 0px auto 25px;
			padding: 20px;
			max-width: 700px;
			-webkit-font-smoothing: subpixel-antialiased;
			-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);
			box-shadow: 0 1px 3px rgba(0,0,0,.13);
		}
		
		h1 {
			clear: both;
			color: #444;
			font-size: 23px;
			margin: 10px 0;
			padding: 0;
			font-weight: 600;
			line-height: 30px;
		}
		
		.logo {
			margin: 0 auto;
			width: 700px;
			margin-top: 50px;
			margin-bottom: 50px;
		}
		
		.logo img {
			margin-right: 30px;
		}
		
		.clear {
			clear: both;
		}
		
		.logo_title {
			clear: both;
			color: #000;
			font-size: 53px;
			margin: 69px 0 0;
			padding: 0;
			padding-bottom: 7px;
			font-weight: 400;
			line-height: 1;
			border: none;
		}
      </style>
    </head>
    <body>
		<div class='logo'>
			<a href='http://www.wp-shop.ru' class='floatLeft'><img src='http://www.stroboscop.ru/gen/files/wpshopru2.png' width='150'/></a>
			<a href='http://www.wp-shop.ru' class='floatLeft'><h1 class='logo_title'>WP-SHOP.RU</h1></a>
			<div class='clear'></div>
		</div> 
	<div id='wrapper'>
  ";
  echo "<h1>Вы используете тему №{$theme_num}</h1>";
  echo $message;
  echo "</div></body></html>";
  die();
  
}