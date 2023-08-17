# Super simple Nginx container based on Nginx 1.19.3 running in Alpine
FROM nginx:1.19.3-alpine

# Remove default Nginx config
RUN rm /etc/nginx/conf.d/default.conf

# Add user nginx to root, since Docker use "root" as default inside the containers
RUN adduser nginx root

# Create the html directory
RUN mkdir -p /var/www/html

# Change the ownership to root in the web files
RUN chown -R root:root /var/www/html

# Install nano, in case you need it
RUN apk add nano

# Make the workdir in this case for the Nginx root files
WORKDIR /etc/nginx

# Expose the 80 and 443 ports
EXPOSE 80 443

# Run Nginx
CMD ["/usr/sbin/nginx", "-g", "daemon off;"]
