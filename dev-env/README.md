# dev-env

The dev-env is handled through docker. You can alternatively use your own since it's just a theme.

## Ports

- WordPress : 8880
- Browser-sync UI : 3001

## debug.log

Create empty `dev-env/debug.log ` and `dev-env/xdebug.log` files in order to avoid the `docker-compose` script to create useless folders insteed.

## Browser-sync

In order to use browser-sync with your custom dev-env, please change the port number used by browser-sync in `gulpfile.mjs` to your WordPress port endpoint or proxy. If you use a proxy, you can replace the browsersync init function in watchfiles function by this one :

```javascript
browserSync.init({
  proxy: "yourproxyaddress",
});
```
