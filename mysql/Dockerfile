FROM mysql:latest

# for icinga 2 node
# ENV TERM linux
# RUN apt-get update && apt-get install -y dialog net-tools wget
# RUN wget -O - http://debmon.org/debmon/repo.key 2>/dev/null | apt-key add -
# RUN echo 'deb http://debmon.org/debmon debmon-jessie main' >/etc/apt/sources.list.d/debmon.list
# RUN apt-get update && apt-get install -y icinga2

COPY ./websitedb.sql /docker-entrypoint-initdb.d/
