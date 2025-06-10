FROM nginx:alpine
COPY . /usr/share/nginx/html/  # Copie TOUT le projet
EXPOSE 80
