# Ansible Configuration Management

This directory contains Ansible configuration files and playbooks used for managing OpenStack infrastructure.

## Contents

- inventory.ini: Ansible inventory file with all managed hosts.
- postgresql_install.yml: Ansible playbook to install and configure PostgreSQL database server.
- nginx_php_install.yml: Ansible playbook to install and configure Nginx with PHP support.
- static-site-config.conf: Nginx configuration file for serving a static website.
- web-pages/: Directory containing static web pages to be deployed.
- init.sql: SQL script to initialize the PostgreSQL database with necessary data.

## Requirements

- Ansible installed on your local machine.
- SSH access to the target machines.

## Usage

1. Update the `inventory.ini` file with the IP addresses or hostnames of your target machines.
2. Run the PostgreSQL installation playbook:
   ```bash
   ansible-playbook -i inventory.ini postgresql_install.yml
   ```
3. Go to the web pages in the `web-pages/` directory and update the database IP address in the configuration files if necessary.
4. Run the Nginx and PHP installation playbook:
   ```bash
   ansible-playbook -i inventory.ini nginx_php_install.yml
   ```
5. Ensure that the web pages in the `web-pages/` directory are correctly placed on the target web server.