import requests
import json

url = 'http://localhost:8080'
headers = {'Content-Type': 'application/json'}
data =   {
      "action": "getEditionsList"
  }




response = requests.post(url, headers=headers, data=json.dumps(data))

print(response.text)
