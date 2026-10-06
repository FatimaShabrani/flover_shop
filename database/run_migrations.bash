# run all migrations
for file in $(ls database/migration/*.sql); do
    echo "Running $file"
    /c/xampp/mysql/bin/mysql.exe -u root -p flover_shop_test -e "source $file"
done
echo "All migrations completed."
# how to run this script
# ./database/run_migrations.bash