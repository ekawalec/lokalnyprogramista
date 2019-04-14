# wysyłka poczty przez SMTP

Do uruchomienia skryptów potrzebne jest ściągnięcie pluginów do PHP poprzez [**Composer**](https://getcomposer.org/) (manager pakietów do PHP):
* [Windows] ściągamy i instalujemy [Composer](https://getcomposer.org/Composer-Setup.exe)
* [Linux] ściągamy i zapisujemy w folderze projektu [composer.phar](https://getcomposer.org/download/1.8.5/composer.phar)

Pobieramy pakiety Composer'em:
* [Windows] `composer install`
* [Linux] `php composer.phar install`

Konieczne jest posiadanie konta pocztowego w dowolnym miejscu i posiadanie parametrów niezbędnych do uzyskania połączenia ze skrzynką.
W tym celu zmieł nazwę pliku **mail_cfg_sample.php** na **mail_cfg.php** a następnie edytuj go.
