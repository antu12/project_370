<?php 

	//Database Constabts

	//Those are called ternary operator 
	//It means if db host is defined then set it to null
	// if not then define it
	// Other way to do is use if statement
	//if(!defined(db_host)) define(...)
	defined("DB_HOST") ? null: define("DB_HOST", "localhost");
	defined("DB_USER") ? null: define("DB_USER", "root");
	defined("DB_PASS") ? null: define("DB_PASS", "");
	defined("DB_NAME") ? null: define("DB_NAME", "391project");





 ?>