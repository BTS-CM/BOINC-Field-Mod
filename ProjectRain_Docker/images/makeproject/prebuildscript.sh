docker-compose down -v
chmod +x postbuild.py
cd boinc/
unzip boinc.zip
cd html/
# rm -rf project.sample
cd ../../preCompileReplace/
cp -Rf * ../boinc/
cd ../boinc/
chmod -R +x *
cd html/
# mv project/ project.sample/
cd ../../boinc2docker/
chmod -R +x *
cd /home/root/project-rain-site/ProjectRain_Docker/
docker-compose up -d --build