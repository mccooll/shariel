To run:
- ```symfony server:start```

Don't forget:
- ```composer install```
- You'll need composer installed and in your global path
- You'll need symfony local webserver globally

More on prerequisites: https://symfony.com/doc/current/setup.html

Example ~/.bash_profile:
```
export PATH="$HOME/.symfony/bin:$PATH" 
export PATH="$HOME/.composer/bin:$PATH"
```
In this case ~/.composer/bin contains composer.phar renamed to composer. Close and re-open bash terminal after editing this file.
