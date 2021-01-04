<html>
    <head>
        <meta charset="utf-8">
	<title>Domain Info Tool</title>"

	<link rel="stylesheet" media="screen" href="styles.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Ryan Willis">
	<meta name="description" content="Domain information related to hosting and performance.">
	
<style>
* {
  box-sizing: border-box;
}

.pagelayout{
  margin:auto;
  width: 910px;
}

.box {
  float: left;
  width: 50%;
  padding: 25px;
}

.box2 {
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
<body class="pagelayout" id="TopOfPage">
<div class="clearfix">
<!-- Begin left Column Data -->
<div class="box" style="background-color:#eee"> 
<h1>
    
<?php $name = $_GET["domain_name"]; 
echo system("PATH=$PATH:/scripts:/opt/dedrads:/opt/dedrads/extras:/opt/tier1adv/bin:/opt/tier1adv/python:/root; export PATH;");
?>

Information for <?php $dname = system("python test.py $name"); ?><br></h1>

<a href="https://stackevolve.org" style="color: #c7ab1c;"><< Home</a><br>


<br>
<strong>Dig A Record(s):</strong> <?php 
$arecords = system("dig a $dname +short"); ?> <br>

<strong>Host:</strong> <?php 
system("host $arecords"); ?> <br>

<strong>Dig NS:</strong> <?php 
system("dig ns $dname +short");  ?> <br>

<strong>Dig MX:</strong> <?php 
system("dig mx $dname +short"); ?> <br>

<strong>Dig TXT:</strong> <?php 
system("dig txt $dname +short"); ?> <br>
<br>
<strong>Check DNS Propagation:</strong> 
<?php echo "<a href='https://dnschecker.org/#TXT/$dname' target='_blank'>DNS Checker</a>"; ?><br>

<strong>Check DNS Propagation #2:</strong> 
<?php echo "<a href='https://www.whatsmydns.net/#TXT/$dname' target='_blank'>What's my DNS?</a>"; ?><br>

<strong>Check domain DKIM:</strong> 
<?php echo "<a href='https://www.dmarcanalyzer.com/dkim/dkim-check/?dmarcdns[type]=dkim&dmarcdns[selector]=default&dmarcdns[domain]=$dname' target='_blank'>Check DKIM</a>"; ?><br>

<strong>Past domain DNS info:</strong> 
<?php echo "<a href='https://securitytrails.com/domain/$dname/history/a' target='_blank'>View Historical DNS</a>"; ?>
<br>
<strong>Black List Check:</strong> 
<?php echo "<a href='http://multirbl.valli.org/lookup/$dname.html' target='_blank'>DNS Block List Check</a>"; ?><br>

<strong>Security Scan:</strong> 
<?php echo "<a href='https://sitecheck.sucuri.net/?scan=$dname' target='_blank'>Sucuri.net Quick Scan</a>"; ?><br>

<strong>What CMS is site using?:</strong> 
<?php echo "<a href='https://whatcms.org/?s=$dname' target='_blank'>Detect CMS</a>"; ?><br>

<strong>What do people see around the world?:</strong> 
<?php echo "<a href='https://geopeeker.com/fetch/?url=$dname' target='_blank'>Geopeeker</a>"; ?><br>
<br>
<strong>Other (will not auto use domain):</strong><br>
<strong>Speed Test:</strong> <a href='https://gtmetrix.com/' target='_blank'>GTmetrix Homepage</a><br>

<strong>Search Support Guides:</strong> <a href='https://www.inmotionhosting.com/support/' target='_blank'>InMotion Support Center</a><br>

<strong>SSL Check:</strong> <a href='https://whynopadlock.com/' target='_blank'>Why no padlock?</a><br>

<strong>MxToolBox:</strong> <a href='https://mxtoolbox.com/' target='_blank'>MxToolBox.com</a><br>
<br><br>
</div>
	
	
<!-- Begin Right Column Whois Data -->	
<div class="box2" style="background-color:#ccc;">
    
    			<h3>Lookup a different domain:</h3>
			<form action="domains.php" method="get">
			Domain Name: <input type="text" name="domain_name">
			<input type="submit" value="Submit">
			</form> <br>
			
	<h2 style="color:#15a757; margin-left:80px;">WHOIS:</h2> <div style="max-width: 400px; margin:auto;"><br>
	<?php system("python3 whois.py $dname"); ?>
	<br>
    <br>
<a href="index.php" strong style="text-align: center;"><< Go back Home</a>
</div></div><br>
</div>

</body>
</html> 
