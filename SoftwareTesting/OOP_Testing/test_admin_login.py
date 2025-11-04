from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
import time

chrome_path = r"C:\Program Files\Google\Chrome\Application\chrome.exe"
chromedriver_path = r"C:\Users\hp\Downloads\chromedriver-win64\chromedriver-win64\chromedriver.exe"
url = "http://localhost/Digital-Bookshelf/Admin_Login/AdminLogin.php"

options = Options()
options.binary_location = chrome_path
options.add_argument("--start-maximized")
options.add_argument("--disable-infobars")
options.add_argument("--disable-extensions")

service = Service(executable_path=chromedriver_path)
driver = webdriver.Chrome(service=service, options=options)

driver.get(url)
print("➡️ Please manually enter username and password, then click login...")

try:
    while True:
        time.sleep(1)  # Wait for user to enter credentials

        # Try to catch alert if it appears
        try:
            alert = driver.switch_to.alert
            alert_text = alert.text
            print(f"Alert Text: {alert_text}")
            alert.accept()
            if "successfully" in alert_text.lower():
                print("✅ Login successful!")
            else:
                print("❌ Login failed!")
            break
        except:
            # No alert yet, continue waiting
            continue

    # Wait for redirect
    time.sleep(2)
    current_url = driver.current_url
    print(f"Current URL after login: {current_url}")
    print("Browser will remain open until you manually close it.")

except Exception as e:
    print("Error during login test:", e)
