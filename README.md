1. Execution System Software Requirement

	1.1 Software Requirement
	
	:pushpin:Operating System – Windows 10
	
	:pushpin:Web Hosting Package - XAMPP
	
	:pushpin:Web Server – APACHE2
	
	:pushpin:Backend – PHP, PYTHON
	
	:pushpin:File Archiever – 7-zip, Winzip or Winrar
	
	1.2 Hardware Requirement
	
	:pushpin:CPU – Intel I5 CPU / AMD RYZEN 5 CPU
		
	:pushpin:MEMORY – 8 GB

	:pushpin:STORAGE – 50GB SSD
		
	:pushpin:INTERNET – 30MBPS BANDWIDTH 
2. Image Classification System web application Installation
	
	2.1 Install the Browser
 	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/1.jpg?raw=true)
	•	Please go to https://www.google.com/chrome/ to download the Google Chrome Installer.
	
	•	After completing the download, please install the Google Chrome in computer

	* We are just using Google Chrome (Recommended) as an example and if you already have the web browser in your computer, skip this step.

	2.2 XAMPP
	
	2.2.1 Installation
 	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/2.jpg?raw=true)
	•	Please go to https://www.apachefriends.org/download.html  to download the XAMPP Installer. Please download the appropriate XAMPP according to your operating system.
		
	•	After completing the download, please install the XAMPP in computer.
	•	In the “C:\xampp\htdocs” and create a new folder called “ICS”. (You can change “ICS” to any name that you like.)
	* If you have the XAMPP, skip the steps above.

	2.2.2 Setup the Configuration
 	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/3.jpg?raw=true)
	
	•	Open the XAMPP
	•	Click the “Config” and “Apache (httpd.conf)” button
 	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/4.jpg?raw=true)
	
	•	Adding these 2 lines at the end of the file. 
	
	•	Save and close the file

 	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/5.jpg?raw=true)
	
	•	Click the “Config” and “PHP (php.ini)” button

	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/6.jpg?raw=true)
	
	•	Use “Ctrl-F” shortcut in file 
	
	•	Type “post_max_size” and change the number to 200M

	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/7.jpg?raw=true)
	
	•	Type “upload_max_filesize” and change the number to 200M.
	
	•	Save the file
	
	2.2.3 Start the Apache Server
	
 	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/8.jpg?raw=true)
	
	•	Open the XAMPP, click the “Start” button. If Apache module already started, please stop the module, and restart again.


	2.3 Python
	
	2.3.1 Installation and Setup
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/9.jpg?raw=true)
		
	•	Please go to https://www.python.org/downloads/release/python-392/ and scroll down to download the python with version 3.9.2
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/10.jpg?raw=true)
	
	•	Please tick the “Add Python 3.9 to PATH before click “Install Now”
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/11.jpg?raw=true)
	
 	•	Please click the “Close” button once the setup is successful.


	2.4 Visual C++ Redistributable
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/12.jpg?raw=true)
	
	•	Please go to https://docs.microsoft.com/en-US/cpp/windows/latest-supported-vc-redist?view=msvc-160 and scroll down to download the Microsoft Visual C++ installation package.

	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/13.jpg?raw=true)

 	•	Please tick on the checkbox of the agreement
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/14.jpg?raw=true)
 
 	•	After the installation is complete, click Close button to close window
	
	2.5 GitHub
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/15.jpg?raw=true)

	•	Go to https://github.com/101227936/General-Image-Classification-CNN-Model
	
	•	Click the “Code” button and “Download ZIP” button.

	* If you don’t have the GitHub account, please follow the 2.4.1 step to create a GitHub account first.

	2.5.1 Create a GitHub account
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/16.jpg?raw=true)

	•	Please go to https://github.com/signup?source=login to create a GitHub account.
	
	2.6 Extract the ZIP file

	•	Extract the ZIP file which download from GitHub and put it to C:\xampp\htdocs\ICS.
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/17.jpg?raw=true)
	
	* Make sure the name “ICS” is same with Section 2.2.1 
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/18.jpg?raw=true)

	After install Python 3.9.2 from above step, in ICS folder, double click install.bat file to install python necessary module.
	
	![alt text](https://github.com/101227936/General-Image-Classification-CNN-Model/blob/main/Readme_Screenshot/19.jpg?raw=true)

	After the installation is complete, enter any key to close this window.
	Here have some advice or possible solution when you are not able to open our web application.
	1.	Please make sure all the installation and setup are following the steps and done correctly.

	You have done the installation and please go to README.doc for our web application tutorial and you may proceed to the “User Manual File” to get more information about the General Classification System.
