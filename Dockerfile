FROM php:7.1.5-alpine

MAINTAINER udovicic <udovicic.stjepan@gmail.com>

ADD toolset /toolset
ENV PATH="/toolset/vendor/bin:${PATH}"
RUN phpcs --config-set installed_paths ./../../magento/marketplace-eqp,./../../../src/phpcs

RUN rm -rf /var/cache/apk/* /var/tmp/* /tmp/*

VOLUME ["/project"]
WORKDIR /project

ENTRYPOINT ["phpcs"]
CMD ["--version"]
