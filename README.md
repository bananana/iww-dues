# IWW Dues Payment System

This is a small and simple dues payments system developed specifically for [IWW](iww.org) (Industrian Workers of the World) union. It is written in php and uses Stripe to handle all transactions.

# Installation

You'll need apache (or nginx), php and composer. *When you go live SSL/TLS is absolutely required*.

1) Install a web server and php if you haven't already. Don't forget to configure php for your specific setup.

2) [Install Composer](https://getcomposer.org/doc/00-intro.md#globally) dependency manager if you don't have it already. 

3) Download *iww-dues* and get its dependencies:

    cd /var/www
    git clone https://github.com/bananana/iww-dues
    cd iww-dues
    composer update

4) Go to [Stripe.com](https://stripe.com/) and setup and account.

5) Setup *iww-dues* config file:

    mv config-example.php config.php

Use your favorite text editor to edit config.php. Add values specific to you and, most importantly, add the secret and publishable API keys in $stripe array. You can find them in Account Settings under "API Keys" tab. 

If you are testing or developing, use test keys. When you go live don't forget to change the keys to live ones.

6) *Before going live, setup SSL/TLS cert on your server.*

# To Do

- Clean up the interface
- Setup unit testing (simpletest?)
- Better error handling
- Centralize all settings in config.php



