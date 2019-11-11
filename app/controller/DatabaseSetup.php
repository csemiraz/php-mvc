<?php


namespace App\controller;


use App\models\DBQuery;
use App\models\ViewLoader;
use App\utilities\DynamicDBConfig;
use Route\Request;

class DatabaseSetup
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getDBForm()
    {

        if (DynamicDBConfig::checkEnv()) {
            return redirect('/');
        }

        return view('databaseSetup');
    }

    public function saveDBConfig()
    {

        if (!$this->request->get('database_name') || !$this->request->get('user_name') || !$this->request->get('password')) {
            return json('Please check required Fields', 419);
        }

        $configData = 'database=' . $this->request->get('database_name') . PHP_EOL;
        $configData .= 'user_name=' . $this->request->get('user_name') . PHP_EOL;
        $configData .= 'password=' . $this->request->get('password') . PHP_EOL;

        // generate env file
        DynamicDBConfig::createEnvFile($configData);
        flash("message", "Database configuration saved successfully");

     //   $this->migration();
        return redirect('/');

    }


    public function migration()
    {
        $DB = new DBQuery();
        $sql = "CREATE TABLE IF NOT EXISTS  `product_sell` (
                 `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                  `amount` int(10) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `buyer` varchar(255) COLLATE utf8mb4_unicode_ci  NOT NULL,
                  `receipt_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `items` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `buyer_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `buyer_ip` varchar(20) COLLATE utf8mb4_unicode_ci  DEFAULT NULL,
                  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
                  `city` varchar(20) COLLATE utf8mb4_unicode_ci  DEFAULT NULL,
                  `phone` varchar(20) COLLATE utf8mb4_unicode_ci  DEFAULT NULL,
                  `hash_key` varchar(255) COLLATE utf8mb4_unicode_ci  DEFAULT NULL,
                  `entry_at` date  DEFAULT NULL,
                  `entry_by` int(10)  NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

       return $DB->run($sql);

    }

}