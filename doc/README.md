# Documentació bàsica del projecte
Ha d'incloure, com a mínim
## Instruccions per crear un entorn de desenvolupament
  - Eines:
      - Navegador: Chrome
      - Editor de codi: Visual Studio Code
      - Paquete de SoftWare: Xampp (Apache, MySql)
  - Plugins:
      - VUE en Chrome
      - Live Server en VS
      - MYSQL en VS
      - ThunderClient en VS
      - Live Share en VS

## Instruccions per desplegar el projecte a producció
Quins fitxers s'han d'editar i com (típicament per connectar la BD etc...)
- Primer has de descarregar els arxius del github i pujarlos al servidor o fer un clone directament al servidor
- Una vegada ho tens el servidor, has de cambiar tots els fetch en els arxius js i posar la següent ruta sense treure a quina api vols accedir "/back-end/laravel-api/public/apiNnomoRutaApi"
- Has de canviar el .env el nom de la taula el que tu vulguis i posar la contrasemnya d'aquella base de dades
- Una vegada acabat el pas anterior fer un php artisan migrate per poder crear les taules
- Una vegada fet el migrate anar a la carpeta back-end on hi ha un arxiu .sql i insertar-lo a la base de dades.
- Amb aixo ja funcionarà.

## Instruccions per seguir codificant el projecte
eines necessaries i com es crea l'entorn per que algú us ajudi en el vostre projecte.
- Per poder desplegar el projecte, has de clonar el repositori al teu ordinador. Fent servir el xampp, li dones ha Apache start, i MySQL start. Ara obres el repositori que t'has clonat previament, i obre una terminal desde el Visual Studio Code. 

A la terminal accedeixes a la carpeta laravel-api (cd .\back-end\laravel-api), una vegada et trobes ahí executes les següets comandes (php artisan migrate:rollback)(php artisan migrate) i després (php artisan serve) amb aixó ya tenim la API en funcionament, ara falta afegir les dades.

Pero afegir les dades, obres el teu phpmyadmin o base de dades, i importas el arxiu InsertsApi.sql, a la terminal del Visual Studio Code et sortira un missatge de si vols crear la base de dades materialescolar i poses yes, i ja tendrías tot el necesario per començar a treballar.


## API / Endpoints / punts de comunicació
Heu d'indicar quins són els punts d'entrada de la API i quins són els JSON que s'envien i es reben a cada endpoint
