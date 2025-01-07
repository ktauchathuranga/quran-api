import requests
import json

url = 'http://localhost:8080'
headers = {'Content-Type': 'application/json'}
data = {'chapter': 1, 'verse': 1}

response = requests.post(url, headers=headers, data=json.dumps(data))

print(response.text)
