#!/bin/bash

echo -e "linode.joshuataylor.co MySQL Backup Script"

# Need to set up a timestamp here, then put into cron.

drush @on sql-dump /var/www/backups/on.joshuataylor.co
