import requests
from bs4 import BeautifulSoup

# Function to get the HTML content of the page
def get_html(url):
    response = requests.get(url)
    return response.text

# Function to parse the HTML and sum up the prices
def calculate_sum_from_html(html):
    soup = BeautifulSoup(html, 'html.parser')
    # Update the selector to match the actual prices on the site
    price_elements = soup.select('.price-class')  # Replace with actual selector
    total_sum = sum(float(price.get_text().replace(',', '.').replace(' ', '')) for price in price_elements)
    return total_sum

# Replace with the actual URL of the page you want to scrape
page_url = 'https://example.com'  # Replace with actual URL
html_content = get_html(page_url)
total_price = calculate_sum_from_html(html_content)

print(f'The total sum of the prices on the page is: {total_price}')
