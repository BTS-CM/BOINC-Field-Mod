echo 'deb http://ftp.debian.org/debian jessie-backports main' > /etc/apt/sources.list.d/letsencrypt.list
apt-get update
apt-get update
apt-get update
apt-get update
apt-get update
apt-get install -y python-certbot-apache -t jessie-backports
certbot --apache --email email@address.co.uk --agree-tos -d project-rain.co.uk -d www.project-rain.co.uk