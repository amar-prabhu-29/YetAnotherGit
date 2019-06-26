import requests

fileNames = list(map(str.strip,list(open("codeShare\\status","r"))))
repo = fileNames[0].split('-')
repository = repo[1]
print("Sharing Repository With ID "+repository)
user = input("Enter Username To Share With:")

data = {'repo':repository,'user':user}
resp = requests.post("http://35.197.157.4/cloudShare/share.php",data=data)

print(str(resp.text))