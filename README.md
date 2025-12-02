# OpenStack Configuration Management Course

This repository contains configuration files and scripts used in the OpenStack Configuration Management course at Polytech Montpellier.

## Contents

- lb_template.yaml: CloudFormation template for load balancer setup.
- ansible-conf/: Directory containing Ansible configuration files.

## Usage

2. Since the machines are ready, you can directly use Ansible to configure them. Navigate to the `ansible-conf` directory and follow the instructions in the README file located there.
3. Deploy the CloudFormation stack using the provided `lb_template.yaml` file to set up the load balancer.
   ```bash
   openstack stack create -t lb_template.yaml --parameter subnet_id=cc02caa5-54e9-404f-bb24-da0e8a0b3dc7 --parameter member_ip=192.168.22.5 baptiste_loadbalancer
   ```
    **Note:** Replace the `subnet_id` and `member_ip` parameters with values appropriate for your OpenStack environment.