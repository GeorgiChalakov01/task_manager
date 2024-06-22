FROM minio/minio:latest


COPY scripts/start.sh /bin/start.sh
RUN chmod +x /bin/start.sh

ENTRYPOINT ["/bin/start.sh"]
#CMD ["server", "/data", "--console-address", ":9001"]
