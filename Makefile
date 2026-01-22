PARTIALS = nav.blade.php hero.blade.php services.blade.php clients.blade.php \
           projects.blade.php benefits.blade.php about.blade.php why-choose-us.blade.php \
           faq.blade.php contact.blade.php footer.blade.php
PARTIALS_DIR = partials
TARGET = index.blade.php

all: $(PARTIALS_DIR) $(addprefix $(PARTIALS_DIR)/, $(PARTIALS)) $(TARGET)

$(PARTIALS_DIR):
	@mkdir -p $(PARTIALS_DIR)

$(PARTIALS_DIR)/%.blade.php:
	touch $@

$(TARGET):
	touch $@
import-db:
	@docker exec -i mysql-gan mysql -u user -ppassword -e "DROP DATABASE IF EXISTS db; CREATE DATABASE db;"
	@docker exec -i mysql-gan mysql -u user -ppassword db < storage/app/gan.sql
enter:
	docker exec -it php-agsoftweb /bin/bash;
