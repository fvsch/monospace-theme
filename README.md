# Monospace Theme for Tumblr

<img src="img/icon.svg" width="160" height="160" alt="">

A minimalist Tumblr theme with a plain text look, based on [ReMarkdown](https://fvsch.com/remarkdown).

For a full presentation of the theme, [see the demo blog](https://monospace-theme.tumblr.com/).

## Usage

Copy the content of the `theme.html` file inside the Tumblr theme editor.

The metadata in `theme.html` defines a number of variables that should be picked up by Tumblr, and which let you change some colors and options.

## Development

To make updates to the theme’s HTML or CSS, you can clone this repository and then:

- DO NOT edit `theme.html` directly.
- Instead, edit the files `src/theme.php` (for HTML and Tumblr template logic) and `src/theme.scss` (styling).
- Then, update `theme.html` with the following commands:

```sh
npm install && npm run build
```

To run those commands, you will need:

- [Node.js](https://nodejs.org/) installed;
- and a command-line application like Terminal.app (macOS) or `cmd.exe` (Windows).
