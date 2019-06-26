import os
import requests
from tqdm import tqdm
import time

files = os.listdir("codeShare\\files")
if(len(files) > 0):
    fileNames = list(map(str.strip,list(open("codeShare\\status","r"))))
    repo = fileNames[0]
    fileNames.remove(repo)
    fileNames = str(fileNames)[1:-1]
    fileNames = fileNames.replace("'","")
    fileNames = fileNames.replace(" ","")
    versionData = {"repo":repo.split("-")[1],"files": fileNames}
    resp = requests.post("http://35.197.157.4/cloudShare/pushFileNames.php",data=versionData)
    
    version = resp.content
    
    uploadFiles = fileNames.split(',')

    keys = list(map(str.strip,list(open("codeShare\\keys","r"))))
    commits = list(map(str.strip,list(open("codeShare\\commits","r"))))
    keys.remove(repo)
    commits.remove(repo)

    for i in tqdm(range(0,len(uploadFiles))):
        fileData = {"name":uploadFiles[i],"key":keys[i],"message":commits[i],"repo":repo.split("-")[1],"version":version}
        upFile = {"file": open("codeShare\\files\\"+uploadFiles[i],"rb")}
        resp = requests.post("http://35.197.157.4/cloudShare/pushFiles.php",data=fileData,files=upFile)
        upFile['file'].close()
        os.unlink("codeShare\\files\\"+uploadFiles[i])
        
        

    print("Latest Commit Uploaded Successfully.")

