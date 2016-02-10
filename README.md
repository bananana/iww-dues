# IWW Dues Payment System

This is a small and simple dues payment system developed specifically for [Brandworkers](brandworkers.org) and IWW IU460. It is written in php and uses Stripe to handle all transactions.

You can see an example of it being used in production [here](iww460.org).

# Installation

**Note:** Your production server needs to have either Apache or nginx and php5. You should set up and configure that, if you haven't already. Also, in order to use Stripe in production you need and SSL/TLS certificate on your server. To get one you can use either [cloudflare](https://www.cloudflare.com/) or [Let's Encrypt](https://letsencrypt.org/). Both of those services offer high grade free certificates. Specific details for setting up a server and SSL/TLS encryption are beyond the scope of this document.

1) Go to [Stripe.com](https://stripe.com/) and setup and account.

2) [Install Composer](https://getcomposer.org/doc/00-intro.md#globally) dependency manager on your development machine, if you don't have it already.

3) Clone the repo to your development machine and get all the dependencies:

    git clone https://github.com/bananana/iww-dues
    cd iww-dues
    composer update

4) Configure the application:

    mv config-example.php config.php

Use your favorite text editor to edit *config.php*. Under `// General Settings` modify the config values if necessary. Under `// Stripe Settings` add both testing and production API keys (you can find them in Account Settings under "API Keys" tab on Stripe's website). 

5) Before you're readity to move to production server, **make sure that SSL/TLS is setup and working correctly**.

6) Copy application files to the server using either `scp`, `rsync` or whatever else you prefer.

7) Edit *config.php* on the server and under `// Mode` swich the $testing variable to false.

# To Do

- Better error handling
- Get picture of membership card for better directions
