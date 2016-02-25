FROM tutum/lamp

# pull the image from gitlab.informatika.org
RUN rm -rf /app && \
  git clone http://gitlab.informatika.org/if4033/if4033-simple-blog-reloaded.git /app

# replace the symlink
RUN sed -i "s/\/var\/www\/html/\/var\/www\/html\/public/g" /etc/apache2/sites-enabled/000-default.conf

# run the initialization script
RUN chmod +x /app/init.sh && \
  /app/init.sh

EXPOSE 80 3306

CMD ["/run.sh"]