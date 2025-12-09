# OpenStack Configuration Management Course

This repository contains configuration files and scripts used in the OpenStack Configuration Management course at Polytech Montpellier.

## Contents

- open_stack_template.yaml: CloudFormation template to setup OpenStack resources.
- ansible-conf/: Directory containing Ansible configuration files.

## Usage

1. Connect to your OpenStack environment.
2. Provide the OpenStack resources using the `open_stack_template.yaml` CloudFormation template.
   ```bash
   openstack stack create -t open_stack_template.yaml --parameter image=debian-13 --parameter flavor=m1.medium --parameter key_name=<SSH-KEY-NAME> --parameter external_network=public baptiste-stack
   ```
   **Note:** Replace `<SSH-KEY-NAME>` with the name of your SSH key pair in OpenStack.
3. Since the machines are ready, you can directly use Ansible to configure them. Navigate to the `ansible-conf` directory and follow the instructions in the README file located there.