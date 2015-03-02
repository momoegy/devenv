FROM centos

EXPOSE 9324

RUN mkdir /elasticmq
RUN cd /elasticmq; curl -s -o /elasticmq/elasticmq-server-0.8.0.jar https://s3-eu-west-1.amazonaws.com/softwaremill-public/elasticmq-server-0.8.0.jar
RUN yum install -y java-1.7.0-openjdk
ADD run.sh /
ADD custom.conf /elasticmq/
ADD my_logback.xml /elasticmq/

CMD ["/run.sh"]