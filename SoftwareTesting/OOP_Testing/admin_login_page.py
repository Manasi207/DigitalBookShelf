# admin_login_page.py
from selenium.webdriver.common.by import By
from selenium.webdriver.remote.webdriver import WebDriver
import time

class AdminLoginPage:
    def __init__(self, driver: WebDriver):
        self.driver = driver
        self.username_input = (By.NAME, "username")
        self.password_input = (By.NAME, "pass")
        self.login_button = (By.CLASS_NAME, "login100-form-btn")

    def open(self, url):
        self.driver.get(url)
        time.sleep(2)

    def login(self, username, password):
        self.driver.find_element(*self.username_input).send_keys(username)
        self.driver.find_element(*self.password_input).send_keys(password)
        self.driver.find_element(*self.login_button).click()
        time.sleep(2)

    def handle_alert(self):
        alert = self.driver.switch_to.alert
        alert_text = alert.text
        alert.accept()
        time.sleep(2)
        return alert_text
