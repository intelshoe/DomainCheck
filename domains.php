<html>
    <head>
        <meta charset="utf-8">
	<title>Domain Info Tool</title>"

	<link rel="stylesheet" media="screen" href="styles.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Ryan Willis">
	<meta name="description" content="Domain information related to hosting and performance.">
	
	<script src="https://use.typekit.net/vzq4ipz.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>

	<!--[if lt IE 9]>
	<script src="script/html5shiv.js"></script>
	<![endif]-->
<style>
* {
  box-sizing: border-box;
}

.box {
  float: left;
  width: 50%;
  padding: 25px;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body>
<div class="clearfix">
<div class="box" style="background-color:#eee">    
<h1><?php $name = $_GET["domain_name"]; ?>
Domain Information for <?php echo $_GET["domain_name"]; 
echo system("PATH=$PATH:/scripts:/opt/dedrads:/opt/dedrads/extras:/opt/tier1adv/bin:/opt/tier1adv/python:/root; export PATH;") ?><br></h1>
<a href="index.php"><< Go back Home</a><br>
<br>
<strong>Dig A Record(s):</strong> <?php ini_set('display_errors', '1');
$arecords = system("dig a $name +short"); ?> <br>

<strong>Host on A Record:</strong> <?php ini_set('display_errors', '1');
system("host $arecords"); ?> <br>

<strong>Dig NS:</strong> <?php ini_set('display_errors', '1');
system("dig ns $name +short"); ?> <br>

<strong>Dig MX Record(s):</strong> <?php ini_set('display_errors', '1');
system("dig mx $name +short"); ?> <br>

<strong>Dig TXT Records:</strong> <?php ini_set('display_errors', '1');
system("dig txt $name +short"); ?> <br>
<br>
<strong>Check DNS Propagation:</strong> <?php echo "<a href='https://dnschecker.org/#TXT/$name' target='_blank'>DNS Checker</a>"; ?><br>

<strong>Check DNS Propagation #2:</strong> <?php echo "<a href='https://www.whatsmydns.net/#TXT/$name' target='_blank'>What's my DNS?</a>"; ?><br>

<strong>Check domain DKIM:</strong> <?php echo "<a href='https://www.dmarcanalyzer.com/dkim/dkim-check/?dmarcdns[type]=dkim&dmarcdns[selector]=default&dmarcdns[domain]=$name' target='_blank'>Check DKIM</a>"; ?><br>

<strong>Past domain DNS info:</strong> <?php echo "<a href='https://securitytrails.com/domain/$name/history/a' target='_blank'>View Historical DNS</a>"; ?><br>
<br>
<strong>Black List Check:</strong> <?php echo "<a href='http://multirbl.valli.org/lookup/$name.html' target='_blank'>DNS Block List Check</a>"; ?><br>

<strong>Security Scan:</strong> <?php echo "<a href='https://sitecheck.sucuri.net/?scan=$name' target='_blank'>Sucuri.net Quick Scan</a>"; ?><br>

<strong>What CMS is site using?:</strong> <?php echo "<a href='https://whatcms.org/?s=$name' target='_blank'>Detect CMS</a>"; ?><br>

<strong>Speed Test:</strong> <?php echo "<a href='https://gtmetrix.com/' target='_blank'>GTmetrix Homepage</a>"; ?><br>

<strong>What do people see around the world?:</strong> <?php echo "<a href='https://geopeeker.com/fetch/?url=$name' target='_blank'>Geopeeker</a>"; ?><br>
<br>
<iframe src="https://whynopadlock.com/" width="90%" height="800" style="border:1px solid black; margin-left:40px;">
</iframe>
<br><br>
<?php echo '<iframe src="https://mxtoolbox.com/" width="90%" height="800" style="border:1px solid black; margin-left:40px;">
</iframe> '; ?>
</div>
<div class="box" style="background-color:#ccc">
<strong>Full WHOIS info:</strong> <div style="max-width: 210px;"> <?php ini_set('display_errors', '1');
system("whois $name | awk '{print $0}'"); ?><br><br>
<a href="index.php" strong style="text-align: center;"><< Go back Home</a></div></div><br>
</div>

</body>
</html> 
