Add this cron entry to server to run scheduler
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1