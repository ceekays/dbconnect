# DBConnect (v 1.0.0)#

by Edmond Kachale (kachaleedmond@gmail.com)

## Introduction ##
DBConnect is an Object Relational Mapping (Active Record) Library for PHP.

According to [Wikipedia](http://en.wikipedia.org/wiki/Active_record_pattern):
> Active record is an approach to access data in a database. A database table
> or view is wrapped into a class, thus an object instance is tied to a single
> row in the table. After creation of an object, a new row is added to
> the table upon save. Any object loaded gets its information from the
> database; when an object is updated, the corresponding row in the table is
> also updated. The wrapper class implements accessor methods or properties for
> each column in the table or view.

This library is primarily inspired ActiveRecord in Ruby on Rails (RoR). It started as
a simple hack when I missed RoR's ActiveRecord in PHP. It is not a pure replica
but something that would make your life easier if you love ActiveRecord like me.

In addition, I have used basic Object Oriented PHP concepts so that it becomes
very handy even to a PHP newbie.

## Supported Database Systems ##

- MySQL

The following will be supported as this library is still under development:
- SQLite
- MSSQL
- PostgreSQL

## Requirements ##

- PHP 5+
- PDO drivers

# Supported Features ##

- Finder methods (e.g. find, find_by_sql, find_all_by_sql)
- Dynamic finder methods (e.g. find_by, find_all_by, find_last_by, find_or_create_by, count_by)
- Writer methods (e.g. create, save, delete, remove)

### Setup ##

Setup is very simple. (To be expanded later.)

## Sample CRUD Operations ##

  class User extends DBConnect{
    // your methods here
  }

  # finding using finders
  $user = User::find(1);
	echo $user->username;  'ceekays'

	# finding using dynamic finders
	$user = User::find_by_username('ceekays');
	$user = User::find_by_lastname_and_id('ceekays',1);

	# finding using a conditions array
	$users = User::find('all',
	                    array("where" => array("user_id = :id AND username = :user_name AND email = :email_address",
	                           array(':id' => 3, ':user_name' => 'ceekays', ':email_address' => 'email@example.com')));

  # creating a record
  $user = new User();
  $user->username   = 'ceekays';
  $user->first_name = 'Edmond';
  $user->save();

*Enjoy!*
