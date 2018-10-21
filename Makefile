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
	test ! -e tests/report.log
	docker run --rm udovicic/magentost:${VERSION}
	docker run --rm --volume `pwd`/tests:/project udovicic/magentost:${VERSION} --report-file=report.log --standard=lMEQP2 /project || true
	test -e tests/report.log
	cat tests/report.log
