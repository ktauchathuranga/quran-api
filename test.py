import requests
import json

url = 'http://localhost:8080'
headers = {'Content-Type': 'application/json'}
data = {'chapter': 29, 'verse': 69}

response = requests.post(url, headers=headers, data=json.dumps(data))

print(response.text)
