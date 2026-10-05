-- if not exists
if not exists (select * from information_schema.tables where table_name = 'products') then
    create table products (