VERSION:=$(shell grep "version" toolset/composer.json | awk -F ":" '{ print $$2 }' | sed 's/[",]//g' | tr -d '[[:space:]]')

.PHONY: update-toolset
update-toolset:
	rm -rf toolset/vendor
	rm -rf toolset/composer.lock
	cd toolset && composer install --no-dev

.PHONY: build
build:
	docker build --no-cache --rm --tag udovicic/magentost:${VERSION} .
	docker run --rm udovicic/magentost:${VERSION}
	docker run --rm udovicic/magentost:${VERSION} -i
	docker run --rm udovicic/magentost:${VERSION} --config-show

.PHONY: test
test:
	rm -f tests/*.log
	test ! -e tests/report-lmeqp1.log
	test ! -e tests/report-lmeqp2.log
	test ! -e tests/report-magento2.log
	docker run --rm udovicic/magentost:${VERSION}
	docker run --rm --volume `pwd`/tests:/project udovicic/magentost:${VERSION} --report-file=report-lmeqp1.log --standard=lMEQP1 /project || true
	docker run --rm --volume `pwd`/tests:/project udovicic/magentost:${VERSION} --report-file=report-lmeqp2.log --standard=lMEQP2 /project || true
	docker run --rm --volume `pwd`/tests:/project udovicic/magentost:${VERSION} --report-file=report-magento2.log --standard=Magento2 /project || true
	test -e tests/report-lmeqp1.log
	test -e tests/report-lmeqp2.log
	test -e tests/report-magento2.log
	cat tests/report-lmeqp1.log
	cat tests/report-lmeqp2.log
	cat tests/report-magento2.log
