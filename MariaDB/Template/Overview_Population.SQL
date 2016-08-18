#Currently this only populates a single crypto's magnitude!

#Project1
UPDATE Overview, Project1_user 
SET Project1_Mag_All = (Project1_user.expavg_credit/(SELECT SUM(Project1_user.expavg_credit) AS Total_ExpAvg_Credit FROM Project1_user))*3382.352941176
WHERE Overview.cpid = Project1_user.cpid;

UPDATE Overview, Project1_user 
SET Project1_Mag_NN = (Project1_user.expavg_credit/(SELECT SUM(Project1_user.expavg_credit) AS Total_ExpAvg_Credit FROM Project1_user WHERE Project1_user.Address IS NOT NULL))*3382.352941176
WHERE Overview.cpid = Project1_user.cpid;

UPDATE Overview, Project1_user 
SET Overview.name = Project1_user.name
WHERE Overview.cpid = Project1_user.cpid;

UPDATE Overview, Project1_user 
SET Overview.country = Project1_user.country
WHERE Overview.cpid = Project1_user.cpid;

#Project2
UPDATE Overview, Project2_user 
SET Project2_Mag_All = (Project2_user.expavg_credit/(SELECT SUM(Project2_user.expavg_credit) AS Total_ExpAvg_Credit FROM Project2_user))*3382.352941176
WHERE Overview.cpid = Project2_user.cpid;

UPDATE Overview, Project2_user 
SET Project2_Mag_NN = (Project2_user.expavg_credit/(SELECT SUM(Project2_user.expavg_credit) AS Total_ExpAvg_Credit FROM Project2_user WHERE Project2_user.Address IS NOT NULL))*3382.352941176
WHERE Overview.cpid = Project2_user.cpid;

UPDATE Overview, Project2_user 
SET Overview.name = Project2_user.name
WHERE Overview.cpid = Project2_user.cpid;

UPDATE Overview, Project2_user 
SET Overview.country = Project2_user.country
WHERE Overview.cpid = Project2_user.cpid;


#Tallying ALL user's total magnitude across all whitelisted projects.
UPDATE Overview
SET TotalMag_All = Project1_Mag_All + Project2_Mag_All;

#Tallying total magnitude across all whitelisted projects for users present in Neural Network.
UPDATE Overview
SET TotalMag_NN = Project1_Mag_NN + Project2_Mag_NN
WHERE Overview.Address  IS NOT NULL;