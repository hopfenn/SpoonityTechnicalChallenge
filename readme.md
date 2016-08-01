Live Demo:
https://zenon-c.net/Spoonity/index.php 

To set up the database:
- Run the database script included in the 'zenosilv_spoonity.sql' file.
- In dataLayer/dbAccess.class.php enter the connection information for the database:
    - private $dbHost = "host";
    - private $dbUser = "user";
    - private $dbPassword = "password";
    - private $dbName = "database name";
    
- For security reasons, store the dbAccess.class.php file above the root www folder 
