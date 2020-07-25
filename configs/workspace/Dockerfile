ARG LARADOCK_PHP_VERSION
ARG BASE_IMAGE_TAG_PREFIX=latest
FROM laradock/workspace:${BASE_IMAGE_TAG_PREFIX}-${LARADOCK_PHP_VERSION}

ARG APP_CODE_PATH_CONTAINER=/var/www
ENV APP_CODE_PATH_CONTAINER ${APP_CODE_PATH_CONTAINER}

ARG WORKSPACE_USER=laradock
ENV WORKSPACE_USER ${WORKSPACE_USER}


# Start as root
USER root

###########################################################################
# Laradock non-root user:
###########################################################################

# Add a non-root user to prevent files being created with root permissions on host machine.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

# always run apt update when start and after add new source list, then clean up at end.
RUN set -xe; \
    apt-get update -yqq && \
    pecl channel-update pecl.php.net && \
    groupadd -g ${PGID} ${WORKSPACE_USER} && \
    useradd -u ${PUID} -g ${WORKSPACE_USER} -m ${WORKSPACE_USER} -G docker_env && \
    usermod -p "*" ${WORKSPACE_USER} -s /bin/bash && \
    apt-get install -yqq \
      apt-utils \
      libzip-dev zip unzip \
      # Install the zip extension
      php${LARADOCK_PHP_VERSION}-zip \
      php -m | grep -q 'zip'


###########################################################################
# Set Timezone
###########################################################################

ARG TZ=UTC
ENV TZ ${TZ}

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone


###########################################################################
# Composer:
###########################################################################

ENV PATH $PATH:$HOME/.composer/vendor/bin


###########################################################################
# Node / NVM:
###########################################################################

USER ${WORKSPACE_USER}

# Check if NVM needs to be installed
ARG NODE_VERSION=node
ENV NODE_VERSION ${NODE_VERSION}

ENV NVM_DIR /home/${WORKSPACE_USER}/.nvm

# Install nvm (A Node Version Manager)
RUN mkdir -p $NVM_DIR && \
    curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash \
        && . $NVM_DIR/nvm.sh \
        && nvm install ${NODE_VERSION} \
        && nvm use ${NODE_VERSION} \
        && nvm alias default ${NODE_VERSION} \
        && nvm use default \
        && echo "" >> ~/.bashrc \
        && echo 'export NVM_DIR="$HOME/.nvm"' >> ~/.bashrc \
        && echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"  # This loads nvm' >> ~/.bashrc

USER root

RUN echo "" >> ~/.bashrc \
	&& echo 'export NVM_DIR="${NVM_DIR}"' >> ~/.bashrc \
	&& echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"  # This loads nvm' >> ~/.bashrc

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules

RUN ln -s $NVM_DIR/versions/node/v$NODE_VERSION/bin/node /usr/local/bin/node && \
    ln -s $NVM_DIR/versions/node/v$NODE_VERSION/bin/npm /usr/local/bin/npm

###########################################################################
# xDebug:
###########################################################################

USER root

# Load the xdebug extension only with phpunit commands
RUN apt-get install -y php${LARADOCK_PHP_VERSION}-xdebug

# ADD for REMOTE debugging
COPY ./xdebug.ini /etc/php/${LARADOCK_PHP_VERSION}/cli/conf.d/xdebug.ini

RUN sed -i "s/xdebug.remote_autostart=0/xdebug.remote_autostart=1/" /etc/php/${LARADOCK_PHP_VERSION}/cli/conf.d/xdebug.ini && \
    sed -i "s/xdebug.remote_enable=0/xdebug.remote_enable=1/" /etc/php/${LARADOCK_PHP_VERSION}/cli/conf.d/xdebug.ini && \
    sed -i "s/xdebug.cli_color=0/xdebug.cli_color=1/" /etc/php/${LARADOCK_PHP_VERSION}/cli/conf.d/xdebug.ini

#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

# Clean up
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

# Set default work directory
WORKDIR ${APP_CODE_PATH_CONTAINER}