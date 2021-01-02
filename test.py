#!/usr/bin/env python
# -*- coding: utf-8 -*-
"""
Domain Parser

Ran from the command line like:
    python test.py domain_name_here.com

It tests the domain and cleans it up before returning the result.
"""


import sys

domain = sys.argv[1]
return_domain = ""

if len(domain) > 30:
    print("incorrect domain")
else:
    for char in domain:
        if char == ' ' :
            continue
        else:
            return_domain = return_domain + char

if return_domain[0:5] == "http:": 
    return_domain = return_domain[7:]
elif return_domain[0:6] == "https:":
    return_domain = return_domain[8:]


print(return_domain)
