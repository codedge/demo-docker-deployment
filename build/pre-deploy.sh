#!/us/bin/env bash

php bin/console doctrine:database:create --if-not-exists --env=prod
php bin/console doctrine:mig:mig --no-interaction --env=prod

