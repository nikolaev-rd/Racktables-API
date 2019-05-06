# Racktables API
API implementation for [Racktables](https://github.com/RackTables/racktables) with read-only methods, written on PHP.

## Requirements

- [Racktables](https://github.com/RackTables/racktables) >= 0.20.14
- [PHP](https://github.com/php) >= 7.0
- [Apache](http://httpd.apache.org/)
- [Node.js](https://nodejs.org/) + [Swagger UI](https://github.com/swagger-api/swagger-ui)
  

## Installation

**1. Clone this repository** (for example - into directory `/var/www/html/racktables-api/`):
```bash
git clone https://github.com/nikolaev-rd/Racktables-API.git /var/www/html/racktables-api/
```
  
**2. Modify/verify Apache config**, where [Racktables](https://github.com/RackTables/racktables) was specified:
- Check that [Rewrite Engine](https://httpd.apache.org/docs/current/mod/mod_rewrite.html#rewriteengine) is turned on:
```apache
RewriteEngine on
```
- Add this to Apache config in section `<VirtualHost>`:
```apache
	# Racktables API
	Alias /api /var/www/html/racktables-api/public
	<Directory /var/www/html/racktables-api/public>
		Order allow,deny
		Allow from all
		AllowOverride All
	</Directory>
```
  
**3. Install [Node.js](https://nodejs.org/):**
- Ubuntu:
```bash
# download Node.js
curl -sL https://deb.nodesource.com/setup | sudo -E bash -

# install Node.js
sudo apt-get install nodejs

# verify Node.js installation was successful
npm -v
```
- CentOS/RHEL:
```bash
# download Node.js
curl --silent --location https://rpm.nodesource.com/setup | sudo bash -

# install Node.js
sudo yum install nodejs

# verify Node.js installation was successful
node -v
```
  
**4. Install Swagger UI** - use [this installation guide](https://swagger.io/docs/swagger-tools/#swagger-ui-documentation-29):
Clone repository (for example - into directory `/var/www/html/swagger-ui/`):
```bash
git clone https://github.com/swagger-api/swagger-ui.git /var/www/html/swagger-ui
```
Change default URL of Swagger JSON in file `/var/www/html/swagger-ui/dist/index.html`:
```html
<script>
window.onload = function() {

  // Build a system
  const ui = SwaggerUIBundle({
    // URL for default Swagger JSON:
    url: "/api/swagger-json.php",
    validatorUrl: null,
    dom_id: '#swagger-ui',
    deepLinking: true,
    presets: [
      SwaggerUIBundle.presets.apis,
      SwaggerUIStandalonePreset
    ],
    plugins: [
      SwaggerUIBundle.plugins.DownloadUrl
    ],
    layout: "StandaloneLayout"
  })

  window.ui = ui
}
</script>
```
Add this to Apache config in section `<VirtualHost>`, where [Racktables](https://github.com/RackTables/racktables) was specified:
```apache
	# Swagger UI
	Alias /api-docs /var/www/html/swagger-ui/dist
	<Directory /var/www/html/swagger-ui/dist>
		Order allow,deny
		Allow from all
		AllowOverride All
	</Directory>
```

**5. That's all!**
Now test API via browser: http://racktables-server.name/api
If everything is OK, your will redirected to the http://racktables-server.name/api/ (with trailing slash) and see API version, something like that:
```json
"0.2.5"
```
  
## Documentation
If you installed Node.js & Swagger UI, interactive documentation will be generated automatically (using [doctrine annotations](http://doctrine-common.readthedocs.org/en/latest/reference/annotations.html) in code): 
http://racktables-server.name/api-docs
