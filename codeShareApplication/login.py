import getpass
import urllib.request

f = open("C:\\Windows\\System32\\codeShare\\userLogin.txt", "r")
status = f.readline()
ide = f.readline()
name = f.readline()
f.close()
if(status == "loggedin\n"):
    print("You Are Already Logged In.")
    print("Welcome, "+name)
else:
    username = input("Enter Uername:")
    password = getpass.getpass("Enter Password:")

    response = urllib.request.urlopen("http://35.197.157.4/cloudShare/login.php?username="+username+"&password="+password).read()
    response = response.decode("utf-8")
    if(response != "e"):
        print("Logged In Successfully")
        f = open("C:\\Windows\\System32\\codeShare\\userLogin.txt", "w")
        f.write("loggedin\n")
        creds = response.split("-")
        f.write(creds[0]+"\n")
        f.write(creds[1])
        f.close()
    else:
        print("Username or password is incorrect.")