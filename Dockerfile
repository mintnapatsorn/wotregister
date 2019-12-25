FROM bitnami/laravel:5.7.19 as builder
USER root
RUN install_packages  git
COPY . /app
WORKDIR /app
RUN chown -R bitnami /app
USER bitnami
RUN composer install

FROM bitnami/laravel:5.7.19
COPY --from=builder /app /app
COPY ./app-entrypoint.sh /app-entrypoint.sh
RUN touch /tmp/initialized.sem