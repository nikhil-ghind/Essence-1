<?php
session_start();

require_once(__DIR__."/requirements.php");
Session::start_session();
$di = new DependencyInjector();
$di->set("Database", new Database());
$di->set("User", new User($di));
$di->set("Category", new Category($di));
$di->set("Hash", new Hash($di));
$di->set("ErrorHandler", new ErrorHandler($di));
$di->set("Auth", new Auth($di));
// $di->set("TokenHandler", new TokenHandler($database, $hash));
$di->set("UserHelper", new UserHelper($di));
$di->set("Mail", MailConfigHelper::getMailer());
$di->set("Validator", new Validator($di));


$di->set("Cart",new Cart($di));
$di->set("Product",new Product($di));


$di->set("Event",new Event($di));
$di->set("UserSpecific",new UserSpecific($di));
// $tokenHandler->build();
