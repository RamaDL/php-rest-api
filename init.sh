echo "Please enter the IP where de service is going to run: "
read SERVICE_IP
echo "Please enter the PORT where de service is going to run: "
read SERVICE_PORT
php -S $SERVICE_IP:$SERVICE_PORT -t ./public