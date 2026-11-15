# XSS Demo: Register, Login, Logout and Who Did It

A small PHP app that shows how a Cross-Site Scripting (XSS) attack works and how to stop it.
It is for educational use only. Run it only on your own computer.

## Two versions

| Folder | What it is |
|--------|------------|
| `vulnerable/` | Prints user input as-is, so XSS works. |
| `secure/` | Same app with the XSS fixes and a strong password rule. |

## Features

- Register, login and logout (passwords stored with `password_hash`)
- "Who Did It" page: logged-in users post messages, and each message shows who wrote it
- Data is saved in `users.json` and `posts.json` (no database needed)

## How to run

Requires PHP 8 or newer.

```
cd vulnerable
php -S localhost:8000
```

Open http://localhost:8000/register.php, create an account, log in, then post a message.
To try the secure version, run the same command inside `secure/`.

## Try the attack (vulnerable version)

Post this in the message box:

```
<script>document.body.innerHTML='<h1>HACKED BY XSS</h1>'</script>
```

The page gets defaced for every visitor. In `secure/` the same text is shown as plain text.

## What the secure version adds

- `e()` helper using `htmlspecialchars` on all output
- Content-Security-Policy header
- HttpOnly and SameSite session cookie, plus `session_regenerate_id` on login
- Username check: 3 to 20 letters, numbers or underscores
- Password rule: at least 8 characters with a number, an uppercase and a lowercase letter
