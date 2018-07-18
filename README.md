# DISCUZZION- a platform to discuss anything & everything you feel like 

Setup procedure:  
1. Clone the repo in local machine.  
2. Set up the database with the discuzzion.sql in the database directory.  
3. Replace "dummyusername" with your MySQL server root name in database.php   
4. Replace "dummypassword" with your corresponding password in database.php  
5. Set up the server.  
6. You are done!!  
7. Enjoy discuzzing any random topic you feel like!




After setting up the database if you find any problem in running the application, just add the line    
sql_mode="ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"  

inside file:  
/etc/mysql/mysql.conf.d/mysqld.cnf  

then  
sudo service mysql restart  


