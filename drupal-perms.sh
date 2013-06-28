chown -R joshuataylor:apache .
find . -type d -exec chmod u=rwx,g=rx,o= '{}' \;
find . -type f -exec chmod u=rw,g=r,o= '{}' \;
chmod g-w sites/default/settings.php
find . -type d -name files -exec chmod ug=rwx,o= '{}' \;
for d in ./sites/default/files
do
   find $d -type d -exec chmod ug=rwx,o= '{}' \;
   find $d -type f -exec chmod ug=rw,o= '{}' \;
done
