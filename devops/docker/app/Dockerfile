FROM webdevops/php-nginx:7.4

COPY site.conf /opt/docker/etc/nginx/conf.d/site.conf

RUN pecl config-set php_ini /opt/docker/etc/php/php.ini \
  && pear config-set php_ini /opt/docker/etc/php/php.ini \
  && apt-get update \
  && apt-get install -y curl \
  && rm -rf /var/lib/apt/lists/*

# Install NVM & Node
ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 14.15.4
ENV NVM_VERSION 0.37.2

SHELL ["/bin/bash", "-c"]
RUN mkdir -p ${NVM_DIR} \
    && curl --silent -o- https://raw.githubusercontent.com/nvm-sh/nvm/v${NVM_VERSION}/install.sh | bash \
    && source ${NVM_DIR}/nvm.sh \
    && nvm alias default ${NODE_VERSION}

ENV NODE_PATH ${NVM_DIR}/versions/node/v${NODE_VERSION}/lib/node_modules
ENV PATH ${NVM_DIR}/versions/node/v${NODE_VERSION}/bin:$PATH

WORKDIR /app
