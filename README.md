## Welcome to ShieldHub.
In order to make things easy for people who build V2ray VPNs and shares it to people, We come up with an idea to make this proccess automate.

#### Buisness Logic
------------
We gonna have two roles, admin and customer. Each role has its unique actions and panel.
Admins can add new customers, assign them with configs, set servers status.
Customers in other hand, have there own panel which can sign in and copy links or check any notifications or server-down news.


#### Requirement & Platform

- ##### Back-end
   - Laravel v10.8.0
   - PHP v8.2.3
- ##### Front-end
   - Tabler theme v1.0.0
  
   


#### Installation
1. Clone the repo
2. 
   ```sh
   cd project-name
   ```
3. Install Composer packages
   ```sh
   composer install
   ```
4. Run following aritsan command
    ```php
    php artisan app:install
    php artisan serve
   ```
5. Now if everything works fine, you should see the website at http://127.0.0.1:8000

### ToDo

- [X] Admins login
- [X] Admins panel
- [X] Customers login
- [X] Customers panel
- [x] Installation ( with one command )
- [X] Customers management
- [X] Configs management
- [ ] Servers management
- [ ] Connect configs to Kafka Panel
- [ ] Connect server status to Kafka Panel


### Contribution
Yes! Any help would be appreciated ♥
