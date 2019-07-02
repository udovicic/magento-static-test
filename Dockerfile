FROM php:7.2-alpine

MAINTAINER udovicic <udovicic.stjepan@gmail.com>

ADD toolset /toolset
ENV PATH="/toolset/vendor/bin:${PATH}"
RUN phpcs --config-set installed_paths ./../../magento/marketplace-eqp,./../../../custom-standards,./../../magento/magento-coding-standard,./../../sirbrillig/phpcs-variable-analysis

RUN rm -rf /var/cache/apk/* /var/tmp/* /tmp/*

VOLUME ["/project"]
WORKDIR /project

ENTRYPOINT ["phpcs"]
CMD ["--version"]
