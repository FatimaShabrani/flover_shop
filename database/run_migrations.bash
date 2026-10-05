# run all migrations
for file in $(ls database/migration/*.sql); do
    echo "Running $file"
    mysql -u root -p flover_shop -e "source $file"
done

# how to run this script
# ./database/run_migrations.bash