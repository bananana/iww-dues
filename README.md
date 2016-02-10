# IWW Dues Payment System

This is a small and simple dues payment system developed specifically for [Brandworkers](brandworkers.org) and IWW IU460. It is written in php and uses Stripe to handle all transactions.

You can see an example of it being used in production [here](iww460.org).

# Installation

1) Your production server needs to have a web server (Apache or nginx) and php. Set that up, if you haven't already. Don't forget to configure php for your specific setup.

2) [Install Composer](https://getcomposer.org/doc/00-intro.md#globally) dependency manager if you don't have it already. 

3) Download *iww-dues* and get its dependencies:

    cd /var/www
    git clone https://github.com/bananana/iww-dues
    cd iww-dues
    composer update

4) Go to [Stripe.com](https://stripe.com/) and setup and account.

5) Configure the application:

    mv config-example.php config.php

Use your favorite text editor to edit config.php. Modify the config values if necessary and, most importantly, add both testing and production secret API keys under `// Stripe Settings`. You can find them in Account Settings under "API Keys" tab. 

If you are testing or developing, use test keys. When you go live don't forget to change the keys to live ones.

6) **Before going live, setup SSL/TLS cert on your server.** You shouldn't do this just yet, wait for a stable release. Contribute to the project if you can.

# To Do

- Clean up the interface
- Multi-step form with progress bar, current one is too long
- Setup unit testing (simpletest?)
- Better error handling
- Centralize all settings in config.php
- Get picture of membership card for better directions
- Better documentation



