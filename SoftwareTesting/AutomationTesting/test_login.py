from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException, NoAlertPresentException
import time

# ✅ Set ChromeDriver path
service = Service(r"D:\AllProjects\Mini Project\DigitalBookShelf\chromedriver.exe")
driver = webdriver.Chrome(service=service)
driver.maximize_window()

# URLs
BASE_URL = "http://localhost/DigitalBookShelf/Admin_Login/AdminLogin.php"
SUCCESS_URL = "http://localhost/DigitalBookShelf/index.html"

# Test Cases
test_cases = [
    {"username": "admin", "pass": "admin", "expected": "success"},
    {"username": "admin", "pass": "wrong", "expected": "fail"},
    {"username": "user", "pass": "admin", "expected": "fail"},
    {"username": "user", "pass": "1234", "expected": "fail"},
]

print("\n=== 🚀 Running Selenium Login Test Suite ===\n")
report = []

for case in test_cases:
    driver.get(BASE_URL)

    try:
        # Wait for input fields
        WebDriverWait(driver, 10).until(
            EC.presence_of_element_located((By.NAME, "username"))
        )

        # Enter username and password
        driver.find_element(By.NAME, "username").clear()
        driver.find_element(By.NAME, "username").send_keys(case["username"])
        driver.find_element(By.NAME, "pass").clear()
        driver.find_element(By.NAME, "pass").send_keys(case["pass"])

        # Click login button
        driver.find_element(By.ID, "loginBtn").click()

        # Wait for alert or redirect
        try:
            WebDriverWait(driver, 10).until(EC.alert_is_present())
            alert = driver.switch_to.alert
            msg = alert.text
            alert.accept()
            if "Invalid" in msg and case["expected"] == "fail":
                print(f"✅ Passed: {case['username']} / {case['pass']} → Invalid Detected")
                report.append(f"PASS - {case}")
            else:
                print(f"❌ Failed: {case['username']} / {case['pass']} → Unexpected Alert: {msg}")
                report.append(f"FAIL - {case} (Unexpected Alert)")
        except TimeoutException:
            # Check URL redirect
            current_url = driver.current_url
            if current_url == SUCCESS_URL and case["expected"] == "success":
                print(f"✅ Passed: {case['username']} / {case['pass']} → Login Success (Redirected)")
                report.append(f"PASS - {case}")
            else:
                print(f"❌ Failed: {case['username']} / {case['pass']} → No alert & not redirected")
                report.append(f"FAIL - {case} (No Alert & Not Redirected)")

    except TimeoutException:
        print(f"❌ Failed: Page not loaded properly for {case['username']}")
        report.append(f"FAIL - {case} (Timeout)")

# Save report
with open("test_report.txt", "w") as file:
    for line in report:
        file.write(line + "\n")

print("\n📄 Test Summary saved to test_report.txt")
input("\nPress Enter to close browser...")
driver.quit()
