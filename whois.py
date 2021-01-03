# This script parses whois for the most useful data

import sys
import subprocess

# get domain name from command line
domain = sys.argv[1]

# run whois search using domain
text = subprocess.run(
  ["whois", domain], check=True, stdout=subprocess.PIPE, universal_newlines=True)

# convert whois output to string
output = str(text.stdout)

# show domain status text in whois output
status = "Domain Status: "
showStatus = output.find(status)
if showStatus == -1:
    print("Domain Status: not found <br>")
else:
    print(output[showStatus: showStatus + 40] + " <br>")

# show domain registrar text in whois output
regurl = "Registrar URL: "
showRegURL = output.find(regurl)
if showRegURL == -1:
    print("Registrar URL: not found <br>")
else:
    print(output[showRegURL: showRegURL + 40] + " <br>")

# show domain creation date
creation = "Creation Date: "
showCreation = output.find(creation)
if showCreation == -1:
    print("Creation Date: not found <br>")
else:
    print(output[showCreation: showCreation + 25] + " <br>")

