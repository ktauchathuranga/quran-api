import requests
import json

# Define the base URL and headers
url = 'http://quran.x10.mx'  # Replace with your actual API URL
headers = {'Content-Type': 'application/json'}

# Function to send POST request
def send_post_request(data):
    response = requests.post(url, headers=headers, data=json.dumps(data))
    return response.text

# Function to test getEditionsList endpoint
def test_get_editions_list():
    data = {
        "action": "getEditionsList"
    }
    response = send_post_request(data)
    print("Get Editions List Response:")
    print(response)

# Function to test getVerseDetails endpoint
def test_get_verse_details(chapter, verse, edition_id=20):
    data = {
        "action": "getVerseDetails",
        "chapter": chapter,
        "verse": verse,
        "edition_id": edition_id
    }
    response = send_post_request(data)
    print(f"\nGet Verse Details Response for Chapter {chapter}, Verse {verse}:")
    print(response)

# Function to test getChapterDetails endpoint
def test_get_chapter_details(chapter, edition_id=20):
    data = {
        "action": "getChapterDetails",
        "chapter": chapter,
        "edition_id": edition_id
    }
    response = send_post_request(data)
    print(f"\nGet Chapter Details Response for Chapter {chapter}:")
    print(response)

# Function to test all endpoints
def test_all_endpoints():
    print("\nTesting All Endpoints...")

    # Test Get Editions List
    test_get_editions_list()

    # Test Get Verse Details for Chapter 2, Verse 255
    test_get_verse_details(2, 255)

    # Test Get Chapter Details for Chapter 2
    test_get_chapter_details(1)

# Main driver function to select which test to run
def run_tests():
    while True:
        print("\nChoose an endpoint to test:")
        print("1. Get Editions List")
        print("2. Get Verse Details")
        print("3. Get Chapter Details")
        print("4. Test All")
        print("5. Exit")
        choice = input("Enter your choice (1-5): ")
        
        if choice == '1':
            test_get_editions_list()
        elif choice == '2':
            chapter = int(input("Enter chapter number: "))
            verse = int(input("Enter verse number: "))
            test_get_verse_details(chapter, verse)
        elif choice == '3':
            chapter = int(input("Enter chapter number: "))
            test_get_chapter_details(chapter)
        elif choice == '4':
            test_all_endpoints()  # Run all tests
        elif choice == '5':
            print("Exiting...")
            break
        else:
            print("Invalid choice, please select again.")

if __name__ == "__main__":
    run_tests()
