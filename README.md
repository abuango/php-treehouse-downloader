# treehouse-track-downloader

Pre-requisites:
- Treehouse PRO account
- Composer
- Obtain track iTunes link:

Access the track you wish to download
- In the lower right corner under Download Videos, Right-clikc on the 'iTunes Feed' button and copy the link's address
- Add the links of the tracks you wich to download in the `$rss_links` array in download.php
- Replace the `itpc://` protocol with `https://` or the download won't work

Downloading the Tracks:
- After adding all the links if the tracks you wish to download, save the `download.php` file
- Run `php -f download.php`
- All downloaded videos will be organized by folders using the Track's title as folder name.
- This is a quick hack, if there is any improvements you wish to make, please create PRs.