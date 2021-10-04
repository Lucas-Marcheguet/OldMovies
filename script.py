import requests

API_KEY = '89f2f52db7369d1eb5a3423d16f348d8'

URL = "https://api.themoviedb.org/3/search/movie?api_key=" + API_KEY + "&year=199"
COMPLEMENT = "page=2&include_adult=false"

for i in range(10):
    LINK = URL + str(i) + COMPLEMENT
    r = requests.get(LINK)
    print(r.text)