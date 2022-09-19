# Atypic - A WordPress theme (bêta)

This theme intended to be an all-in-one plugin-free theme at terms. It is basically designed for my own personal blog but feel free to use it for yours or fork it as it is under [GNU General Public License v2](http://www.gnu.org/licenses/gpl-2.0.html) 


## Local Development

### Setup environment

#### Installing Node.js
This theme uses Node.js tools for build processes through webpack and Gulp.
If you haven't Node.js installed yet you can follow those instructions for your specific Operating System :

- https://nodejs.org/en/download/

Make sure you install the LTS version.
#### Running WordPress locally
WordPress recommended versions : **6.0** or higher. Note that it is recommend to keep your WordPress version up to date.
If you haven't already a local setup for WordPress I recommend to use one of these tool :

- [@wordpress/env](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/) : A NPM package for running WordPress in a Docker container. Highly recommended by myself for its ease of use and configuration.
- [Local](https://localwp.com/) by FlyWheel : An intuitive UI that I recommend if you have no prior experience with Docker.
- [XAMPP](https://www.apachefriends.org/fr/index.html) : Offer an all-in-one PHP and Perl support through Apache and MariaDB. 
- WAMP, LAMP, or other distribution similar to XAMPP.

#### Download the Atypic theme source code
You can (`download` || `clone` || `fork`)  the source code on its GitHub repo : https://github.com/Sbyspaceopera/atypic

Make sure to put this code in your `wp-content/themes/atypic` directory.
#### Final step
Go activate the theme in your WordPress admin panel and follows the plugins installation instructions thanks to [TGM Plugin Activation](http://tgmpluginactivation.com/).

###  Scripts
The scripts in this projects are divide in two main types : block related scripts and the others.

*Block related scripts* only affect the `/blocks` folder.
*Other scripts* do not affect  the `/blocks` folder.
*All scripts* are used through NPM and must be precede by the `npm run` command, for example :
```
npm run dev
```
Feel to modify scripts as you please.
#### Basic scripts

| Script name | Full command | Description |
|--|--|--|
| dev | `npm run dev` | Run Tailwind, Gulp and wp-scripts concurrently in watch mode. Use this when developing anything. |
| build | `npm run build`| Trigger the Gulp default task responsible for build. This not include the  WordPress blocks|
| dev:blocks | `npm run dev:blocks` | Run the development workflow for blocks such as describe in the `@wordpress/scripts` package. To use when developing blocks only.|
| build:blocks | `npm run build:blocks`| Build the blocks code for production such as describe in the the `@wordpress/scripts` package.|
| start:tailwind | `npm run start:tailwind` | Use the tailwind JIT compiler |

Basically you just need to run `npm run dev` except if you have some performance issue.

## Production setup
/!\\
**It is not recommended to launch this theme in production at this stage of the project excepting for testing purposes.**
 /!\
 
### Continuous Deployment
 An FTP GitHub action is pre-set to push your code into your web server :

```
on:
	push:
		branches:
			- main
name: 🚀 Deploy website on push
jobs:
	web-deploy:
		name: 🎉 Deploy
		runs-on: ubuntu-latest
		steps:
			- name: 🚚 Get latest code
			  uses: actions/checkout@v2
			- name: 📂 Sync files
			  uses: SamKirkland/FTP-Deploy-Action@4.3.0
				with:
					server: ${{ secrets.ftp_server }}
					username: ${{ secrets.ftp_username }}
					password: ${{ secrets.ftp_password }}
```

Define GitHub Actions secrets in your repo configuration relatively to your FTP access informations.

The action will be triggered each time new code is push to the `main`  branch so be sure to push only production ready code in `main` or simply delete the `.github\workflows\main.yml`  file if you dont want this feature.