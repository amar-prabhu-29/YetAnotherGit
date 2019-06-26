import os
from colorama import init,Fore,Style
init(convert=True)
files = []
tracked = []
untracked = []
##CHECK IF INITIALIZED
if(os.path.isfile("codeShare\\status")):
    ##TRACKED AND UNTRACHED FILES
    f = open("codeShare\\status","r")
    repo = f.readline()
    for codefile in f:
        files.append(codefile.rstrip())
    currentfiles = os.listdir()
    for cfile in currentfiles:
        if(cfile != "codeShare"):
            if(cfile in files):
                files.remove(cfile)
                tracked.append(cfile)
            else:
                untracked.append(cfile)
    print("-----------------------------------------------------------")
    print("File Status for Repository:"+repo)
    print()
    if(len(tracked) != 0):
        print(Fore.BLUE +"##### TRACKED FILES #####")
        for i in tracked:
            print(Fore.GREEN +"->"+i)
        print("\n")
    print(Style.RESET_ALL)

    if(len(untracked) != 0):
        print(Fore.BLUE +"##### UNTRACKED FILES #####")
        for i in untracked:
            print(Fore.RED+"->"+i)
    print(Style.RESET_ALL)

    print("\n")
    if(len(files) != 0):
        print(Fore.BLUE +"##### DELETED FILES #####")
        for i in files:
            print(Fore.RED+"->"+i)
    print(Style.RESET_ALL)

    print("-----------------------------------------------------------")
else:
    print(Fore.RED+"This Repository is Uninitialized. Please Initialize the repository first.")
