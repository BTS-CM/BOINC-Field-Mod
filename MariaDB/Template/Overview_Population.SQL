#Currently this only populates a single crypto's magnitude!

#Project1
UPDATE Overview, Project1_user 
SET ExampleProject1_RAC_MAG = (Project1_user.expavg_credit/(SELECT SUM(Project1_user.expavg_credit) AS Total_ExpAvg_Credit FROM Project1_user WHERE Project1_user.bitshares_account IS NOT NULL))
WHERE Overview.cpid = Project1_user.cpid;

UPDATE Overview, Project1_user 
SET ExampleProject1_Historical_MAG = (Project1_user.total_credit/(SELECT SUM(Project1_user.total_credit) AS Total_Credit FROM Project1_user WHERE Project1_user.bitshares_account IS NOT NULL))
WHERE Overview.cpid = Project1_user.cpid;

UPDATE Overview, Project1_user 
SET Overview.name = Project1_user.name
WHERE Overview.cpid = Project1_user.cpid;

#Project2
UPDATE Overview, Project2_user 
SET ExampleProject2_RAC_MAG = (Project2_user.expavg_credit/(SELECT SUM(Project2_user.expavg_credit) AS Total_ExpAvg_Credit FROM Project2_user WHERE Project2_user.bitshares_account IS NOT NULL))
WHERE Overview.cpid = Project2_user.cpid;

UPDATE Overview, Project2_user 
SET ExampleProject2_Historical_MAG = (Project2_user.total_credit/(SELECT SUM(Project2_user.total_credit) AS Total_Credit FROM Project2_user WHERE Project2_user.bitshares_account IS NOT NULL))
WHERE Overview.cpid = Project2_user.cpid;

UPDATE Overview, Project2_user 
SET Overview.name = Project2_user.name
WHERE Overview.cpid = Project2_user.cpid;

#Tallying ALL user's total RAC magnitude across target projects.
UPDATE Overview
SET TotalRAC_MAG = ExampleProject1_RAC_MAG + ExampleProject2_RAC_MAG;

#Tallying ALL user's total historical RAC magnitude across target projects.
UPDATE Overview
SET TotalHistorical_MAG = ExampleProject1_Historical_MAG + ExampleProject2_Historical_MAG;