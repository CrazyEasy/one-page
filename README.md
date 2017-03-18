# ONE-PAGE
Building a website? Annoyed of changing the menu bar on every single page separately? Just because of one tiny typo? One-Page will help you out: Just focus on the content!

![](/img/tutorial1.png)

## Tutorial

### Installing One-Page
_See release notes, if you want to upgrade to a newer version!_

1. Goto `https://github.com/CrazyEasy/one-page/releases` and download the latest release.
2. Put it into your main directory.

### Configurate One-Page
Open `config.php`:

- **`$main_domain`**: Just set it to your domain/url!
- **`$page_name`**: Enter your page-name (One-Page will use it to generate the website-title!)
- **`$experimental_path`**: If you are not using the main directory, add your sub-directory here. [Beta]

Example ``config.php``:

```php    
# Main Domain (No "/" at the End!)
$main_domain = "http://mywebsite.com"; 

# <title>-Name
$page_name = "MyPage";

# Experimental Path: (case-sensitive!)
$experimental_path = "/sub-directory";
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
### using MarkDown:

- Goto the `pages/`-folder
- Create a markdown-file, the file-name will be the URL. (Example: `example-page.md`)<br>**Important:** Only use <u>lowercase</u> letters in the filename!
- Write your content in the file.
- Done! You will find your web-page at `example.com/example-page`.

### using HTML / PHP:
- Goto the `pages/`-folder
- Create a new file, the file-name will be the URL. (Example: `example-page2.html`)<br>**Important:** Only use <u>lowercase</u> letters in the filename!
- Put your content between `<main>`&`</main>`<br>
  **Example:**
 ```html
  <main>
    <h1>Example-Page2</h1>
    <!-- More Content-->
  </main>
 ```
- Done! You will find your web-page at `example.com/example-page2`.

## Change Footer / Header
Very simple: 
- open `footer.php` if you want to change your footer,
- open `header.php` if you want to change your header!
:)

## Change the Design
Simple, again:
- You will find a folder named `css/`,
- in there you will find `main.css`.
- Just change the style how you like ;)

---

If you have any questions, feel free to ask!
