#TEMPLATE:
INSERT IGNORE into Overview (cpid)
SELECT Project_user.cpid
FROM Project_user;