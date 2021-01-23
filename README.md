# ComerZap

## Ambiente de desarrollo

Para hacer deploy de este sistema en un ambiente local de desarollo necesitamos tener lo siguiente:

- Composer(https://getcomposer.org/) Correctamente instalado y configurado con PHP.
- PHP 7.2.x Correctamente instalado y agregado a las variables de sistema para su uso en terminal.

Para su correcto funcionamiento se deben habilitar determinadas extensiones de php, para verificar que esta todo instalado y configurado de manera correcta pueden crear un proyecto nuevo y verificar antes de iniciar este. Eso se hace con el comando:

`composer create-project codeigniter4/appstarter [nombreDelProyecto]`

Una vez dentro del directorio del proyecto:

`php spark serve`

Si todo esta correctamente instalado y configurado, podremos levantar una pestaña de navegador con un proyecto de CodeIgniter funcionando. Ya hecho esto, podremos levantar este proyecto tranquilamente. 

Primero clonamos el repositorio a nuestro equipo:

`git clone https://github.com/DavidViillanueva/comerZap`

Una vez dentro del directorio del proyecto:

`composer install`

`php spark serve`

Copiar el archivo `env` y renonmbrarlo `.env`

## PHP Extensiones


- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php)

Adicionalmente las siguientes extensiones tienen que estar habilitadas

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
