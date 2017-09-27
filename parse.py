from selenium import webdriver
client = webdriver.PhantomJS(executable_path = "~/Downloads/phantomjs-2.1.1-macosx/bin/phantomjs")
client.get("http://music.163.com/#/mv/?id=5597192&userid=556605107")
soup = bs(client.page_source)
