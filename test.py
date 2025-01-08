import requests
import json

url = 'http://localhost:8080'
headers = {'Content-Type': 'application/json'}
data = {
    "action": "getVerseDetails",
    "chapter": 1,
    "verse": 1,
    "edition_id": 132
}




response = requests.post(url, headers=headers, data=json.dumps(data))

print(response.text)
