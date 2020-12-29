<html>
<body>
<h1><?php $name = $_GET["domain_name"]; ?>
Domain Information for <?php echo $_GET["domain_name"]; 
echo system("PATH=$PATH:/scripts:/opt/dedrads:/opt/dedrads/extras:/opt/tier1adv/bin:/opt/tier1adv/python:/root; export PATH;") ?><br></h1>
<a href="index.php"><< Go back Home</a><br>
<br><br>
<strong>Dig A Record(s):</strong> <?php ini_set('display_errors', '1');
$arecords = system("dig a $name +short"); ?> <br>
<br>
<strong>Host on A Record:</strong> <?php ini_set('display_errors', '1');
system("host $arecords"); ?> <br>
<br>
<strong>Dig NS:</strong> <?php ini_set('display_errors', '1');
system("dig ns $name +short"); ?> <br>
<br>
<strong>Dig MX Record(s):</strong> <?php ini_set('display_errors', '1');
system("dig mx $name +short"); ?> <br>
<br>
<strong>Dig TXT Records:</strong> <?php ini_set('display_errors', '1');
system("dig txt $name +short"); ?> <br>
<br>
<strong>Full WHOIS info:</strong> <div style="max-width: 800px;"><br><?php ini_set('display_errors', '1');
system("whois $name"); ?></div><br>
<br>
<strong>Check DNS Propagation:</strong> <?php echo "<a href='https://dnschecker.org/#TXT/$name' target='_blank'>DNS Checker</a>"; ?><br>
<br>
<strong>Check DNS Propagation #2:</strong> <?php echo "<a href='https://www.whatsmydns.net/#TXT/$name' target='_blank'>What's my DNS?</a>"; ?><br>
<br>
<strong>Check domain DKIM:</strong> <?php echo "<a href='https://www.dmarcanalyzer.com/dkim/dkim-check/?dmarcdns[type]=dkim&dmarcdns[selector]=default&dmarcdns[domain]=$name' target='_blank'>Check DKIM</a>"; ?><br>
<br>
<strong>Past domain DNS info:</strong> <?php echo "<a href='https://securitytrails.com/domain/$name/history/a' target='_blank'>View Historical DNS</a>"; ?><br>
<br>
<strong>Black List Check:</strong> <?php echo "<a href='http://multirbl.valli.org/lookup/$name.html' target='_blank'>DNS Block List Check</a>"; ?><br>
<br>
<strong>Security Scan:</strong> <?php echo "<a href='https://sitecheck.sucuri.net/?scan=$name' target='_blank'>Sucuri.net Quick Scan</a>"; ?><br>
<br>
<strong>What CMS is site using?:</strong> <?php echo "<a href='https://whatcms.org/?s=$name' target='_blank'>Detect CMS</a>"; ?><br>
<br>
<strong>Speed Test:</strong> <?php echo "<a href='https://gtmetrix.com/reports/$name' target='_blank'>GTMETRIX</a>"; ?><br>
<br>
<strong>MXToolbox:</strong> <?php echo "<a href='https://mxtoolbox.com/SuperTool.aspx?action=mx%3a$name&run=toolpage' target='_blank'>MxToolBox</a>"; ?><br>
<br>
<strong>What do people see around the world?:</strong> <?php echo "<a href='https://geopeeker.com/fetch/?url=$name' target='_blank'>Geopeeker</a>"; ?><br>
</body>
</html> 