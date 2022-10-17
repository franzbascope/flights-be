docker rm -f app
docker pull franz2897/flights
docker run --name app -p 80:80 franz2897/flights
