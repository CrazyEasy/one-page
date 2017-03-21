# ONE-PAGE
[![Build Status](https://travis-ci.org/CrazyEasy/One-Page.svg?branch=master)](https://travis-ci.org/CrazyEasy/One-Page)
[![Licence Open Culture](https://img.shields.io/badge/licence-Free%20Cultural-blue.svg)](https://github.com/CrazyEasy/One-Page/blob/master/LICENSE.md)
[![GitHub issues](https://img.shields.io/github/issues/CrazyEasy/One-Page.svg)](https://github.com/CrazyEasy/One-Page/issues)
[![GitHub release](https://img.shields.io/github/release/crazyeasy/one-page.svg)](https://github.com/CrazyEasy/One-Page/releases)

Building a website? Annoyed about changing the menu bar on every single page separately? Just because of one tiny typo? **One-Page** will help you out and you simply have to focus on the content!

![](/img/tutorial1.png)

## Tutorial

### Installing One-Page
_See release notes, if you want to upgrade to a newer version!_

1. Go to `https://github.com/CrazyEasy/one-page/releases` and download the latest release.
2. Put it into your main directory.

### Configuration
Open `config.php`:

- **`$main_domain`**: Just set it onto your domain/url!
- **`$page_name`**: Enter the name of your page (One-Page will use it to generate the website-title!)
- **`$experimental_path`**: If you are not using the main directory, add your sub-directory here. [Beta]
- **`$markdown_extra`**: Enable Markdown Extra.

Example ``config.php``:

```php    
# Main Domain (No "/" at the End!)
$main_domain = "http://mywebsite.com"; 

# <title>-Name
$page_name = "MyPage";

# Experimental Path: (case-sensitive!)
$experimental_path = "/sub-directory";

# Enable Markdown Extra?
$markdown_extra = false;
```


**Only if you are <u>not</u> using the main directory:**
- Open `.htaccess`.
- Add your sub-directory to `index.php` <br>
  **Important:** The URL must start with a `/`!
 

Example `.htaccess` if you are using a sub-directory:

```http   
ErrorDocument 404 /sub-directory/index.php
ErrorDocument 403 /sub-directory/index.php?p=403
ErrorDocument 500 /sub-directory/index.php?p=500
```

## Create a new page
### using Markdown:

- Go to the `pages/`-folder
- Create a Markdown-file, the name of the file will be the URL. (Example: `example-page.md`)<br>
  **Important:** Only use <u>lowercase</u> letters in the filename!
- Just write any content you want in the file.
- Done! You will find your web page at `example.com/example-page`.

### using HTML / PHP:
- Go to the `pages/`-folder
- Create a new file, the name of the file will be the URL. (Example: `example-page2.html`)<br>**Important:** Only use <u>lowercase</u> letters in the filename!
- Put your content between `<main>`&`</main>`<br>
  **Example:**
 ```html
  <main>
    <h1>Example-Page2</h1>
    <!-- More Content-->
  </main>
 ```
- Done! You will find your web page at `example.com/example-page2`.

## Change footer / header
Very simple: 
- open `footer.php` if you want to change your footer,
- open `header.php` if you want to change your header!
:)

## Change the design
Simple, again:
- You will find a folder named `css/`,
- In the folder you will find a file named `main.css`.
- Just change the style how you like!

---

If you have any questions, feel free to ask! ;)
