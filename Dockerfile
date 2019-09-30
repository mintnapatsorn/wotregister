FROM bitnami/laravel:5.4.30-r0 as builder
USER root
RUN install_packages  git
COPY . /app
WORKDIR /app
RUN chown -R bitnami /app
USER bitnami
RUN composer install

FROM bitnami/laravel:5.4.30-r0
COPY --from=builder /app /app
RUN touch /tmp/initialized.sem