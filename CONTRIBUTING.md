## Installation

From the plugin root directory, run the following commands:

    ```bash
    $ composer install
    $ (cd tests/Application && yarn install)
    $ (cd tests/Application && yarn build)
    $ (cd tests/Application && APP_ENV=test bin/console assets:install public)
    
    $ (cd tests/Application && APP_ENV=test bin/console doctrine:database:create)
    $ (cd tests/Application && APP_ENV=test bin/console doctrine:schema:create)
    ```

To be able to setup this plugin database, remember to configure you database credentials 
in `tests/Application/.env` and `tests/Application/.env.test`.

## Usage

### Running code analyse and tests

  - GrumPHP (see configuration [grumphp.yml](grumphp.yml).)
  
    GrumPHP is executed by the Git pre-commit hook, but you can launch it manualy with :
    ```bash
    $ vendor/bin/grumphp run
    ```

  - Behat (non-JS scenarios)

    ```bash
    $ vendor/bin/behat --tags="~@javascript"
    ```

  - Behat (JS scenarios)
 
    1. Download [Chromedriver](https://sites.google.com/a/chromium.org/chromedriver/)
    
    2. Download [Selenium Standalone Server](https://www.seleniumhq.org/download/).
    
    2. Run Selenium server with previously downloaded Chromedriver:
    
        ```bash
        $ java -Dwebdriver.chrome.driver=chromedriver -jar selenium-server-standalone.jar
        ```
        
    3. Run test application's webserver on `localhost:8080`:
    
        ```bash
        $ (cd tests/Application && bin/console server:run localhost:8080 -d public -e test)
        ```
    
    4. Run Behat:
    
        ```bash
        $ vendor/bin/behat --tags="@javascript"
        ```

### Opening Sylius with your plugin

- Using `test` environment:

    ```bash
    $ (cd tests/Application && APP_ENV=test bin/console sylius:fixtures:load)
    $ (cd tests/Application && APP_ENV=test bin/console server:run -d public)
    ```
    
- Using `dev` environment:

    ```bash
    $ (cd tests/Application && APP_ENV=dev bin/console sylius:fixtures:load)
    $ (cd tests/Application && APP_ENV=dev bin/console server:run -d public)
    ```
