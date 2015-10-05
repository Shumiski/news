<?php 


include_once('inc/SimpleImage.php');
include_once('inc/simple_html_dom.php');


$validateThumbs = $_POST["validateThumbs"];


function featured($elemento, $url){
$html = file_get_html($url);
$title = $html->find('h2', 1);
$category = $html->find('div.field-name-field-category a', 0);

    
    if ($elemento == 'title')  {  
        return $title->plaintext;
    } else if ($elemento == 'category'){
        return strtoupper($category->plaintext);
    } 

}

function theThumb($thumbName, $url){

    
    $html = file_get_html($url);
    $image = $html->find('div.field-name-field-image img', 0);    
    
    //Pega apenas o src
    $doc = new DOMDocument();
    $doc->loadHTML($image);
    $xpath = new DOMXPath($doc);
    $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
    
    //Capta - Edita - Salva a imagem
    try {
        $img = new abeautifulsite\SimpleImage($src);
        $img->fit_to_height(109);
        $img->thumbnail(166, 109);
        $img->save('html_template-assets/' . $thumbName . '.jpg', 100);
    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
 
    
    echo 'html_template-assets/' . $thumbName . '.jpg';   
}



function theArticleImage($image){   
    
    //Pega apenas o src
    $doc = new DOMDocument();
    $doc->loadHTML($image);
    $xpath = new DOMXPath($doc);
    $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
    
    //Capta - Edita - Salva a imagem
    try {
        $img = new abeautifulsite\SimpleImage($src);
        $img->fit_to_width(600);
        $img->save('../html_template-assets/d-article-image.jpg', 100);
    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }

}


//Salva Article Image
theArticleImage($_POST["articleImage"]);





$featuredLinks = 3;


$featured01Link = $_POST["featuredLink01"];
$featured01Cat = featured('category', $featured01Link);
$featured01Title = featured('title', $featured01Link);



$featured02Link = $_POST["featuredLink02"];
$featured02Cat = featured('category', $featured02Link);
$featured02Title = featured('title', $featured02Link);


$featured03Link = $_POST["featuredLink03"];
$featured03Cat = featured('category', $featured03Link);
$featured03Title = featured('title', $featured03Link);




//Main Article
$mainArticleLink = $_POST["articleLink"];
$mainArticleTitle = $_POST["articleTitle"];
$mainArticleText = $_POST["articleText"];


//Trending

$trending01Link = $_POST["trendingLink01"];
$trending01Cat = featured('category', $trending01Link);
$trending01Title = featured('title', $trending01Link);


$trending02Link = $_POST["trendingLink02"];
$trending02Cat = featured('category', $trending02Link);
$trending02Title = featured('title', $trending02Link);


$trending03Link = $_POST["trendingLink03"];
$trending03Cat = featured('category', $trending03Link);
$trending03Title = featured('title', $trending03Link);





//Best of the Rest

$best01Link = $_POST["bestLink01"];
$best01Cat = 'AGILE';
$best01Title = featured('title', $best01Link);

$best02Link = $_POST["bestLink02"];
$best02Cat = 'APP DEV';
$best02Title = featured('title', $best02Link);

$best03Link = $_POST["bestLink03"];
$best03Cat = 'DEVOPS';
$best03Title = featured('title', $best03Link);

$best04Link = $_POST["bestLink04"];
$best04Cat = 'PERFORMANCE';
$best04Title = featured('title', $best04Link);

$best05Link = $_POST["bestLink05"];;
$best05Cat = 'QUALITY';
$best05Title = featured('title', $best05Link);

$best06Link = $_POST["bestLink06"];;
$best06Cat = 'TRENDS';
$best06Title = featured('title', $best06Link);


$comingTitle = $_POST["comingTitle"];
$comingText = $_POST["comingText"];


?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Newsletter</title>
</head>

<body>
<table style="background:#c5c5c5; width:100%; height:100%; text-decoration:none;" border="0" cellpadding="0" cellspacing="0" align="center">
	<tbody>
		<tr align="center">
			<td align="center">
			<table style="border-collapse: collapse;" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
				<tbody><!--seeonbrowser-->
					<tr>
						<td style="background:#c5c5c5;" height="41">
						<table border="0" cellpadding="0" cellspacing="0" width="600">
							<tbody>
								<tr>
									<td class="" width="31">&nbsp;</td>
									<td class="" width="412"><a href="%%view_online%%" style="font-family: Arial; font-size: 11px;  text-decoration:none;color: #222222;" target="_blank">View in Browser</a></td>
									<td class="" width="59"><img alt="Follow Us" src="html_template-assets/a-followus.png" style="display:block;" height="41" width="59"></td>
									<td class="" width="21"><a href="https://twitter.com/techbeaconcom" target="_blank"><img alt="Twitter" src="html_template-assets/a-twitter.png" style="display:block;" height="41" width="21"></a></td>
									<td class="" width="19"><a href="https://www.linkedin.com/company/6403814" target="_blank"><img alt="Linkedin" src="html_template-assets/a-linkedin.png" style="display:block;" height="41" width="19"></a></td>
									<td class=""><a href="http://feeds.feedburner.com/techbeacon/rss" target="_blank"><img alt="RSS Feed" src="html_template-assets/a-rss.png" style="display:block;" height="41" width="19"></a></td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<!--seeonbrowser--><!--header-->
					<tr>
						<td style="background:#333333;" height="99">
						<table border="0" cellpadding="0" cellspacing="0" width="600">
							<tbody>
								<tr>
									<td class="" width="41">&nbsp;</td>
									<td class="" width="374"><a href="http://www.techbeacon.com" target="_blank"><img alt="TechBeacon" src="html_template-assets/b-logo.png" style="display:block;" height="99" width="187"></a></td>
									<td class=""><img alt="Best of the Week" src="html_template-assets/b-bestoftheweek.png" height="12" width="150"></td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<!--header--><!--featured-->
					<tr height="374">
						<td style="background:#fff;" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="600"><!--title-->
							<tbody>
								<tr style="display:block; padding-top:61px;">
									<td>
									<table border="0" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td class="" width="48">&nbsp;</td>
												<td class=""><img alt="Featured Articles" src="html_template-assets/c-featured-articles.png" style="display:block;" height="41" width="156"></td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
								<!--title--><!--thumbs-->
								<tr>
									<td>
									<table border="0" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td class="" width="40">&nbsp;</td>
												<td class="" width="177"><a href="<?php echo $featured01Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("c-thumb1", $featured01Link) ?>" style="display:block;" height="109" width="166"></a></td>
												<td class="" width="177"><a href="<?php echo $featured02Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("c-thumb2", $featured02Link) ?>" style="display:block;" height="109" width="166"></a></td>
												<td class=""><a href="<?php echo $featured03Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("c-thumb3", $featured03Link) ?>" style="display:block;" height="109" width="166"></a></td>
											</tr>
											<tr style="font-family:Arial; color: #3a9cd7; font-size: 11px; font-weight: 700;" height="42">
												<td class="" width="40">&nbsp;</td>
												<td class=""><a href="<?php echo $featured01Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank"><?php echo $featured01Cat ?></a></td>
												<td class=""><a href="<?php echo $featured02Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank"><?php echo $featured02Cat ?></a></td>
												<td class=""><a href="<?php echo $featured03Link ?>" style="text-decoration:none;font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank"><?php echo $featured03Cat ?></a></td>
											</tr>
											<tr style="font-family:Arial; color: #767676; font-size: 13px; font-weight: 400;" valign="top">
												<td class="" width="40">&nbsp;</td>
												<td class="" width="177"><a href="<?php echo $featured01Link ?>" style="text-decoration:none;font-family:Arial, Helvetica, sans-serif;  color:#767676;" target="_blank"><?php echo $featured01Title ?></a></td>
												<td class="" width="177"><a href="<?php echo $featured02Link ?>" style="text-decoration:none;font-family:Arial, Helvetica, sans-serif;  color:#767676;" target="_blank"><?php echo $featured02Title ?></a></td>
												<td class="" width="177" height=""><a href="<?php echo $featured03Link ?>" style="text-decoration:none;font-family:Arial, Helvetica, sans-serif;  color:#767676;" target="_blank"><?php echo $featured03Title ?></a></td>
											</tr>
											
											
											
										</tbody>
									</table>
									</td>
								</tr>
								<!--thumbs-->
							</tbody>
						</table>
						</td>
					</tr>
					<!--featured--><!--article-->
					<tr>
						<td class="" style="background:#fff;" height="300"><br>
						<a href="<?php echo $mainArticleLink ?>" target="_blank"><img alt="Article Image" src="html_template-assets/d-article-image.jpg" style="display: block;" height="300" width="600"></a></td>
					</tr>
					<tr>
						<td height="290" style="background:#f7f7f7;">
						<table align="center" border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr style="display:block; position:relative; padding: 20px 0 14px 0;" width="500" valign="bottom">
									<td class="" style="font-family:Arial; font-weight:bold; font-size:20px; color:#000;" height="47"><a href="<?php echo $mainArticleLink ?>" style="text-decoration:none; color:#000000;" target="_blank"><?php echo $mainArticleTitle ?></a></td>
								</tr>
								<tr width="">
									<td class="" style="display:block; position:relative; padding: 0 0 30px 0; font-family:Arial; font-size:13px; line-height:17px; color:#4e4e4e" align="justify" width="500"><a href="<?php echo $mainArticleLink ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif;  color:#767676;" target="_blank"><?php echo $mainArticleText ?></a></td>
								</tr>
								<tr width="500">
									<td align="center">
									<table align="center" border="0" cellpadding="0" cellspacing="0">
										<tbody>
											<tr height="90" style="display:block; position:relative; padding: 0;">
												<td class="" pardot-data="" style="font-family: Arial; font-size: 13px; font-weight: bold; color: rgb(255, 255, 255); background: rgb(58, 156, 215) none repeat scroll 0% 0%;" align="center" height="41" bgcolor="#3a9cd7" width="166"><a href="<?php echo $mainArticleLink ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#FFFFFF;" target="_blank">KEEP READING</a></td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<!--article--><!--trending-->
					<tr>
						<td style="background:#fff;" height="327" valign="top">
						<table border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr height="123" valign="bottom">
									<td class="" width="43">&nbsp;</td>
									<td class=""><img alt="Trending" src="html_template-assets/e-trending.png" style="display:block;" height="16" width="126"><br>
									&nbsp;</td>
								</tr>
								<tr>
									<td class="" width="40">&nbsp;</td>
									<td class="" width="177"><a href="<?php echo $trending01Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("e-thumb1", $trending01Link) ?>" style="display:block;" height="109" width="166"></a></td>
									<td class="" width="177"><a href="<?php echo $trending02Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("e-thumb2", $trending02Link) ?>" style="display:block;" height="109" width="166"></a></td>
									<td class=""><a href="<?php echo $trending03Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("e-thumb3", $trending03Link) ?>" style="display:block;" height="109" width="166"></a></td>
								</tr>
								<tr style="font-family:Arial; color: #3a9cd7; font-size: 11px; font-weight: 700;" height="42">
									<td class="" width="40">&nbsp;</td>
									<td class=""><a href="<?php echo $trending01Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank"><?php echo $trending01Cat ?></a></td>
									<td class=""><a href="<?php echo $trending02Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank"><?php echo $trending02Cat ?></a></td>
									<td class=""><a href="<?php echo $trending03Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank"><?php echo $trending03Cat ?></a></td>
								</tr>
								<tr style="font-family:Arial; color: #767676; font-size: 13px; font-weight: 400;" valign="top">
									<td class="" width="40">&nbsp;</td>
                                    <td class="" width="177"><a href="<?php echo $trending01Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#767676;" target="_blank"><?php echo $trending01Title ?></a></td>
									<td class="" width="177"><a href="<?php echo $trending02Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#767676;" target="_blank"><?php echo $trending02Title ?></a></td>
									<td class="" width="177"><a href="<?php echo $trending03Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#767676;" target="_blank"><?php echo $trending03Title ?></a></td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					

					<tr>
						<td style="background:#fff;" height="617" valign="middle">
						<table border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr valign="bottom">
									<td class="" width="43">&nbsp;</td>
									<td class=""><img alt="Best of the Rest" src="html_template-assets/f-best.png" style="display:block;" height="20" width="193"><br>
									&nbsp;</td>
								</tr>
							</tbody>
						</table>

						<table border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td class="" width="40">&nbsp;</td>
									<td class="" width="177"><a href="<?php echo $best01Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("f-thumb1", $best01Link) ?>" style="display:block;" height="109" width="166"></a></td>
									<td class="" width="177"><a href="<?php echo $best02Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("f-thumb2", $best02Link) ?>" style="display:block;" height="109" width="166"></a></td>
									<td class=""><a href="<?php echo $best03Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("f-thumb3", $best03Link) ?>" style="display:block;" height="109" width="166"></a></td>
								</tr>
								<tr style="font-family:Arial; color: #3a9cd7; font-size: 11px; font-weight: 700;" height="42">
									<td class="" width="40">&nbsp;</td>
									<td class=""><a href="<?php echo $best01Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank"><?php echo $best01Cat ?></a></td>
									<td class=""><a href="<?php echo $best02Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank"><?php echo $best02Cat ?></a></td>
									<td class=""><a href="<?php echo $best03Link ?>" style="text-decoration:none; color:inherit;" target="_blank"><?php echo $best03Cat ?></a></td>
								</tr>
								<tr style="font-family:Arial; color: #767676; font-size: 13px; font-weight: 400;" valign="top">
									<td class="" width="40">&nbsp;</td>
									<td class="" width="177"><a href="<?php echo $best01Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#767676;" target="_blank"><?php echo $best01Title ?></a></td>
									<td class="" width="177"><a href="<?php echo $best02Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#767676;" target="_blank"><?php echo $best02Title ?></a></td>
									<td class="" width="177"><a href="<?php echo $best03Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#767676;" target="_blank"><?php echo $best03Title ?></a></td>
								</tr>
								<tr height="150" valign="bottom">
									<td class="" width="40">&nbsp;</td>
									<td class="" width="177"><a href="<?php echo $best04Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("f-thumb4", $best04Link) ?>" style="display:block;" height="109" width="166"></a></td>
									<td class="" width="177"><a href="<?php echo $best05Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("f-thumb5", $best05Link) ?>" style="display:block;" height="109" width="166"></a></td>
									<td class=""><a href="<?php echo $best06Link ?>" target="_blank"><img alt="Photo" src="<?php theThumb("f-thumb6", $best06Link) ?>" style="display:block;" height="109" width="166"></a></td>
								</tr>
								<tr style="font-family:Arial; color: #3a9cd7; font-size: 11px; font-weight: 700;" height="42">
									<td class="" width="40">&nbsp;</td>
									<td class=""><a href="<?php echo $best04Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6" target="_blank"><?php echo $best04Cat ?></a></td>
									<td class=""><a href="<?php echo $best05Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6" target="_blank"><?php echo $best05Cat ?></a></td>
									<td class=""><a href="<?php echo $best06Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank"><?php echo $best06Cat ?></a></td>
								</tr>
								<tr style="font-family:Arial; color: #767676; font-size: 13px; font-weight: 400;" valign="top">
									<td class="" width="40">&nbsp;</td>
									<td class="" width="177"><a href="<?php echo $best04Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#767676;" target="_blank"><?php echo $best04Title ?></a></td>
									<td class="" width="177"><a href="<?php echo $best05Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#767676;" target="_blank"><?php echo $best05Title ?></a></td>
									<td class="" width="177"><a href="<?php echo $best06Link ?>" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#767676;" target="_blank"><?php echo $best06Title ?></a></td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<!--bestofrest--><!--coming-->
					<tr>
						<td style="background:#fff;" height="404">
						<table height="255" border="0" cellpadding="0" cellspacing="0" style="text-align: center;">
							<tbody>
								<tr>
									<td class="" width="40">&nbsp;</td>
									<td bgcolor="#f7f7f7" width="520" style="text-align:center; margin:20px 0; position:relative;">
									<table style="text-align:center;">
										<tbody>
											<tr>
												<td class="" valign="bottom" width="480" height="110"><img alt="Coming Up Next Week" src="html_template-assets/g-coming.png" height="62" width="93"></td>
                                            </tr>
                                            <tr>				
												<td class="" height="56" valign="top" style="text-align:center;">
                                                    <p style="font-family:Arial; font-size:14px; font-weight:bold; color:#666"><?php echo $comingTitle ?></p>
                                                    <p style="font-family:Arial; font-size:12px; color:#9c9c9c; display:relative; margin:20px 50px 40px 50px; line-height:18px; text-align:justify;"><?php echo $comingText ?></p>
												
												</td>
											</tr>
										</tbody>
									</table>
									</td>
									<!--gray-box-->
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<!--coming--><!--contribuitor-->
					
					<tr>
						<td style="background:#ececec;" height="206">
						<table align="center" border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr style="display:block; position:relative; padding: 20px 0 1px 0;" width="500" align="center" valign="bottom">
									<td class="" style="font-family:Arial; font-weight:bold; font-size:13px; color:#7f7f7f; text-transform:uppercase;" height="47">Become a contributor on TechBeacon</td>
								</tr>
								<tr width="">
									<td class="" style="display:block; position:relative; padding: 0 0 20px 0; font-family:Arial; font-size:12px; color:#7f7f7f" align="center" width="500">Are you an expert? Join our exclusive contributor network today.</td>
								</tr>
								<tr width="500">
									<td align="center">
									<table align="center" border="0" cellpadding="0" cellspacing="0">
										<tbody>
											<tr height="96" style="display:block; position:relative; padding: 0;">
												<td class="" style="font-family:Arial; font-size:13px; font-weight:bold; color:#fff;" align="center" height="41" bgcolor="#3a9cd7" width="166"><a href="http://techbeacon.com/write" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#ffffff" target="_blank">APPLY TODAY</a></td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<!--contribuitor--><!--footer-->
					<tr style="background:#333;" height="202">
						<td>
						<table>
							<tbody>
								<tr>
									<td style="padding-left:59px; width:291px;">
									<table border="0" cellpadding="0" cellspacing="0">
										<tbody>
											<tr height="42" valign="top">
												<td class=""><a href="http://www.techbeacon.com" target="_blank"><img alt="TechBeacon" src="html_template-assets/h-logo.png" style="display:block;" height="24" width="137"></a></td>
											</tr>
											<tr style="display:block; padding:0 0 0 5px">
												<td class=""><a href="https://twitter.com/techbeaconcom" target="_blank"><img alt="Twitter" src="html_template-assets/h-twitter.png" height="21" width="25"></a><a href="https://www.linkedin.com/company/6403814" target="_blank"><img alt="Linkedin" src="html_template-assets/h-linkedin.png" height="21" width="28"></a><a href="http://feeds.feedburner.com/techbeacon/rss" target="_blank"><img alt="RSS Feed" src="html_template-assets/h-rss.png" height="21" width="19"></a></td>
											</tr>
											<tr style="display:block; font-family:Arial; font-size:10px; color:#888888; padding:4px 0 18px 4px;">
												<td class="">Copyright � 2015 TechBeacon<br>
												All rights reserved.</td>
											</tr>
											<tr style="display:block; padding:0 0 0 4px;">
												<td class=""><img alt="Brought to you by HP" src="html_template-assets/h-hp.png" style="display:block;" height="21" width="125"></td>
											</tr>
										</tbody>
									</table>
									</td>
									<!--Left-collumn-->
									<td>
									<table border="0" cellpadding="0" cellspacing="0">
										<tbody>
											<tr style="font-family:Arial; font-size:13px; color:#fff; font-weight:bold; text-transform:uppercase;">
												<td class="" colspan="2">Articles Categories</td>
											</tr>
											<tr>
												<td class="" width="100">
												<ul style="list-style:none; font-family:Arial; font-size:13px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#0096d6; padding:0 20px 0 0">
													<li><a href="http://techbeacon.com/agile" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank">Agile</a></li>
													<li><a href="http://techbeacon.com/app-dev" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank">App Dev</a></li>
													<li><a href="http://techbeacon.com/devops" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank">DevOps</a></li>
													<li><a href="http://techbeacon.com/mobile" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank">Mobile</a></li>
												</ul>
												</td>
												<td class="" valign="top">
												<ul style="list-style:none; font-family:Arial; font-size:13px; font-weight:bold; color:#3a9cd7; padding:0 20px 0 0">
													<li><a href="http://techbeacon.com/performance" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank">Performance</a></li>
													<li><a href="http://techbeacon.com/quality" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank">Quality</a></li>
													<li><a href="http://techbeacon.com/trends" style="text-decoration:none; font-family:Arial, Helvetica, sans-serif; color:#0096d6;" target="_blank">Trends</a></li>
												</ul>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<!--footer--><!--unsubscribe-->
					<tr style="background:#c5c5c5; font-family: Arial; font-size: 11px; color: #222222;" height="41">
						<td colspan="3">
						<table>
							<tbody>
								<tr>
									<td class="" width="30">&nbsp;</td>
									<td class="" pardot-data="" style="font-size: 10px;" width="460">
									<p style="font-family: Helvetica; font-size: 11px; font-family:Arial, Helvetica, sans-serif; line-height: 22px; color: #000000; text-decoration:none;" target="_blank">1140 Enterprise Way Sunnyvale, CA 94089</p>
									</td>
									<td class="" style="text-decoration: underline;"><a href="%%unsubscribe%%" style="font-family: Helvetica; font-size: 11px; font-family:Arial, Helvetica, sans-serif; line-height: 22px; color: #000000; text-decoration:none;" target="_blank;">Unsubscribe</a></td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<!--unsubscribe-->
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>