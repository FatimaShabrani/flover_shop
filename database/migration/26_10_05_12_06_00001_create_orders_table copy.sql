-- if not exists
if not exists (select * from information_schema.tables where table_name = 'orders') then
    create table orders (
        id int primary key auto_increment,
        user_id int not null,
        product_id int not null,
        quantity int not null,
        total_price decimal(10, 2) not null,
        created_at timestamp not null default current_timestamp,
        updated_at timestamp not null default current_timestamp on update current_timestamp,
    );
end if;



