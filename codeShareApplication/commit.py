import os
import hashlib 
from colorama import init,Fore,Style
from shutil import copyfile
init(convert=True)
changesMade = False
if(os.path.isfile("codeShare\\status")):
    message = input("Enter Commit Message:")


    files = list(map(str.strip,list(open("codeShare\\status","r"))))
    keys = list(map(str.strip,list(open("codeShare\\keys","r"))))
    commits = list(map(str.strip,list(open("codeShare\\commits","r"))))
    repo = files[0]
    files.remove(repo)
    keys.remove(repo)
    commits.remove(repo)

    curFiles = os.listdir()
    curFiles.remove("codeShare")

    changedFiles = []
    deleted = []
    for i in range(0,len(files)):
        if(os.path.isfile(files[i]) == False):
            deleted.append(i)
    for i in deleted:
        files.pop(i)
        keys.pop(i)
        commits.pop(i)
        changesMade = True
    
    for i in range(0,len(curFiles)):
        if(curFiles[i] in files):
            codeFile = open(curFiles[i],"r").read()
            key = hashlib.sha256(codeFile.encode()).hexdigest()
            if(key != keys[i]):
                keys[i] = key
                commits[i] = message
                changedFiles.append(curFiles[i])
                changesMade = True
        else:
            codeFile = open(curFiles[i],"r").read()
            key = hashlib.sha256(codeFile.encode()).hexdigest()
            files.append(curFiles[i])
            keys.append(key)
            commits.append(message)
            changedFiles.append(curFiles[i])
            changesMade = True

    f = open('codeShare\\status',"w+")
    f.write(repo+"\n")
    for i in files:
        f.write(i+"\n")
    f.close()

    f = open('codeShare\\keys',"w+")
    f.write(repo+"\n")
    for i in keys:
        f.write(i+"\n")
    f.close()

    f = open('codeShare\\commits',"w+")
    f.write(repo+"\n")
    for i in commits:
        f.write(i+"\n")
    f.close()

    if(changesMade):
        for i in files:
            if(os.path.isfile(i)):
                copyfile(i, 'codeShare\\files\\'+i)


    if(len(changedFiles) > 0):
        print(Fore.GREEN+"All Changes Committed Successfully.")
        print(Style.RESET_ALL)
        print("----------------------------------------------------")
        print(Fore.BLUE+"##### CHANGED FILES #####")
        for i in changedFiles:
            print(Fore.GREEN+"->"+i)
    else:
        print(Fore.BLUE+"No Changes To Commit.")
        if len(deleted) > 0:
            print("Deleted Files Committed Successfully.")
else:
    print(Fore.RED+"This repository is uninitialized. Please initialize this repository.")



