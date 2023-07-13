# resume-tracker
<p> This is a simple resume tracking application that is built using HTML, JS and backend authenticated using PHP and MySQL.</p>
<p>So, after submitting the relevant details, the data is stored in the locally created database and can be retrieved too.</p>

commands that can be helpful:
<ul>
  <li>create database dbname;</li>
  <li>use dbname;</li>
  <li> create table tablename(id int primary key auto_increment, first_name varchar(50), last_name varchar(50), date_of_birth date, father_name varchar(50), mother_name varchar(50), qualification varchar(100), email varchar(100), phone varchar(20), resume blob not null)</li>
  <li>insert into tablename(id, first_name, last_name, date_of_birth, father_name, mother_name, qualification, email, phone, resume)  values(12,'','', '', '', '', '', '', '');</li>
</ul>

The login is authenticated using PHP, in order to run, you can define your available port number, and run it using

<em>php -S localhost:'portno'</em>

<strong>P.S - You need to make changes in the name of the db and password, along with server name, and change it according to your locally created db(MYSQL is usually preferred).</strong>

