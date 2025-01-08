import requests
import json

url = 'http://localhost:8080'
headers = {'Content-Type': 'application/json'}
data = {
    "action": "getVerseDetails",
    "chapter": 2,
    "verse": 255
}




response = requests.post(url, headers=headers, data=json.dumps(data))

print(response.text)
