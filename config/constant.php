<?php

    date_default_timezone_set("Africa/Lagos");

    //Local host
    define("DB_HOST", "db4free.net");
    define("DB_USER", "emmar_204");
    define("DB_PASSWORD", "emma1994204");
    define("DB_NAME", "rabbit_project1");

    //Local host
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "rabit_project");

    // Mailer
    define("EMAIL", "emma1994204@gmail.com");
    define("EMAIL_PASSWORD", "Emma1994204");
    
    /**
     * Database Table Constants - these constants
     * hold the names of all the database tables used
     * in the script.
     */
    define("TBL_USERS", "user");
    define("TBL_CATEGORY", "category");
    define("TBL_STATE", "current_state");
    define("TBL_TEMPORARY_TABLE", "user_temporary_table");
    define("TBL_NOTIFICATION", "task_update_notification");


?>