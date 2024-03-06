MANUAL INSTALLATION INSTRUCTION 

XAMPP Installation Instructions for Windows Users
Overview:

XAMPP is a free and open-source cross-platform web server solution stack package developed by Apache Friends, consisting mainly of the Apache HTTP Server, MariaDB database, and interpreters for scripts written in the PHP and Perl programming languages. Follow these step-by-step instructions to install XAMPP on your Windows system.
Step 1: Download XAMPP:
    1. Navigate to the XAMPP official website.
    2. Click on the "Download" button for the Windows version of XAMPP.
Step 2: Run the Installer:
    1. Once the download is complete, locate the downloaded file (usually named something like xampp-windows-x64-7.x.x-0-VCxx-installer.exe).
    2. Double-click on the installer file to launch the XAMPP installation wizard.
Step 3: Choose Components:
    1. In the installation wizard, you'll be presented with a list of components to install. By default, Apache, MySQL, PHP, and phpMyAdmin are selected. You can customize this list according to your requirements.
    2. Click "Next" to proceed.
Step 4: Choose Installation Directory:
    1. Select the directory where you want to install XAMPP. The default directory is C:\xampp, but you can choose a different location if needed.
    2. Click "Next" to continue.
Step 5: Start Installation:
    1. Review the installation settings and components.
    2. Click "Next" to start the installation process.
Step 6: Complete Installation:
    1. Wait for the installation process to complete. This may take a few minutes.
    2. Once the installation is finished, you'll see a confirmation message.
    3. Optionally, you can check the "Launch XAMPP Control Panel" checkbox to start the XAMPP Control Panel immediately after installation.
    4. Click "Finish" to exit the installation wizard.
Step 7: Start XAMPP Control Panel:
    1. If you checked the option to launch the XAMPP Control Panel, it will open automatically after installation.
    2. Alternatively, you can manually open the XAMPP Control Panel by navigating to the installation directory (e.g., C:\xampp) and double-clicking on xampp-control.exe.
Step 8: Start Apache and MySQL:
    1. In the XAMPP Control Panel, you'll see options to start Apache and MySQL services.
    2. Click on the "Start" buttons next to both Apache and MySQL to start the server services.
Step 9: Verify Installation:
    1. Open a web browser and type http://localhost in the address bar.
    2. If XAMPP is installed correctly, you should see the XAMPP dashboard.
    3. You can also test PHP functionality by creating a new PHP file (e.g., test.php) in the htdocs directory (located in your XAMPP installation directory) and accessing it via http://localhost/test.php.
Congratulations! You have successfully installed XAMPP on your Windows system. You can now start developing and testing web applications locally using Apache, MySQL, PHP, and other tools provided by XAMPP.


Visual Studio Code (VSCode) Installation Instructions:

Overview:
Visual Studio Code is a lightweight and powerful code editor developed by Microsoft. It's highly customizable and supports a wide range of programming languages. Follow these steps to install VSCode on your Windows system.
Step 1: Download VSCode:
    1. Navigate to the Visual Studio Code official website.
    2. Click on the "Download for Windows" button.
Step 2: Run the Installer:
    1. Once the download is complete, locate the downloaded file (usually named something like VSCodeSetup-x64-x.x.x.exe).
    2. Double-click on the installer file to launch the VSCode installation wizard.
Step 3: Choose Installation Options:
    1. In the installation wizard, you can choose installation options such as adding a desktop icon and associating file types with VSCode.
    2. Click "Next" to proceed.
Step 4: Select Additional Tasks:
    1. Optionally, you can choose to add "Open with Code" option to the context menu and include VSCode in the system PATH.
    2. Click "Next" to continue.
Step 5: Start Installation:
    1. Review the installation settings.
    2. Click "Next" to start the installation process.
Step 6: Complete Installation:
    1. Wait for the installation to complete.
    2. Once finished, click "Finish" to exit the installation wizard.
Step 7: Launch VSCode:
    1. Open the Start menu and search for "Visual Studio Code."
    2. Click on the VSCode icon to launch the editor.
Congratulations! You have successfully installed Visual Studio Code on your Windows system.

Laravel Installation Instructions:
Overview:
Laravel is a popular PHP web application framework known for its elegant syntax and developer-friendly features. Follow these steps to install Laravel on your Windows system using Composer.
Step 1: Install Composer:
    1. If you don't have Composer installed, download and install it from Composer's official website.
    2. Follow the installation instructions provided for Windows.
Step 2: Open a Command Prompt or Terminal:
    1. Open the Command Prompt or PowerShell on your Windows system.
Step 3: Install Laravel:
    1. Run the following command to install Laravel globally using Composer:
           
       composer global require laravel/installer
Step4: Serve the Application:
    1. Run the following command to start the Laravel development server:
       
       php artisan serve
    2. Open a web browser and go to http://localhost:8000 to see your Laravel application.
Congratulations! You have successfully installed Laravel on your Windows system.

