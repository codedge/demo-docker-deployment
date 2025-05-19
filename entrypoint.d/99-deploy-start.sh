#!/us/bin/env bash

echo "🚀 Pre-deploy script starts..."

php bin/console doctrine:database:create --if-not-exists --env=prod
php bin/console doctrine:mig:mig --no-interaction --env=prod

echo "🏁 Success!"

return 0;
