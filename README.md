# Atypic - A WordPress theme (bêta)

This theme is basically designed for my own personal blog but feel free to use it or fork it as it is under [GNU General Public License v2](http://www.gnu.org/licenses/gpl-2.0.html)

## Local Development

### Setup environment

#### PHP

The code need to be compatible with the version 7.3.33 of PHP for production environment reasons.

The code is intended to be PHP 8 compliant at terms and we will no longer support previous versions when reaching this step.

#### Installing Node.js

This theme uses Node.js tools for build processes through webpack, Gulp and other tools.

If you haven't Node.js installed yet you can follow those instructions for your specific Operating System :

- <https://nodejs.org/en/download/>

Make sure you install the LTS version.

#### Running WordPress locally

WordPress recommended versions : **Latest**. Note that it is recommend to keep your WordPress version up to date.

If you haven't already a local setup for WordPress I recommend to use one of these tool :

- [Docker](https://www.docker.com/) : You can simply run the docker-compose.yml file or use the `npm run start` script.

- [Local](https://localwp.com/) by FlyWheel : An intuitive UI that I recommend if you have no prior experience with Docker.

- [XAMPP](https://www.apachefriends.org/fr/index.html) : Offer an all-in-one PHP and Perl support through Apache and MariaDB.

- WAMP, LAMP, or other distribution similar to XAMPP.

#### Download the Atypic theme source code

You can (`download` || `clone` || `fork`) the source code on its GitHub repo : <https://github.com/Sbyspaceopera/atypic>

Make sure to put this code in your `wp-content/themes/atypic` directory.

#### Final step

Go activate the theme in your WordPress admin panel and follows the plugins installation instructions thanks to [TGM Plugin Activation](http://tgmpluginactivation.com/).

### Scripts

The scripts in this projects are divide in two main types : block related scripts and the others.

_Block related scripts_ only affect the `/blocks` folder.

_Other scripts_ do not affect the `/blocks` folder.

_All scripts_ are used through NPM and must be precede by the `npm run` command, for example :

`npm run dev`

#### NPM scripts

**IMPORTANT NOTE :** The docker related scripts will not work if you dont have docker and docker-compose set correctly on your system. This note concern the following scripts : start, phpdoc:windows, phpdoc:unix.
| Script name | Full command | Description |
|--|--|--|
|start|`npm run start`|Run the `./dev-env/docker-compose.yml` file in order to start all the environment through docker containers|
| dev | `npm run dev` | Run the TailwindCSS JIT compiler and the Gulp default task responsible for the build. To use when developing for all other things than blocks. |
|build|`npm run build`| Trigger the Gulp default task responsible for build.|
|dev:blocks|`npm run dev:blocks`|Run the development workflow for blocks such as describe in the `@wordpress/scripts` package. To use when developing blocks.|
|build:blocks| `npm run build:blocks`| Build the blocks code for production such as describe in the the `@wordpress/scripts` package.|
|prettier|`npm run prettier`|Run the prettier formatter configured by `.prettierrc.json` and the command itself in `package.json` |
|phpdoc:windows|`npm run phpdoc:windows`|Windows systems : Run the [phpdoc](https://docs.phpdoc.org/) generator through docker|
|phpdoc:unix|`npm run phpdoc:unix`|Unix systems : Run the [phpdoc](https://docs.phpdoc.org/) generator through docker|

## Production setup

/!\\

**It is not recommended to launch this theme in production at this stage of the project excepting for testing purposes.**

/!\

### Continuous Deployment

An FTP GitHub action is pre-set to push your code into your web server :

```yaml
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

The action will be triggered each time new code is push to the `main` branch so be sure to push only production ready code in `main` or simply delete the `.github/workflows/main.yml` file if you dont want this feature.

## Note on WordPress plugins

Custom plugins are actually build in the `includes` folder when the third party plugins are required through [TGM Plugin Activation](http://tgmpluginactivation.com/) to avoid dependencies conflict in production.

New third party dependencies should be register in the `atypic_register_required_plugins` in `functions.php` following the [TGM Plugin Activation](http://tgmpluginactivation.com/) spec.

## Contribute

Contributions are welcome.

You can help by the following ways :

- Suggest improvement about the code, the design, or the contribution workflow.

- Work on a known issue.

- Transforming old features in Gutenberg blocks.

- Writing tests or contribute to the test politic.

- Writing a `.md` file for a specific folder. Each folder should have one except for `node_modules` and `build` folders.

Please open an issue in GitHub for every improvement idea and wait until I respond before you starting to work on. This will avoid you to lost time on unwanted features.

The contribution workflow is intended to be more effective. Don't hesitate to ask question or suggest things in the issue section until this time.

### Git politic

- Create a new branch for any new code contribution

- The issue tag number should be present in the branch name
