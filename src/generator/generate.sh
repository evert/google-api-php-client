#!/bin/bash

php ./generate.php buzz v1 > ../contrib/apiBuzzService.php
php ./generate.php diacritize v1 > ../contrib/apiDiacritizeService.php
# php ./generate.php easyhybrid v1 > ../contrib/apiEasyhybridService.php
php ./generate.php latitude v1 > ../contrib/apiLatitudeService.php
php ./generate.php moderator v1 > ../contrib/apiModeratorService.php
php ./generate.php translate v2 > ../contrib/apiTranslateService.php
php ./generate.php prediction v1.1 > ../contrib/apiPredictionService.php

