import requests

# Define the API endpoint
url = "http://localhost:8080/"  # Update this URL if running on a different host or port

# Define the data to send in the POST request
data = {
    "chapter": 1,  # Example chapter number
    "verse": 1     # Example verse number
}

try:
    # Send the POST request with the JSON payload
    response = requests.post(url, json=data)
    
    # Check if the request was successful
    if response.status_code == 200:
        # Parse and print the response JSON
        print("Response from API:")
        print(response.json())
    else:
        print(f"Failed to fetch data. Status Code: {response.status_code}")
        print("Response Text:", response.text)

except requests.exceptions.RequestException as e:
    print(f"An error occurred: {e}")
