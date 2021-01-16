# this isn't perfect, especially the whois info

import sys
import subprocess

# get domain name from command line
domain = sys.argv[1]

# run whois search using domain
text = subprocess.run(
  ["whois", domain], check=True, stdout=subprocess.PIPE, universal_newlines=True)

# convert whois output to string
output = text.stdout
str_out = str(output)
    
# show domain registrar text in whois output
regis = "Registrar: "
showReg = str_out.find(regis)
if showReg == -1:
    print("Registrar: not found <br><br>")
else:
    print(str_out[showReg: showReg + 28] + " <br><br>")

# show domain registrar url text in whois output
regurl = "Registrar URL: "
showRegURL = str_out.find(regurl)
if showRegURL == -1:
    print("Registrar URL: not found <br><br>")
else:
    print(str_out[showRegURL: showRegURL + 40] + " <br><br>")
    
# show domain status text in whois output
status = "Domain Status: "
showStatus = str_out.find(status)
if showStatus == -1:
    print("Domain Status: not found <br><br>")
else:
    print(str_out[showStatus: showStatus + 40] + " <br><br>")

# show domain creation date
creation = "Creation Date: "
showCreation = str_out.find(creation)
if showCreation == -1:
    print("Creation Date: not found <br><br>")
else:
    print(str_out[showCreation: showCreation + 25] + " <br><br>")
    
# show domain expiration date
expdate = "Registration Expiration Date: "
showExp = str_out.find(expdate)
if showExp == -1:
    expdate2 = "Expiry Date: "
    showExp2 = str_out.find(expdate2)
    if showExp2 == -1:
        print("Expiry Date: not found <br><br>")
    else:
       print(str_out[showExp2: showExp2 + 23] + " <br><br>") 
else:
    print(str_out[showExp: showExp + 40] + " <br><br>")
    
# show domain nameservers
d_ns = "Name Server: "
showNS = str_out.find(d_ns)
if showExp == -1:
    print("Name Server: not found <br><br>")
else:
    print(str_out[showNS: showNS + 73] + " <br><br>")
    
