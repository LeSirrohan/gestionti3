## BUILDING
##   (from project root directory)
##   $ docker build -t php-for-lesirrohan-gestionti3 .
##
## RUNNING
##   $ docker run -p 9000:9000 php-for-lesirrohan-gestionti3
##
## CONNECTING
##   Lookup the IP of your active docker host using:
##     $ docker-machine ip $(docker-machine active)
##   Connect to the container at DOCKER_IP:9000
##     replacing DOCKER_IP for the IP of your active docker host

FROM gcr.io/stacksmith-images/debian:wheezy-r10

MAINTAINER Bitnami <containers@bitnami.com>

ENV STACKSMITH_STACK_ID="b41svts" \
    STACKSMITH_STACK_NAME="PHP for LeSirrohan/gestionti3" \
    STACKSMITH_STACK_PRIVATE="1"

RUN bitnami-pkg install php-5.5.38-2 --checksum 8e016a990465b1735561148c9c6addd1a46f8c2d04a5082cf21f1e138e05ee4f

ENV PATH=/opt/bitnami/php/bin:$PATH

## STACKSMITH-END: Modifications below this line will be unchanged when regenerating

# PHP base template
COPY . /app
WORKDIR /app

CMD ["php", "-a"]
