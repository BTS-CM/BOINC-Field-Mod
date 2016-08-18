USE ProjectRain;
#Replace /XML/ with the exact path to the xml files.
LOAD XML LOCAL INFILE '/XML/ExampleProject.xml' REPLACE INTO TABLE ExampleProject ROWS IDENTIFIED BY ''; 