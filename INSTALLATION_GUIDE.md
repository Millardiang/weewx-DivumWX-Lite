# Installation Guide

**The installer defaults to overwrite mode, userSettings.php will not be overwritten as it does not exist in the package. However, it is essential that any customisations you may have been made are backed up before running the install.**

IMPORTANT. If you are making a completley clean install of WeeWX and DivumLite Template it is strongly recommended that you allow the WeeWX database to establish itself for 24hours before attempting installing the template.

This installation guide assumes that you are already reasonably familiar with WeeWX and that it is already installed on your computer along with a webserver, php and curl.

Currently, DivumLite only supports WeeWX 5.1 or later, installed by Pip into a Python v3.6 or later virtual environment. Instructions can be found at https://weewx.com/docs/5.1/quickstarts/pip/

If you are carrying out a fresh install of WeeWX, my own personal preference is to use the setup.py method (http://www.weewx.com/docs/setup.htm). However, this increases the chances of requiring more path edits in the configuration files. Alternatively use one of the dedicated packaged installs (http://weewx.com/docs/debian.htm, http://weewx.com/docs/redhat.htm, http://weewx.com/docs/suse.htm or http://weewx.com/docs/macos.htm).

* Please familiarise yourself with the location of your WeeWX system files inhttp://weewx.com/docs/cluding your bin/user folder, skins folder and weewx.conf file. If you are unsure where to find these, please refer to the installation processes here: - http://www.weewx.com/docs/setup.htm which shows various WeeWX installation scenarios.

IMPORTANT. Installing PHP; please make sure you install all the PHP modules appropriate for your version of PHP. Failure to due so may mean that forecasts and current conditions fail to update. This is an example for PHP8.0 modules on a Debian based distribution: -

<h2 class="wp-block-heading">Install PHP</h2>

<p>Connect to Raspberry Pi via SSH and execute command to download GPG key:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">sudo wget -qO /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg</code></pre>

<p>Add PHP repository:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/php.list</code></pre>

<p>Update the package lists:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">sudo apt update</code></pre>

<p>Next, install PHP 8.4 with command line interface (CLI):</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">sudo apt install -y php8.4-common php8.4-cli</code></pre>

<p>Check PHP version when installation was finished:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">php --version</code></pre>

<p>There are various PHP extensions that provide additional functionality. PHP extensions can be installed using the following syntax:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">sudo apt install -y php8.4-extension_name</code></pre>

<p> Execute the following command to install commonly used PHP extensions:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">sudo apt install -y php8.4-common php8.4-curl php8.4-gd php8.4-mbstring php8.4-xml php8.4-zip</code></pre>

<p>We can use <code>-m</code> option to check what extensions are installed.</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">php -m</code></pre>

<h2 class="wp-block-heading">PHP integration with MySQL or MariaDB</h2>

<p>To use PHP with MySQL or MariaDB database, we need to install the following extension:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">sudo apt install -y php8.4-mysql</code></pre>

<h2 class="wp-block-heading">PHP integration with Apache</h2>

<p>If we want to integrate PHP with Apache HTTP server, then install the following extension:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">sudo apt install -y libapache2-mod-php8.4</code></pre>

<p>Once installation is complete, restart Apache:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">sudo service apache2 restart</code></pre>

<h2 class="wp-block-heading">Testing PHP</h2>

<p>Create a new <code>main.php</code> file:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">nano main.php</code></pre>

<p>Add the following code:</p>

<pre class="highlighter"><code class="language-php">&lt;?php

echo 'Hello world';</code></pre>

<p>Run the following command to test a script:</p>

<pre class="highlighter"><code class="language-plaintext no-line-numbers">php main.php</code></pre>

<h2 class="wp-block-heading">Install older versions</h2>

<p>PHP 8.3 is an older version that is still supported. It can be installed by changing <code>php8.4</code> to <code>php8.3</code> in this post presented commands.</p></div>

    
* This install process assumes that your are using one of the officially documented WeeWX installs and a typical Apache2 or Nginx web server configuration with a document root of /var/www/html. In this instance, at the end of the installation process your path to the DivumWX-Lite skin will be /var/www/html/divumLite. If your installation deviates from this, you will need to adjust the paths in your weewx.conf file after the installation process has taken place.

* I am very gratefully to Jerry Dietrich for writing a new installer which has been adapted DivumWX-Lite. This installer copies everything to the correct places and automatically configures the correct web server ownerships, permissions and groups etc. The whole process is very fast and your skin will be up and running in no time.

* Go to https://Millardiang.github.io/weewx-DivumWX-Lite to complete the pre-install web services settings which which generates 'services.txt' in your default Download folder. 

* From the command line: - 
                
		Download weewx-DivumWX-Lite-master.zip from https://github.com/Millardiang/weewx-DivumWX-Lite/archive/refs/heads/main.zip into your Download folder alongside the services.txt file
		cd [path_to_your_Download_folder]
		unzip weewx-DivumWX-Lite-master.zip
		cd weewx-DivumWX-Lite-master
		sudo python3 w34_installer.py

* Follow the prompts
		


* Restart WeeWX and from command line run: -
            	
		            # Activate the WeeWX virtual environment
                            source ~/weewx-venv/bin/activate
                            # Run all enabled reports:    
                            weectl report run

This will allow some of the required variable data to be generated immediately without having to wait for the next report generation interval.

* You can now test that the template is working by opening it up in your browser. Initially you will see random demo data. Click on the menu button at the top-left corner and select settings. This will open up a web form in which you apply your own settings. The default password is '12345'. Please change this to your own unique password for your own protection. Pay particular attention to the location of the dvmRealtime.txt file being generated on a loop cycle by weeWX. The default location is “/[html_root]/divumLite/serverdata/dvmRealtime.txt” (for example /var/www/html/divumLite/serverdata/dvmRealtime.txt).

* Automatic database backup module. 

    Open your weewx.conf file and find the [[Services]] section in the [Engine] stanza. Find the line that starts with process_services. At the end of that line add:-

			,user.w34_db_backup.W34_DB_Backup
			
   Then at the end of the file add this stanza: -

			[W34_DB_Backup]
				
				# database path(s) seperated by , rename this/these database(s) to match your own
    				databases = /home/weewx/archive/weewx.sdb,/home/weewx/archive/another.sdb
				
				# backup path(s) comma seperated 
    				backups = [your_backup_path]/weewx_backup.sdb,[your_backup_path]/home/pi/another_backup.sdb
				
				# set the daily time to backup comma seperated for multiple databases
				# the time must be set an to archive time so it runs immediately after the archive interval processes are complete
    				backup_times = 00:00,00:00
				
* Save and restart WeeWX

* Any problems, please raise an Issue in this repository attaching a debug report, your skin.conf files and a journal report covering at least two archive cycles from startup.
  
                              # Debug Report
                              source ~/weewx-venv/bin/activate   
                              weectl debug

                              # Journal Report
                              sudo journalctl -u weewx -f

                             
