# ManagerModuleZ3
Create and delete module z3

install:
composer require fxt-solutions/manager-module-z3

execute in root project:
ln -s vendor/fxt-solutions/manager-module-z3/fxt.php vendor/bin/fxt

set directory default create module:
php vendor/bin/fxt module:path [path]

Basic commands:
Create: php vendor/bin/fxt module:create [NameModule]
Delete: php vendor/bin/fxt module:delete [NameModule]
