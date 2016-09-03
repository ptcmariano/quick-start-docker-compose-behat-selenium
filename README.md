# quick-start-docker-compose-behat-selenium
Example of use docker-compose and behat to test

# requirements
- docker + docker-compose => [recommended docker toolbox](https://www.docker.com/products/docker-toolbox) or Linux 
- 5GB disk space

Toolbox is currently unavailable for Linux; To get started with Docker on Linux, please follow the Linux [Getting Started Guide](https://docs.docker.com/engine/installation/linux/) and install the [Compose](https://docs.docker.com/compose/install/).

## generate dependencies
docker-compose -f docker-compose.vendor.yml up

## run tests
docker-compose -p dockerbehat -f docker-compose.yml -f docker-compose.testing.yml up -d
## wait results
docker wait dockerbehat_tests-wordpress_1
## see results
docker logs dockerbehat_tests-wordpress_1
