# GitHub Rollback Procedure
1. Notify all members to stop working on the repository.
2. Branch a copy of the affected branch so that you do not loose any changes.
3. Now checkout the affected branch using the command below change the ```<branch>``` for the name of the affected branch.
```
git checkout <branch>
```
4. Once you have checked out the affected branch you will need to change your local head for the affected branch to roll it back. The command below will allow you to do this, make sure you change the ```<commit id>``` to the id of the commit you would like to roll back to. Further information can be found here [Stack Overflow Link.](https://stackoverflow.com/questions/1616957/how-do-you-roll-back-reset-a-git-repository-to-a-particular-commit)
  ```
  git reset --hard <commit id>
  ```
5. Now you need to force the change back to the remote, in our case this is GitHub. This is done using the command below, make sure you change the ```<commit id>``` to the same one used in step 4. You will also need to change the ```<branch>``` to the name of the affected branch. Further details can be found here [Stack Overflow Link.](https://stackoverflow.com/questions/1270514/undoing-a-git-push)
  ```
  git push -f origin <commit id>:<branch>
  ```
6. The final step is to notify all team members to delete there local copy of the repository and then clone the repository again after steps 1-5 have been completed.
