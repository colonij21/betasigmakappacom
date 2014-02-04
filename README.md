# BetaSigmaKappa.com

## About BetaSigmaKappa.com

Beta Sigma Kappa Fraternity, Inc. is the premier Afro-Latino fraternity. 
The organization was started in 1998 and has been evolving ever since.  This
website is a showcase of the organization and its history. 

## Creators

BetaSigmaKappa.com was created and developed by:

+ John Colonio (@JFColonio)
+ Charles Nazario (@charlesnazario)

## Development Overview

BetaSigmaKappa.com is a Drupal project and this repository holds all the 
code assets needed for the site.  The files are organized into the 
below structure.  

+ / - make file and phing configuration scripts
+ src - custom source code
+ docs - documentation on setup, configuaration and development 
+ misc - Miscellaneous files required for the project

To build and develop the site you will need to AT LEAST meet the
following requirements.

1. PHP 5.4+
2. Git (and a Github account)
3. Phing
4. Drush
5. Local LAMP Stack

## Development Detail

Once the project has been cloned there are a few easy commands to take care of
the rest.  First though open the build.properties file and change the settings
as necessary.

To install a new wooly watch instance on your local development environment type:

    $ phing build

If you modify or add a file from the git project and want to resync it with your
development environment type:

    $ phing resync

#### &copy;2014 BetaSigmaKappa.com - All rights reserved
