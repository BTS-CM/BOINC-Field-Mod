#Currently this only populates a single crypto's magnitude!

#Project1
UPDATE Overview, Project1_user 
SET ExampleProject1_Mag = (Project1_user.expavg_credit/(SELECT SUM(Project1_user.expavg_credit) AS Total_ExpAvg_Credit FROM Project1_user WHERE Project1_user.bitshares_account IS NOT NULL))
WHERE Overview.cpid = Project1_user.cpid;

UPDATE Overview, Project1_user 
SET Overview.name = Project1_user.name
WHERE Overview.cpid = Project1_user.cpid;

UPDATE Overview, Project1_user 
SET Overview.country = Project1_user.country
WHERE Overview.cpid = Project1_user.cpid;

#Project2
UPDATE Overview, Project2_user 
SET ExampleProject2_Mag = (Project2_user.expavg_credit/(SELECT SUM(Project2_user.expavg_credit) AS Total_ExpAvg_Credit FROM Project2_user WHERE Project2_user.bitshares_account IS NOT NULL))
WHERE Overview.cpid = Project2_user.cpid;

UPDATE Overview, Project2_user 
SET Overview.name = Project2_user.name
WHERE Overview.cpid = Project2_user.cpid;

UPDATE Overview, Project2_user 
SET Overview.country = Project2_user.country
WHERE Overview.cpid = Project2_user.cpid;


#Tallying ALL user's total magnitude across target projects.
UPDATE Overview
SET TotalMag_All = Project1_Mag + Project2_Mag;