# Bitrix-webp
Нужно скачать конвертер от сюда https://storage.googleapis.com/downloads.webmproject.org/releases/webp/index.html
Далее необходимо распоковать его на сайте и убедится что работает cwebp, сконвертировав какую нибудь картинку.
Документацию можно прочитать здесь - https://developers.google.com/speed/webp/docs/cwebp

файл make.php необходимо поместить в папку сайта и изменить CWEBP_PATH на путь к cwebp

В .htaccess необходимо добавить следующее:
```
# WEBP
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{HTTP_ACCEPT} image/webp
  RewriteRule (.+)\.webp$ /local/php_interface/webp/make.php [L,NC]
# /WEBP
```

где "/local/php_interface/webp/make.php" путь к файлу make.php

файл webpbufermodifier.php нужно добавить на сайт и подключить в init.php. Этот файл превращает все .jpg и .png в .webp, если браузер поддерживает данный формат.
