#Initialization
import win32api
import win32con
import os
import hashlib
import requests

os.mkdir('codeShare')
win32api.SetFileAttributes('codeShare',win32con.FILE_ATTRIBUTE_HIDDEN)

os.mkdir('codeShare\\files')


repo = input("Enter Repository Name:")
desc = input("Enter Repository Description:")

repositoryData = {"repository":repo,"description": desc,"user":"amar"}
resp = requests.post("http://35.197.157.4/cloudShare/createRepository.php",data=repositoryData)
repoID = resp.content.decode("utf-8")

repo = repo +"-"+ repoID

f = open('codeShare\\status',"w+")
f.write(repo+"\n")
f.close()

f = open('codeShare\\commits',"w+")
f.write(repo+"\n")
f.close()

f = open('codeShare\\keys',"w+")
f.write(repo+"\n")
f.close()

print("Repository Successfully Initialised:"+repo)