## BUILDING
##   (from project root directory)
##   $ docker build -t lesirrohan-gestionti3 .
##
## RUNNING
##   $ docker run -p 9000:9000 lesirrohan-gestionti3
##
## CONNECTING
##   Lookup the IP of your active docker host using:
##     $ docker-machine ip $(docker-machine active)
##   Connect to the container at DOCKER_IP:9000
##     replacing DOCKER_IP for the IP of your active docker host

FROM gcr.io/stacksmith-images/debian:wheezy-r8

MAINTAINER Bitnami <containers@bitnami.com>

ENV STACKSMITH_STACK_ID="yvflqep" \
    STACKSMITH_STACK_NAME="LeSirrohan/gestionti3" \
    STACKSMITH_STACK_PRIVATE="1"

RUN bitnami-pkg install php-5.5.38-0 --checksum 7985517748e3790445d833899256050c0fc8b191605a207df791e258249df817

ENV PATH=/opt/bitnami/php/bin:$PATH

## STACKSMITH-END: Modifications below this line will be unchanged when regenerating

# PHP base template
COPY . /app
WORKDIR /app

CMD ["php", "-a"]
