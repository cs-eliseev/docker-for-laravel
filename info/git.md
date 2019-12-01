Git
======

Version control system


## Git install

1. Install Git on Ubuntu

    ```shell
    sudo apt-get update
    sudo apt-get -y install git
    ```

1. Check version
    ```shell
    git --version
    ``` 


## Configuring Git

1. Set Git user
    ```shell
    git config --global user.name "<user_name>"
    git config --global user.email "<user_email>"
    ```

1. Change git config
    ```shell
    vi ~/.gitconfig
    ```

    ```text
    ...
    [user]
      name = <user_name>
      email = <user_email>
    ...
    ```

1. View info git config
    ```shell
    git config --list
    ```


## Git multiple SSH Keys settings

1. Create ssh key

    ```shell
    ssh-keygen -t rsa -C "your_email@youremail.com"
    ```

1. Copy keys

    ```shell
    cp github_rsa_key ~/.ssh/github_rsa_key

    cp bitbucket_rsa_key ~/.ssh/bitbucket_rsa_key
    ```

1. Modify the ssh config

    ```shell
    vi config
    ```

    ```text
    #github account
    Host github
        HostName github.com
        User git
        IdentityFile ~/.ssh/github_rsa_key
    
    #bitbucket account
    Host bitbucket
        HostName bitbucket.com
        User git
        IdentityFile ~/.ssh/bitbucket_rsa_key
    ```

1. Modify git config

    ```shell
    git config user.name "github"
    git config user.email "github@gmail.com" 
    
    git config user.name "bitbucket"
    git config user.email "bitbucket@gmail.com"
    ```

1. Push source
    ```shell
    git add .
    git commit -m "your comments"
    git push
    ```

1. Clone source
    ```shell
    git clone github:<project_path>

    git clone bitbucket:<project_path>
    ```

## Git Commands

1. Clone git repository
    ```shell
    git clone <repository_path>
    ```

1. Update git repository
    ```shell
    git remote set-url origin <repository_path>
    ```

1. Get breanch list
    ```shell
    git branch
    ```

1. Get current change file
    ```shell
    git branch
    ```

1. Get change diff
    ```shell
    git diff
    ``

1. Add index all change
    ```shell
    git add *
    ``

1. Remove git index file (unset add file)
    ```shell
    git reset HEAD <file_name>
    ``

1. Commit change
    ```shell
    git commit -m "<text_comment>"
    ```

1. Revert commit
    ```shell
    git revert HEAD
    ```

1. Back commit
    ```shell
    git reset --hard @~1
    ```

1. Create new branch
    ```shell
    git checkout -b <branch_name>
    ```

1. Create local branch from remote branch
    ```shell
    git checkout --track -b <branch_name> origin/<branch_name>
    ```

1. Create remote branch
    ```shell
    git push -u origin <branch_name>
    ```

1. Push remote branch
    ```shell
    git push origin <current_branch_name>:<remote_branch_name>
    ```

1. Push force
    ```shell
    git push -f
    ```

1. Delete local branch
    ```shell
    git branch -D <branch_name>
    ```

1. Delete remote branch
    ```shell
    git push origin --delete <branch_name>
    ```

1. Get commit list info
    ```shell
    git log
    ```

1. Get commit list info inline
    ```shell
    git log --oneline
    ```

1. Get diff commit list
    ```shell
    git log -p
    ```

1. Revert push
    ```shell
    git push -f origin HEAD^:<branch_name>
    ```

1. Rollback commit
    ```shell
    git reset --hard <commit_hash>
    ```

1. Cancel commit unchanged
    ```shell
    git reset --soft <commit_hash>
    ```

1. Adding changes from another branch
    ```shell
    git checkout <branch_name_1>
    git rebase <branch_name_2>
    ```

1. Ignore file changes
    ```shell
    git rm --cached <file_name>
    ```

1. Add ignore change index file
    ```shell
    git update-index --assume-unchanged <file_name>
    ```

1. Unset ignore change index file
    ```shell
    git update-index --no-assume-unchanged <file_name>
    ```

1. Change text editor
	```shell
	git config --global core.editor "vim"
	```

1. Add remote upstream reposytory link
	```shell
	git remote add <remoute_local_name> <remoute_project_link>
	```

1. Pull remote upstream reposytory
	```shell
	git fetch <remoute_local_name>
	```

1. Update master remote upstream reposytory
	```shell
	git merge <remoute_local_name>/master
	```

1. Create pull-request upstream reposytory
	```shell
	git push --set-upstream origin <branch_name>
	```

## Case
1. Merge branch to master

    ```shell
    git checkout master
    git pull origin master
    git checkout <branch_name>
    git merge master
    git checkout master
    git merge <branch_name>
    git push origin master
    ```

1. Back commit remote repository

    ```shell
    git reset --hard @~1
    git push -f
    ```

1. Create pull request origin
    ```shell
    git remote add <upstream_name> <remote_repository_path>
    git fetch <upstream_name>
    git merge <upstream_name>/master
    git push --set-upstream origin <branch_name>
    ```

1. Pull local pull-request
    ```shell
    git fetch origin pull/<pull_request_id>/head:<branch_name>
    git checkout <branch_name>
    ``` 